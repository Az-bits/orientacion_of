<?php

namespace App\Http\Controllers;

use TCPDF;
use App\Models\CarrerasAreas\AreaModel;
use App\Models\EstudianteModel;
use App\Models\ResultadoModel;
use App\Models\TestModel;
use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class TestController extends FrontendController
{
    public function index(Request $request)
    {
        $idEstudiante = $request->id_estudiante;
        $idResultado = $request->id_respuesta;
        $estudiante = EstudianteModel::select('*')
            ->selectRaw("CONCAT_WS(' ', p.nombre, p.paterno, IFNULL(p.materno, '')) as nombre_completo")
            ->from('estudiantes as e')
            ->where('e.estado', '1')
            ->where('e.id_estudiante', $idEstudiante)
            ->leftJoin('personas as p', 'p.id_persona', '=', 'e.id_persona')
            ->first();
        $image = $request->image;
        // dd($image);
        $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $image));
        $imageName = 'tmp_image.png';


        $respuesta = ResultadoModel::where('id_respuesta',  $idResultado)->get();
        $test =  new TestModel();
        $data = $test->getResultados($respuesta[0]);
        $tab = '        ';
        $path = public_path('tmp/' . $imageName);
        chmod('/var/www/orientacion1/public/tmp', 0775);
        File::put($path, $imageData);
        $pdf = new Fpdf();
        $pdf->AddPage('P', 'Letter');
        $pdf->AddFont('edwardianscriptitc', '', 'edwardianscriptitc.php');
        $pdf->AddFont('Newton Italic', '', 'Newton Italic.php');
        $pdf->AddFont('DejaVuSans', '', 'DejaVuSans.php');

        $pdf->SetFont('edwardianscriptitc', '', 35);
        $pdf->SetY(15);
        $pdf->Cell(0, 0, utf8_decode('Universidad Pública de El Alto'), 0, 1, 'C');
        $pdf->SetFont('Newton Italic', '', 8);
        $pdf->Cell(0, 20, utf8_decode('Creada por Ley 2115 del 5 de Septiembre de 2000 y Autonoma por Ley 2556 de 12 de Noviembre de 2003'), 0, 1, 'C');
        $pdf->Image('assets/images/upea-logo.png', 10, 4, 30, 0);
        $pdf->Image('assets/images/sie.png', 175, 8, 30, 20);

        $pdf->SetFont('Times', 'B', 15);
        $pdf->Cell(0, 0, 'RESULTADO DEL TEST VOCACIONAL', 0, 1, 'C');
        $pdf->Ln(8);
        $pdf->Cell(0, 0, utf8_decode('Cuestionario de Intereses Profesionales (CIP-R)'), 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->SetFont('Arial', '', 12);
        $texto = "¡Hola " . strtoupper($estudiante->nombre_completo) . "! Estos son los resultados de tu Test de Orientación Vocacional. Basándonos en tus intereses, estas son algunas de las carreras que podrías considerar estudiar.";
        $pdf->MultiCell(0, 10, utf8_decode($texto), 0, 'C');
        $y = $pdf->GetY();

        $pdf->Ln(10);

        $y = $pdf->GetY();
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(60, 16, utf8_decode('ÁREA'), 1, 1, 'C');
        $pdf->SetY($y);
        $pdf->SetX(70);
        $pdf->MultiCell(0, 8, utf8_decode('ÁREAS Y CARRERAS EXISTENTES EN LA UNIVERSIDAD PÚBLICA DE EL ALTO'), 1, 'C');
        $area_exis = utf8_decode('No existen en UPEA, por lo que sugiere otras instituciones o carreras');
        $pdf->SetFont('Arial', '', 12);

        foreach ($data as $value) {
            $y = $pdf->GetY();
            $cantCarreras = count($value['carreras']);
            $pdf->Cell(60, (mb_strlen($value['area_existente'], 'UTF-8') > 60 ? $cantCarreras + 2 : $cantCarreras + 1) * 8, utf8_decode($value['area']), 1, 1, 'C');
            $pdf->SetY($y);
            $pdf->SetX(70);
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->MultiCell(0, 8, utf8_decode($value['area_existente']), 'R', 'C');
            $pdf->SetFont('Arial', '', 10);
            $cont = 0;
            foreach ($value['carreras'] as $c) {
                $cont++;
                $pdf->SetX(70);
                if ($cont == $cantCarreras) {
                    // Lógica para el último elemento
                    $pdf->Cell(0, 8, utf8_decode($tab . '» ' . $c['carrera']), 'RB', 1, 'L');
                } else {
                    // Lógica para otros elementos
                    $pdf->Cell(0, 8, utf8_decode($tab . '» ' . $c['carrera']), 'R', 1, 'L');
                }
            }
        }
        $pdf->Ln(15);
        $x = $pdf->GetX();
        $y = $pdf->GetY();
        $imageHeight = 90;
        $margin = 10;
        $pageWidth = $pdf->GetPageWidth();
        $pageHeight = $pdf->GetPageHeight();

        if ($y + $imageHeight > $pageHeight - $margin) {
            $pdf->AddPage('P', 'Letter');
            $y = $margin;
        }
        $pdf->Image('tmp/tmp_image.png', $x, $y, 196.8, $imageHeight);
        $pdf->Output('I', 'ov_' . $estudiante->nombre . '_' . $estudiante->paterno . '.pdf');
        File::delete('tmp/tmp_image.png');
        exit;
    }
}
