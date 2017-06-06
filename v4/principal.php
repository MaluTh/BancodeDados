<?php

require('relatorio.php');

	$doc = new Relatorio();
	
	//$doc=$doc->relatorio_aluno_falta('4');
	//$doc=$doc->relatorio_turma_falta('3');

	$doc=$doc->relatorio_aluno_horario('4'); // 3 -> entrada , 1 ou 2 -> saida
	//$doc=$doc->relatorio_turma_horario();
	
	$doc->Output();

?>





