<?php

define ("servidor","localhost");
define ("usuario","root");
define ("senha","mysqladmin");
define ("db","ControleDeFrequencia");


function busca_query($query){

$conexao = mysqli_connect(servidor, usuario, senha, db) or die ("Erro de conexão ao banco");

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
