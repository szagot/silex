<?php
/**
 * Serviço para a Entidade Produto, evitando duplicação de código
 * Regra do Negócio
 */

namespace App\Service;

use App\Entity\Produto;
use App\Mapper\ProdutoMapper;

class ProdutoService
{
    /**
     * @var Produto
     */
    private $produto;
    /**
     * @var ProdutoMapper
     */
    private $produtoMapper;

    public function __construct(Produto $produto, ProdutoMapper $produtoMapper)
    {
        $this->produto = $produto;
        $this->produtoMapper = $produtoMapper;
    }

    public function insert(array $data)
    {
        $this->produto->setId($data[ 'id' ]);
        $this->produto->setNome($data[ 'nome' ]);
        $this->produto->setDescricao($data[ 'descricao' ]);
        $this->produto->setValor($data[ 'valor' ]);

        return $this->produtoMapper->insert($this->produto);
    }

    public function fetchAll()
    {
        return $this->produtoMapper->fectAll();
    }
}