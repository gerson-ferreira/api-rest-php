<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
include_once '../config/database.php';
include_once '../objects/produto.php';
  
$database = new Database();
$db = $database->getConnection();
  
$produto = new Produto($db);
  
$stmt = $produto->read();
$num = $stmt->rowCount();
  
if($num>0){
  
    $produtos_arr=array();
    $produtos_arr["data"]=array();
  
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
  
        $produto_item=array(
            "id" => $id,
            "nome" => $nome,
            "descricao" =>html_entity_decode($descricao),
            "fabricacao" => html_entity_decode($fabricacao),
            "tamanho" =>html_entity_decode($tamanho),
            "valor" => number_format($valor, 2, ",", "."),
            "data_cadastro" => date('d/m/Y', strtotime($data_cadastro)),
            "data_alteracao" => $data_alteracao,
            "ip" => $ip
        );
  
        array_push($produtos_arr["data"], $produto_item);
    }
  
    http_response_code(200);
    echo json_encode($produtos_arr);
}
  
else{
  
    http_response_code(404);
    echo json_encode(
        array("message" => "Nenhum produto cadastrado.")
    );
}