<?php
class Cliente{
  
    private $conn;
    private $table_name = "clientes";
  
    public $id;
    public $nome;
    public $cpf;
    public $sexo;
    public $email;
    public $data_cadastro;
    public $data_alteracao;
    public $ip;
  
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
    
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
    
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
        $this->nome = $row['nome'];
        $this->cpf = $row['cpf'];
        $this->sexo = $row['sexo'];
        $this->email = $row['email'];
        $this->data_cadastro = $row['data_cadastro'];
        $this->data_alteracao = $row['data_alteracao'];
        $this->ip = $row['ip'];

    }

    function create(){
    
        $query = "INSERT INTO " . $this->table_name . " SET nome=:nome, cpf=:cpf, sexo=:sexo, email=:email, data_cadastro=:data_cadastro, ip=:ip";
        $stmt = $this->conn->prepare($query);
    
        $this->nome=htmlspecialchars(strip_tags($this->nome));
        $this->cpf=htmlspecialchars(strip_tags($this->cpf));
        $this->sexo=htmlspecialchars(strip_tags($this->sexo));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->data_cadastro=htmlspecialchars(strip_tags($this->data_cadastro));
        $this->ip=htmlspecialchars(strip_tags($this->ip));
    
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":cpf", $this->cpf);
        $stmt->bindParam(":sexo", $this->sexo);
        $stmt->bindParam(":email", $this->email);
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
                    cpf = :cpf,
                    sexo = :sexo,
                    email = :email,
                    data_alteracao = :data_alteracao,
                    ip = :ip
                WHERE
                    id = :id";
    
        $stmt = $this->conn->prepare($query);
    
        $this->nome=htmlspecialchars(strip_tags($this->nome));
        $this->cpf=htmlspecialchars(strip_tags($this->cpf));
        $this->sexo=htmlspecialchars(strip_tags($this->sexo));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->data_alteracao=htmlspecialchars(strip_tags($this->data_alteracao));
        $this->ip=htmlspecialchars(strip_tags($this->ip));
    
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':sexo', $this->sexo);
        $stmt->bindParam(':email', $this->email);
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