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
		$this->pdf->SetFont('Arial','',12);
		$this->pdf->Ln(50);

		return;

	}

/**************************************RELATÓRIOS DE FALTAS*******************************************/
	function relatorio_aluno_falta($ocorrencia){

		$this->monta_pdf();
		$this->pdf->Image("logo_faltas.png", 5, 10, 200,40);
		$this->pdf->SetTitle("Relatório individual de faltas",1);

		$query = "SELECT R.matricula,DATE_FORMAT(R.data, '%d/%m/%Y') AS data FROM Registro_Faltas R INNER JOIN Ocorrencia_Faltas O ON R.RFid = O.RFid AND O.OFid = $ocorrencia";
		$resposta = busca_query($query);
		
		foreach($resposta as $row)
		{
			$matricula = $row['matricula'];
	
		}

		$this->pdf->MultiCell(0,0,iconv('utf-8','iso-8859-1',"O(a) aluno NOME, matrícula $matricula, não compareceu nos seguintes dias:"),0,"C",0);

		$this->pdf->Ln(20);
		$this->pdf->Cell(60, 10, "", 0, 0,"C");
		$this->pdf->Cell(80,10,"DATA",1,1,"C");


		foreach($resposta as $row)
		{
			$this->pdf->Cell(60, 10, "", 0, 0,"C");
			$this->pdf->Cell(80,10,$row['data'],1,1,"C");
		}

		$this->pdf->Close();
		return $this->pdf;

	}

	function relatorio_turma_falta($ocorrencia){

		$this->monta_pdf();
		$this->pdf->Image("logo_faltas.png", 5, 10, 200,40);
		$this->pdf->SetTitle("Relatório de falta por turma",1);

		$query = "SELECT AF.turma, AF.curso FROM Alertas_Faltas AF INNER JOIN (Registro_Faltas R INNER JOIN Ocorrencia_Faltas O ON R.RFid = O.RFid AND O.OFid = $ocorrencia) ON AF.AFid = R.AFid";
		$resposta = busca_query($query);

		foreach($resposta as $row)
		{
			$turma = $row['turma'];
			$curso = $row['curso'];
		}

		$this->pdf->MultiCell(0,0,iconv('utf-8','iso-8859-1',"Os alunos do curso de $curso, turma $turma, não compareceram nos seguintes dias:"),0,"C",0);
		$this->pdf->Ln(20);
		$this->pdf->Cell(30, 10, "", 0, 0,"C");
		$this->pdf->Cell(40,10,iconv('utf-8','iso-8859-1',"MATRÍCULA"),1,0,"C"); 
		$this->pdf->Cell(50,10,"NOME",1,0,"C"); 
		$this->pdf->Cell(40,10,"DATA",1,1,"C"); 
	
		$query = "SELECT R.matricula,DATE_FORMAT(R.data, '%d/%m/%Y') AS data FROM Registro_Faltas R INNER JOIN Ocorrencia_Faltas O ON R.RFid = O.RFid AND O.OFid = $ocorrencia";
		$resposta = busca_query($query);

		foreach($resposta as $row)
		{
			$this->pdf->Cell(30, 10, "", 0, 0,"C");
			$this->pdf->Cell(40,10,$row['matricula'],1,0,"C");
			$this->pdf->Cell(50,10,$row['cname'],1,0,"C");
			$this->pdf->Cell(40,10,$row['data'],1,1,"C");
		}


		$this->pdf->Close();
		return $this->pdf;

	}

/**************************************RELATÓRIOS DE HORÁRIOS*******************************************/

	/*function relatorio_aluno_horario(){
	
		$this->monta_pdf();
		$this->pdf->Image("logo_horarios.png", 5, 10, 200,40);
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

	}*/

	/*function relatorio_turma_horario(){

		$this->monta_pdf();
		$this->pdf->Image("logo_horarios.png", 5, 10, 200,40);
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

	}*/


}

?>
