<?php 

require_once "../Config/conexao.php";  
require_once "../Model/Crud.php"; 
 
if($_POST){
	$OsClienteId = isset($_GET['id_cliente_os']) ? $OsClienteId = $_GET['id_cliente_os'] : $OsClienteId = 0;
	if($OsClienteId == 0){
		return AlertaMsg("Erro: Cliente não válido");
	}else{

 // Consumindo métodos do CRUD genérico 
 
 // Atribui uma conexão PDO   
 $pdo = conexao::getInstance();  
 
 // Atribui uma instância da classe Crud, passando como parâmetro a conexão PDO e o nome da tabela  
 $crud = Crud::getInstance($pdo, 'cliente');  
 

 
 // Editar os dados do usuario com id 1 
 $arrayUser = array('nome' => 'João hda gSilva', 'nome' => 'johao@gmaigl.com.br', 'senha' => base64_encode('654321'));  
 $arrayCond = array('id=' => $OsClienteId);  
 $retorno   = $crud->update($arrayUser, $arrayCond);  
echo $retorno;
        }
?>

