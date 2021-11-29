<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
include_once '../config/database.php';
include_once '../objects/produto.php';
  
$database = new Database();
$db = $database->getConnection();
  
$produto = new Produto($db);
  
$data = json_decode(file_get_contents("php://input"));
  
$produto->id = $data->id;
  
$produto->nome = $data->nome;
$produto->descricao = $data->descricao;
$produto->fabricacao = $data->fabricacao;
$produto->tamanho = $data->tamanho;
$produto->valor = $data->valor;
$produto->data_alteracao = date('Y-m-d H:i:s');
$produto->ip = $_SERVER['REMOTE_ADDR'];
  
if($produto->update()){

    http_response_code(200);
    echo json_encode(array("message" => "Produto atualizado com sucesso."));
}
  
else{
  
    http_response_code(503);
    echo json_encode(array("message" => "Não foi possível atualizar o produto."));
}
?>