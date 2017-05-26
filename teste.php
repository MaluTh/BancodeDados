<?php
require('t_conexao.php');


$servidor = "localhost";
$usuario = "root";
$senha = "ubuntu";
$bd = "lab03jobstamara";


$teste = new CONEXAO($servidor, $usuario, $senha, $bd);

	$doc=$teste->relatorio_aluno_horario();
	//$doc=$teste->relatorio_aluno_falta();
	//$doc=$teste->relatorio_turma_horario();
	//$doc=$teste->relatorio_turma_falta();
	$doc->Output();

?>
