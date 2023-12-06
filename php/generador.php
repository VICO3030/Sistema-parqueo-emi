<?php
/* incluimos primeramente el archivo que contiene la clase fpdf */
include('reservas-funciones.php');
include ('../fpdf/fpdf.php');

$consulta="SELECT MAX(id_reserva) as ultima FROM reservas WHERE rela_persona = ".$_SESSION['idpersona'].";";
$arrayReserva = consulta($consulta);
$reserva = $arrayReserva[0]['ultima'];
$direccion = mostrar_direccion($_SESSION['estacionamiento']);
echo $reserva, $_SESSION['persona'], $_SESSION['fechareserva'],$_SESSION['estacionamiento'];
/* tenemos que generar una instancia de la clase */
        $pdf = new FPDF();
        $pdf->AddPage();

/* seleccionamos el tipo, estilo y tamaño de la letra a utilizar */
        $pdf->SetFont('Helvetica', 'B', 14);
        $pdf->SetTextColor(44, 202, 220);
        $pdf->Image('../img/titulo-pdf.png',85,10,40);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->write(7, " ");
        $pdf->Ln();
        $pdf->Ln();
		$pdf->Write (7,"Numero de Reserva: ".$reserva);
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Write (7,"Cliente: ".$_SESSION['persona']);
		$pdf->Ln();
		$pdf->Ln();
		$pdf->SetTextColor(18, 144, 178);
		$pdf->Write (7,"Fecha: ".$_SESSION['fechareserva']);
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Write (7,"Estacionamiento: ".$_SESSION['nombre-estacion']."                      "."Direccion: ".$direccion);
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Write (7,"Puesto asignado: ".$_SESSION['puesto']);
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Write (7,"Hora Reserva: ".$_SESSION['horareserva']."                     "."Hora Fin: ".$_SESSION['horafin']);
		$pdf->Line(0,160,300,160);//impresión de linea
        $pdf->Output("../fpdf/prueba.pdf",'F');
		echo "<script language='javascript'>window.open('../fpdf/prueba.pdf','_self','');</script>";//para ver el archivo pdf generado
		exit;

?>
