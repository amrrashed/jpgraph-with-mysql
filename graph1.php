<?php // content="text/plain; charset=utf-8"
require_once ('src/jpgraph.php');
require_once ('src/jpgraph_bar.php');

require_once 'config.php';
//bar linear fix
//$datay=array(12,8,19,3,10,5,6,8);
//$datax=array("1432-1433","فبراير","Mar","Apr","Maj","Jun","Jul","Aug","Sep");
$query="SELECT count(`departement`),`univeryear` FROM `student_data` group by `univeryear` ORDER BY `univeryear`  ";
$Data1 =  mysqli_query($conn,$query) ;
$Data2 =  mysqli_query($conn,$query) ;
$datay=array();
$datax=array();
while($row = mysqli_fetch_array($Data1)){
$datay[]=$row['count(`departement`)'];
}
while($row2 = mysqli_fetch_array($Data2)){
$datax[]=$row2['univeryear'];
}
// Create the graph. These two calls are always required
$graph = new Graph(700,400,"auto");
$graph->SetScale('textlin');
 
$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);
// Adjust the margin a bit to make more room for titles
$graph->SetMargin(40,30,20,40);
$graph->SetBox(false);
// Create a bar pot
$bplot = new BarPlot($datay);
$fcol='#440000';
$tcol='#FF9090';

$bplot->SetFillGradient($fcol,$tcol,GRAD_LEFT_REFLECTION);
// Adjust fill color
$bplot->SetColor("white");
$bplot->SetFillColor("#cc1111");
$graph->Add($bplot);

// Setup the titles
//$graph->title->Set('A basic bar graph');
$graph->xaxis->title->Set('university year');
$graph->yaxis->title->Set('number of thesis');


$graph->title->SetFont(FF_TIMES,FS_BOLD);
$graph->yaxis->title->SetFont(FF_TIMES,FS_BOLD);
$graph->xaxis->title->SetFont(FF_TIMES,FS_BOLD);


$graph->xaxis->SetTickLabels($datax);
//$graph->xaxis->SetLabelAngle(50);
$graph->xaxis->SetTextTickInterval(1);
// Display the graph
$graph->Stroke();
?>
