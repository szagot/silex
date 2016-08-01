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
    public function insert(array $data)
    {
        $cliente = new Cliente();
        $cliente->setNome($data[ 'nome' ]);
        $cliente->setEmail($data[ 'email' ]);

        $mapper = new ClienteMapper();

        return $mapper->insert($cliente);
    }
}