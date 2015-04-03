<?php
include("util.php");

if(isset($_POST['valor2'])){
$idMateria = $_POST['valor2'];
$mysql=connect();
$query="SELECT materia, dificultad, habilidad, interesante, eva FROM MAT where clave=$idMateria"; 
$queryDescripcion = "SELECT descripcion from materia where clave=$idMateria";                 
$results = $mysql->query($query);


echo '<table class="table table-bordered table-hover" style="text-align:center">';
echo '<thead style="text-align:center !important">';
echo '<tr>';
echo '<th style="text-align:center; color:#536270">Difucultad</th>';
echo '<th style="text-align:center; color:#536270">Habilidad</th>';
echo '<th style="text-align:center; color:#536270">Interesante</th>';
echo '<th style="text-align:center; color:#536270">Evaluadores</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

while ($row = mysqli_fetch_array($results, MYSQLI_BOTH)) 
{
$nombreMateria = $row[0];
echo '<td>'.$row[1].'</td>';
echo '<td>'.$row[2].'</td>';
echo '<td>'.$row[3].'</td>';
echo '<td><span class=badge>'.$row[4].'</span></td>';
echo '</tr>';
}        
mysqli_free_result($results);
disconnect($mysql);
echo "</br>";
echo "<h4 style='color:#81BEF7'>".$nombreMateria."</h4>";
echo "</br>";
}
?>