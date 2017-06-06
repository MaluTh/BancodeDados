<?php
require('fpdf/fpdf.php');
	// Define o servidor, banco de dados, usuário e senha
	define("BD_SERVIDOR", "191.36.9.27:1522/xe");
	define("BD_USUARIO", "Projeto");
	define("BD_SENHA", "projsenha");

	//$conn = oci_connect('username', 'password', 'host:port/servicename');
	$conn = oci_connect(BD_USUARIO, BD_SENHA, BD_SERVIDOR);

	$doc = new FPDF();
	$doc->SetMargins(10,20,10);
	$doc->AddPage();
	$doc->SetFont('Arial','',10);
	if (!$conn) {
		$erro = oci_error();
		trigger_error(htmlentities($erro['message'], ENT_QUOTES), E_USER_ERROR);
		exit;
	}

	$query = 'select NM_PESSOA from Alunos where ROWNUM <= 15';
	$stid = oci_parse($conn, $query);
	oci_execute($stid, OCI_DEFAULT);
	while ($row = oci_fetch_array($stid, OCI_ASSOC)) {
		foreach ($row as $item) {
			//echo $item." | ";
			$doc->Cell(80,10,$item,1,1,"C");
		}
	//echo "\n";
	}
	oci_free_statement($stid);
	oci_close($conn);
	$doc->Output();
?>
