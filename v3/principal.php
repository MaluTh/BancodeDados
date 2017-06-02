<?php

require('relatorio.php');

	$doc = new Relatorio();
	
	$doc=$doc->relatorio_aluno_falta('2');
	//$doc=$doc->relatorio_turma_falta('3');

	//$doc=$doc->relatorio_aluno_horario();
	//$doc=$doc->relatorio_turma_horario();
	
	$doc->Output();

?>





