<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
include_once '../config/database.php';
include_once '../objects/cliente.php';
  
$database = new Database();
$db = $database->getConnection();
  
$cliente = new Cliente($db);
  
$stmt = $cliente->read();
$num = $stmt->rowCount();
  
if($num>0){
  
    $clientes_arr=array();
    $clientes_arr["data"]=array();
  
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        
        extract($row);
  
        $cliente_item=array(
            "id" => $id,
            "nome" => $nome,
            "cpf" => $cpf,
            "sexo" => $sexo,
            "email" => $email,
            "data_cadastro" => $data_cadastro,
            "data_alteracao" => $data_alteracao,
            "ip" => $ip
        );
  
        array_push($clientes_arr["data"], $cliente_item);
    }
  
    http_response_code(200);
    echo json_encode($clientes_arr);
}
  
else{
  
    http_response_code(404);
    echo json_encode(
        array("message" => "Nenhum cliente cadastrado.")
    );
}