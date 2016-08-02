<?php
/**
 * Serviço para a Entidade Cliente, evitando duplicação de código
 * Regra do Negócio
 */

namespace App\Service;

use App\Entity\Cliente;
use App\Mapper\ClienteMapper;

class ClienteService
{
    /**
     * @var Cliente
     */
    private $cliente;
    /**
     * @var ClienteMapper
     */
    private $clienteMapper;

    /**
     * ClienteService constructor.
     */
    public function __construct(Cliente $cliente, ClienteMapper $clienteMapper)
    {

        $this->cliente = $cliente;
        $this->clienteMapper = $clienteMapper;
    }

    public function insert(array $data)
    {
        $this->cliente->setNome($data[ 'nome' ]);
        $this->cliente->setEmail($data[ 'email' ]);

        return $this->clienteMapper->insert($this->cliente);
    }

    public function fetchAll()
    {
        return $this->clienteMapper->fectAll();
    }
}