<?php
include("util.php");

if(isset($_POST['valor'])){
$idProfesor = $_POST['valor'];
$mysql=connect();
$query="SELECT profesor, consitente, dificultad, iniciativa, preocupacion, eva FROM PROF where maestro=$idProfesor";                
$results = $mysql->query($query);


echo '<table class="table table-bordered table-hover" style="text-align:center">';
echo '<thead style="text-align:center !important">';
echo '<tr>';
echo '<th style="text-align:center; color:#536270">Consistencia</th>';
echo '<th style="text-align:center; color:#536270">Dificultad</th>';
echo '<th style="text-align:center; color:#536270">Iniciativa</th>';
echo '<th style="text-align:center; color:#536270">Preocupacion</th>';
echo '<th style="text-align:center; color:#536270">Evaluadores</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

while ($row = mysqli_fetch_array($results, MYSQLI_BOTH)) 
{
$nombreProfesor = $row[0];
echo '<td>'.$row[1].'</td>';
echo '<td>'.$row[2].'</td>';
echo '<td>'.$row[3].'</td>';
echo '<td>'.$row[4].'</td>';
echo '<td><span class=badge>'.$row[5].'</span></td>';
echo '</tr>';
}        
mysqli_free_result($results);
disconnect($mysql);
echo "</br>";
echo "<h4 style='color:#81BEF7'>".$nombreProfesor."</h4>";
echo "</br>";
}
?>