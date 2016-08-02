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

    public function fectAll()
    {
        ## Simula pegar dados do BD ##
        $dados[0]['nome'] = 'Cliente XPTO';
        $dados[0]['email'] = 'clientexpto@gmail.com';

        $dados[1]['nome'] = 'Cliente Y';
        $dados[1]['email'] = 'clientey@gmail.com';

        return $dados;
    }
}