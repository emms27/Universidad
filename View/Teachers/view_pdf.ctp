<?php
////////////////////////////////////// Get teacher data ////////////////////////////////////// 

$name = $property['Teacher']['name'];
$last_name = $property['Teacher']['last_name'];

$courses = '<h2>Cursos del profesor</h2>';
foreach($property['Course'] as $ks => $course):
	$courses .= '<div class="course">';
	$courses .= '<strong>'. $course['name'] . '</strong><br>' . $course['description'];
	$courses .= '</div>';
endforeach;

$html = '<style>
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
$html .= '<h2>Profesor</h2>';
$html .= '<div class="teacher">';
$html .= '<div><strong>Nombre</strong></div>';
$html .= '<div class="field_data">'.$name . '</div>';
$html .= '<div><strong>Apellidos</strong></div>';
$html .= '<div class="field_data">'.$last_name . '</div>';
$html .= '</div>';

$html .= $courses;
////////////////////////////////////// end Get course data //////////////////////////////////////

////////////////////////////////////// CakePHP interaction ////////////////////////////////////// 
App::import('Vendor', 'tcpdf', array('file' => 'tcpdf'.DS.'tcpdf.php'));
App::uses('CakeTime', 'Utility');
// Ver más timezones en http://en.wikipedia.org/wiki/List_of_IANA_time_zones
$date = CakeTime::convert(time(), new DateTimeZone('America/Mexico_City'));

$tcpdf = new TCPDF();
$tcpdf->SetAuthor("Alex Arriaga http://fenix.cs.buap.mx");
$tcpdf->SetTitle($property['Student']['name']);
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
$filename = 'Profesor_'.$property['Teacher']['name'].'_'.$date.'.pdf';
echo $tcpdf->Output($filename, 'D');
?>
