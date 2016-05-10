<?php 

require_once "../Config/conexao.php";  
require_once "../Model/Crud.php"; 
 
 // Consumindo métodos do CRUD genérico 
 
 // Atribui uma conexão PDO   
 $pdo = conexao::getInstance();  
 
 // Atribui uma instância da classe Crud, passando como parâmetro a conexão PDO e o nome da tabela  
 $crud = Crud::getInstance($pdo, 'usuarios');  
 
 // Inseri os dados do usuário
 $arrayUser = array('nome' => 'Joãegrrto', 'usuario' => 'jeoao@hgmaiddttl.com', 'senha' => '123456');  
 $retorno   = $crud->insert($arrayUser); 
echo $retorno;
 /*if($retorno){
    
}else{
    AlertaMsg('Erro ').$retorno;
} */
 
 // Editar os dados do usuario com id 1 
 $arrayUser = array('nome' => 'João hda gSilva', 'nome' => 'johao@gmaigl.com.br', 'senha' => base64_encode('654321'));  
 $arrayCond = array('id=' => 2);  
 $retorno   = $crud->update($arrayUser, $arrayCond);  
echo $retorno;
 /*
 // Exclui o registro do usuário com id 1 
 $arrayCond = array('id=' => 1);  
 $retorno   = $crud->delete($arrayCond);  
 
 // Consulta os dados do usuário com id 1 e privilegio A 
 $sql        = "SELECT nome, email, privilegio FROM TAB_USUARIO WHERE id = ? AND privilegio = ?";  
 $arrayParam = array(1, 'A');  
 $dados      = $crud->getSQLGeneric($sql, $arrayParam, FALSE);  
*/
?>