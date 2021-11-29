<?php
class Produto{
  
    private $conn;
    private $table_name = "produtos";
  
    public $id;
    public $nome;
    public $descricao;
    public $fabricacao;
    public $tamanho;
    public $data_cadastro;
    public $data_alteracao;
    public $ip;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function read(){
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    
        return $stmt;
    }

    function readOne(){
    
        $query = "SELECT
                    *
                FROM
                    " . $this->table_name . "
                WHERE
                    id = ?";
    
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        $this->nome = $row['nome'];
        $this->descricao = $row['descricao'];
        $this->fabricacao = $row['fabricacao'];
        $this->tamanho = $row['tamanho'];
        $this->valor = $row['valor'];
        $this->data_cadastro = $row['data_cadastro'];
        $this->data_alteracao = $row['data_alteracao'];
        $this->ip = $row['ip'];
    }

    function create(){
    
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    nome=:nome, descricao=:descricao, fabricacao=:fabricacao, tamanho=:tamanho, valor=:valor, data_cadastro=:data_cadastro, ip=:ip";
        $stmt = $this->conn->prepare($query);
    
        $this->nome=htmlspecialchars(strip_tags($this->nome));
        $this->descricao=htmlspecialchars(strip_tags($this->descricao));
        $this->fabricacao=htmlspecialchars(strip_tags($this->fabricacao));
        $this->tamanho=htmlspecialchars(strip_tags($this->tamanho));
        $this->valor=$this->valor;
        $this->data_cadastro=$this->data_cadastro;
        $this->ip=$this->ip;
    
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":fabricacao", $this->fabricacao);
        $stmt->bindParam(":tamanho", $this->tamanho);
        $stmt->bindParam(":valor", $this->valor);
        $stmt->bindParam(":data_cadastro", $this->data_cadastro);
        $stmt->bindParam(":ip", $this->ip);
    
        if($stmt->execute()){
            return true;
        }
    
        return false;
        
    }

    function update(){
    
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    nome = :nome,
                    descricao = :descricao,
                    fabricacao = :fabricacao,
                    tamanho = :tamanho,
                    valor = :valor,
                    data_alteracao = :data_alteracao,
                    ip = :ip
                WHERE
                    id = :id";
    
        $stmt = $this->conn->prepare($query);
    
        $this->nome=htmlspecialchars(strip_tags($this->nome));
        $this->descricao=htmlspecialchars(strip_tags($this->descricao));
        $this->fabricacao=htmlspecialchars(strip_tags($this->fabricacao));
        $this->tamanho=htmlspecialchars(strip_tags($this->tamanho));
        $this->valor=$this->valor;
        $this->data_alteracao=$this->data_alteracao;
        $this->ip=$this->ip;
    
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':fabricacao', $this->fabricacao);
        $stmt->bindParam(':tamanho', $this->tamanho);
        $stmt->bindParam(':valor', $this->valor);
        $stmt->bindParam(':data_alteracao', $this->data_alteracao);
        $stmt->bindParam(':ip', $this->ip);
        $stmt->bindParam(':id', $this->id);
    
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    function delete(){
    
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        $this->id=htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(1, $this->id);
    
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

}
?>