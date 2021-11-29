<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
  
include_once '../config/database.php';
include_once '../objects/produto.php';
  
$database = new Database();
$db = $database->getConnection();
  
$produto = new Produto($db);
  
$produto->id = isset($_GET['id']) ? $_GET['id'] : die();
  
$produto->readOne();
  
if($produto->nome!=null){
    $produto_arr = array(
        "id" =>  $produto->id,
        "nome" => $produto->nome,
        "descricao" => $produto->descricao,
        "fabricacao" => $produto->fabricacao,
        "tamanho" => $produto->tamanho,
        "valor" => number_format($produto->valor, 2, ",", "."),
        "data_cadastro" => $produto->data_cadastro,
        "data_alteracao" => $produto->data_alteracao,
        "ip" => $produto->ip,  
    );
  
    http_response_code(200);
    echo json_encode($produto_arr);
}
  
else{
    http_response_code(404);
    echo json_encode(array("message" => "Produto não cadastrado."));
}
?>