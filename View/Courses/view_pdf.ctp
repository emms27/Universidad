<?php
////////////////////////////////////// Get course data ////////////////////////////////////// 
$name = $property['Course']['name'];
$desc = $property['Course']['description'];
$teacher    = $property['Teacher']['name'] . ' ' . $property['Teacher']['last_name'];
$teacher_cv = $property['Teacher']['cv'];
$students = '<h2>Alumnos inscritos</h2>';
foreach($property['Student'] as $ks => $student):
	$students .=  '<div class="student">';
	$students .= $student['name'] . ' ' . $student['last_name'];
	$students .= '</div>';
endforeach;

$html = '<style>
div.student {
        color: #777;
        background-color: #F9F9F9;
        font-family: helvetica;
        font-size: 9pt;
	     text-align: left;
		  border:1px solid #DDD;
    }
h2{
    color: #F09A2E;
    font-weight: bold;
    padding: 10px 0;
}
.field_data{
      background-color: #F4F4F4;
    	border: 1px solid #AAAAAA;
	   padding-top: 10px;
		padding-bottom: 10px;
		padding-left: 10px;
		height: 20px;
		margin-left: 10px;
    }
</style>';

$html .= '<h2>Curso</h2>';
$html .= '<div class="course">';
$html .= '<div><strong>Nombre</strong></div>';
$html .= '<div class="field_data">'.$name . '</div>';
$html .= '<div><strong>Descripción</strong></div>';
$html .= '<div class="field_data">'.$desc . '</div>';
$html .= '<div><strong>Profesor</strong></div>';
$html .= '<div class="field_data">'.$teacher . '</div>';
$html .= '<div><strong>Curriculum vitae</strong></div>';
$html .= '<div class="field_data">'.$teacher_cv . '</div>';
$html .= '</div>';

$html .= $students;
////////////////////////////////////// end Get course data //////////////////////////////////////
$html .='<h1 style="text-align: center; ">
	<strong>asfasfd</strong></h1>
<p>
	<img alt="" src="http://www.htsjpuebla.gob.mx/filesec/seccionpage/htsjpuebla_small.jpg" style="width: 70px; height: 80px; " /></p>
<p>
	<strong><span style="background-color:#ffff00;">ASFASFASDFAF &nbsp;</span> SFSDFSDGSDFGSDFG<img alt="kiss" height="20" src="http://127.0.0.1/DDFM/js/ckeditor/plugins/smiley/images/kiss.gif" title="kiss" width="20" /></strong></p>
<p style="text-align: center; ">
	&nbsp;</p>
<p>
	ASDFASFASDF</p>
<p>
	<em>ASDFASD</em></p>
<p>
	<u>FASD</u></p>
<p>
	<u>FASD</u></p>
<p>
	<u>FASD</u></p>

';

////////////////////////////////////// CakePHP interaction ////////////////////////////////////// 
App::import('Vendor', 'tcpdf', array('file' => 'tcpdf'.DS.'tcpdf.php'));
App::uses('CakeTime', 'Utility');
// Ver más timezones en http://en.wikipedia.org/wiki/List_of_IANA_time_zones
$date = CakeTime::convert(time(), new DateTimeZone('America/Mexico_City'));

$tcpdf = new TCPDF();
$tcpdf->SetAuthor("Alex Arriaga http://fenix.cs.buap.mx");
$tcpdf->SetTitle($property['Course']['name']);
$textfont = 'helvetica';
$tcpdf->SetAutoPageBreak( false );
$tcpdf->setHeaderFont(array($textfont,'',20));
$tcpdf->xheadercolor = array(150,0,0);
$tcpdf->xheadertext = 'F3N1x';
$tcpdf->xfootertext = 'Derechos reservados';

// add a page (required with recent versions of tcpdf)
$tcpdf->AddPage();

// Now you position and print your page content
$tcpdf->SetTextColor(0, 0, 0);
$tcpdf->SetFont($textfont, '', 10);
$tcpdf->writeHTML($html, true, false, true, false, '');
$filename = 'Curso_'.$property['Course']['name'].'_'.$date.'.pdf';
echo $tcpdf->Output($filename, 'D');
?>
