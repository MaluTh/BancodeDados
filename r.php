<?php

	require('fpdf/fpdf.php');

	$imagem = "logo_ifsc.png";
	//Configurações para database mysql
	$servidor = "localhost";
	$usuario = "root";
	$senha = "ubuntu";
	$bd = "lab03jobstamara";
	//$servidor = "191.36.9.27";
	//$usuario = "tamara";
	//$senha = "1234";


	/*****Conecta com o BD*****/
	$mysqli = new mysqli($servidor, $usuario, $senha, $bd);

	if (mysqli_connect_errno()) {
	    exit();
	}


	/*****Montando o cabecalho padrao do PDF*****/
	$pdf = new FPDF ();
	$pdf->AliasNbPages('{np}');
	$pdf->SetMargins(10,20,10);
	$pdf->AddPage();
	$pdf->SetFont('Arial','',16);
	$pdf->Image($imagem, 10, 10, 50,30);
	$pdf->Cell(225,0,"Instituto Federal de Santa Catarina",0,0,"C");
	$pdf->Ln(13);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(225,0,"Campus São Jose",0,0,"C");
	$pdf->Ln(20);


	/*****Montando um relatorio de acordo com tipo*****/
	$pdf->SetTitle("Relatório",1);
	// Monta query
	$query = "SELECT cname,cdate FROM course";
	$result = $mysqli->query($query);


	$pdf->MultiCell(0,0,"O(a) aluno NOME, matricula MATRICULA chegou atrasado entre os dias D_I e D_F:",0,"C",0);

	$pdf->Ln(20);
	$pdf->Cell(15, 10, "", 0, 0,"C");
	$pdf->Cell(80,10,"Nome",1,0,"C"); //DATA
	$pdf->Cell(80,10,"Data",1,1,"C"); //HORA
	
	//Seleciona as linhas e coloca num vetor
	while($row = $result->fetch_array())
	{
		$rows[] = $row;
	}

	//Apresenta os dados no pdf
	foreach($rows as $row)
	{
		//echo $row['cname'];
		$pdf->Cell(15, 10, "", 0, 0,"C");
		$pdf->Cell(80,10,$row['cname'],1,0,"C");
		$pdf->Cell(80,10,$row['cdate'],1,1,"C");
	
	}


	/*****Fechando conexao*****/
	//Libera resultado
	$result->close();

	//Fecha conexão
	$mysqli->close();

	$pdf->Output();
?>
