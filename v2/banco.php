<?php

define ("servidor","localhost");
define ("usuario","root");
define ("senha","ubuntu");
define ("db","lab03jobstamara");

function conecta_db(){

$conexao = mysqli_connect(servidor, usuario, senha, db) or die ("Erro de conexão ao banco");

return $conexao;

}

function busca_query($query){

$conexao = conecta_db();

$resposta = mysqli_query($conexao,$query) or die ("Erro de acesso ao banco");

//Seleciona as linhas e coloca num vetor
while($row = $resposta->fetch_array())
{
	$rows[] = $row;
}
 
fecha_conexao($conexao);
return $rows;
}

function fecha_conexao($conexao){
	mysqli_close($conexao);
}


?>
