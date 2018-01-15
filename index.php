<?php
//require '/vendor/autoload.php';
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');

//$array = explode("\n", file_get_contents('log.txt'));

$date = json_decode(file_get_contents("log_date.json"));
$voltage = json_decode(file_get_contents("log_voltage.json"));


// Setup the graph
$graph = new Graph(3500,1100);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Voltage Meassurement');
$graph->SetBox(false);
$graph->setMargin(150,50,10,50);

$graph->SetScale('linlin',180,250);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);
$graph->yaxis->SetFont(FF_DV_SANSSERIF, FS_NORMAL, 14);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels($date);
$graph->xaxis->SetTextLabelInterval(2);
$graph->xaxis->SetFont(FF_DV_SANSSERIF, FS_NORMAL, 14);
$graph->xaxis->setLabelAngle(50);
$graph->xgrid->SetColor('#E3E3E3');

// Create the first line
$p1 = new LinePlot($voltage);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetLegend('Voltage [V]');

$graph->legend->SetFrameWeight(1);
$graph->legend->SetFont(FF_DV_SANSSERIF, FS_NORMAL, 14);
$graph->legend->SetMarkAbsSize(15);

// Output line
$graph->Stroke();

?>
