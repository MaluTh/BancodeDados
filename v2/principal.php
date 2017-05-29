<?php

require('relatorio.php');

	$doc = new Relatorio();
	//$doc=$doc->relatorio_aluno_horario();
	$doc=$doc->relatorio_aluno_falta();
	//$doc=$doc->relatorio_turma_horario();
	//$doc=$doc->relatorio_turma_falta();
	
	$doc->Output();

?>





