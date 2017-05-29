<?php

require('fpdf/fpdf.php');
require_once('banco.php');
	
class Relatorio{

	protected $pdf;

	function monta_pdf(){

		$this->pdf = new FPDF ();

		$this->pdf->AliasNbPages('{np}');
		$this->pdf->SetMargins(10,20,10);
		$this->pdf->AddPage();
		$this->pdf->SetFont('Arial','',16);
		$this->pdf->Image("logo_ifsc.png", 10, 10, 50,30);
		$this->pdf->Cell(225,0,"Instituto Federal de Santa Catarina",0,0,"C");		
		$this->pdf->Ln(13);
		$this->pdf->SetFont('Arial','',12);
		$this->pdf->Cell(225,0,iconv('utf-8','iso-8859-1',"Campus São José"),0,0,"C");
		$this->pdf->Ln(20);

		return;

	}

	function relatorio_aluno_horario(){
	
		$this->monta_pdf();

		$this->pdf->SetTitle("Relatório individual de horário",1);
		$this->pdf->MultiCell(0,0,iconv('utf-8','iso-8859-1',"O(a) aluno NOME, matrícula MATRICULA chegou atrasado entre os dias D_I e D_F:"),0,"C",0);
		$this->pdf->Ln(20);
		$this->pdf->Cell(15, 10, "", 0, 0,"C");
		$this->pdf->Cell(80,10,"DATA",1,0,"C"); //DATA
		$this->pdf->Cell(80,10,"HORA",1,1,"C"); //HORA
	
		// Monta query
		$query = "SELECT cname,cdate FROM course";
		$resposta = busca_query($query);

		//Apresenta os dados no pdf
		foreach($resposta as $row)
		{
			$this->pdf->Cell(15, 10, "", 0, 0,"C");
			$this->pdf->Cell(80,10,$row['cname'],1,0,"C");
			$this->pdf->Cell(80,10,$row['cdate'],1,1,"C");
		}

		$this->pdf->Close();
		return $this->pdf;

	}

	function relatorio_aluno_falta(){

		$this->monta_pdf();

		$this->pdf->SetTitle("Relatório individual de faltas",1);
		$this->pdf->MultiCell(0,0,iconv('utf-8','iso-8859-1',"O(a) aluno NOME, matrícula MATRICULA não compareceu entre os dias D_I e D_F:"),0,"C",0);
		$this->pdf->Ln(20);
		$this->pdf->Cell(60, 10, "", 0, 0,"C");
		$this->pdf->Cell(80,10,"DATA",1,1,"C"); //DATA

		// Monta query
		$query = "SELECT cname,cdate FROM course";
		$resposta = busca_query($query);

		//Apresenta os dados no pdf
		foreach($resposta as $row)
		{
			$this->pdf->Cell(60, 10, "", 0, 0,"C");
			$this->pdf->Cell(80,10,$row['cdate'],1,1,"C");
	
		}

		$this->pdf->Close();
		return $this->pdf;

	}

	function relatorio_turma_horario(){

		$this->monta_pdf();
		$this->pdf->SetTitle("Relatório de horário por turma",1);
		$this->pdf->MultiCell(0,0,"Os alunos da turma ID_TURMA chegaram atrasados entre os dias D_I e D_F:",0,"C",0);
		$this->pdf->Ln(20);
		$this->pdf->Cell(10, 10, "", 0, 0,"C");
		$this->pdf->Cell(40,10,iconv('utf-8','iso-8859-1',"MATRÍCULA"),1,0,"C"); //DATA
		$this->pdf->Cell(50,10,"NOME",1,0,"C"); //DATA
		$this->pdf->Cell(40,10,"DATA",1,0,"C"); //DATA
		$this->pdf->Cell(40,10,"HORA",1,1,"C"); //HORA
	
		// Monta query
		$query = "SELECT cname,cdate FROM course";
		$resposta = busca_query($query);

		//Apresenta os dados no pdf
		foreach($resposta as $row)
		{
			$this->pdf->Cell(10, 10, "", 0, 0,"C");
			$this->pdf->Cell(40,10,$row['cname'],1,0,"C");
			$this->pdf->Cell(50,10,$row['cname'],1,0,"C");
			$this->pdf->Cell(40,10,$row['cdate'],1,0,"C");
			$this->pdf->Cell(40,10,$row['cdate'],1,1,"C");
		}

		$this->pdf->Close();
		return $this->pdf;

	}

	function relatorio_turma_falta(){

		$this->monta_pdf();
		$this->pdf->SetTitle("Relatório de falta por turma",1);
		$this->pdf->MultiCell(0,0,iconv('utf-8','iso-8859-1','Os alunos da turma ID_TURMA não compareceram entre os dias D_I e D_F:'),0,"C",0);
		$this->pdf->Ln(20);
		$this->pdf->Cell(30, 10, "", 0, 0,"C");
		$this->pdf->Cell(40,10,iconv('utf-8','iso-8859-1',"MATRÍCULA"),1,0,"C"); //DATA
		$this->pdf->Cell(50,10,"NOME",1,0,"C"); //DATA
		$this->pdf->Cell(40,10,"DATA",1,1,"C"); //DATA

		// Monta query
		$query = "SELECT cname,cdate FROM course";
		$resposta = busca_query($query);

		//Apresenta os dados no pdf
		foreach($resposta as $row)
		{
			$this->pdf->Cell(30, 10, "", 0, 0,"C");
			$this->pdf->Cell(40,10,$row['cname'],1,0,"C");
			$this->pdf->Cell(50,10,$row['cname'],1,0,"C");
			$this->pdf->Cell(40,10,$row['cdate'],1,1,"C");
		}


		$this->pdf->Close();
		return $this->pdf;

	}




}

?>
