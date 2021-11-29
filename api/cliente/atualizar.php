<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
include_once '../config/database.php';
include_once '../objects/cliente.php';
  
$database = new Database();
$db = $database->getConnection();
  
$cliente = new Cliente($db);
  
$data = json_decode(file_get_contents("php://input"));
  
$cliente->id = $data->id;
  
$cliente->nome = $data->nome;
$cliente->cpf = $data->cpf;
$cliente->sexo = $data->sexo;
$cliente->email = $data->email;
$cliente->data_alteracao = date('Y-m-d H:i:s');
$cliente->ip = $_SERVER['REMOTE_ADDR'];

if($cliente->update()){

    http_response_code(200);
    echo json_encode(array("message" => "Cliente atualizado com sucesso."));
}
  
else{
  
    http_response_code(503);
    echo json_encode(array("message" => "Não foi possível atualizar o cliente."));
}
?>