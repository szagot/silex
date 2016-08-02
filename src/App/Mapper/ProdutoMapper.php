<?php
/**
 * Faz o processo de inserção no BD
 */

namespace App\Mapper;

use App\Entity\Produto;

class ProdutoMapper
{
    public function insert(Produto $produto)
    {
        ## Simula retorno do BD ##
        return [
            'id'        => $produto->getId(),
            'nome'      => $produto->getNome(),
            'descricao' => $produto->getDescricao(),
            'valor'     => $produto->getValor(),
        ];
    }

    public function fectAll()
    {
        ## Simula pegar dados do BD ##
        $dados = [
            [
                'id'        => 1,
                'nome'      => 'iPhone 6',
                'descricao' => 'Cuidado! Produto Apple. Delicado e de Mente fechada',
                'valor'     => 99999.99
            ],
            [
                'id'        => 2,
                'nome'      => 'Moto G 3³ Geração',
                'descricao' => 'Produto com Android, Robusto e Libera pra todo mundo',
                'valor'     => 999.99
            ],
        ];

        return $dados;
    }
}