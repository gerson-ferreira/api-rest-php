<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
  
include_once '../config/database.php';
include_once '../objects/cliente.php';
  
$database = new Database();
$db = $database->getConnection();
  
$cliente = new Cliente($db);
  
$cliente->id = isset($_GET['id']) ? $_GET['id'] : die();
  
$cliente->readOne();
  
if($cliente->nome!=null){

    $cliente_arr = array(
        "id" =>  $cliente->id,
        "nome" => $cliente->nome,
        "cpf" => $cliente->cpf,
        "sexo" => $cliente->sexo,
        "email" => $cliente->email,
        "data_cadastro" => $cliente->data_cadastro,
        "data_alteracao" => $cliente->data_alteracao,
        "ip" => $cliente->ip,
    );

    http_response_code(200);
    echo json_encode($cliente_arr);
}
  
else{
    http_response_code(404);
    echo json_encode(array("message" => "Cliente não cadastrado."));
}
?>