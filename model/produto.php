<?php
class Produto {
    private $id;
    private $nome;
    private $caminho;
    private $preco;
    private $descricao;
    private $complemento;
    private $destaque;

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getNome() { return $this->nome; }
    public function setNome($nome) { $this->nome = $nome; }

    public function getCaminho() { return $this->caminho; }
    public function setCaminho($caminho) { $this->caminho = $caminho; }

    public function getPreco() { return $this->preco; }
    public function setPreco($preco) { $this->preco = $preco; }

    public function getDescricao() { return $this->descricao; }
    public function setDescricao($descricao) { $this->descricao = $descricao; }

    public function getComplemento() { return $this->complemento; }
    public function setComplemento($complemento) { $this->complemento = $complemento; }

    public function getDestaque() { return $this->destaque; }
    public function setDestaque($destaque) { $this->destaque = $destaque; }

}
?>