<?php
/**
 * Faz o processo de inserção no BD
 */

namespace App\Mapper;

use App\Entity\Cliente;

class ClienteMapper
{
    public function insert(Cliente $cliente)
    {
        ## Simula retorno do BD ##
        return [
            'nome'  => $cliente->getNome(),
            'email' => $cliente->getEmail()
        ];
    }
}