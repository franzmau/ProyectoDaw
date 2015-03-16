<?php
	include_once("util.php");
?>

<html>
    <title>REPOMA</title>
    <meta charset="UTF-8" />
    <!-- HOJAS DE ESTILOS Y JS-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

</head>
<body>
	<article>
		<header> Bienvenido a la Retroalimentacion a Profesores y Materias (REPOMA)</header>
        <br>
        <p>En esta página podrás evaluar al profesor y la materia que imparte</p>
        
    <form name="evaluar" method="POST">
			<table class="tabla_forma">
				<tr>
					<td><strong>Maestro:</strong></td>
					<td colspan="2" id="p" class="p" name="p" ><?php dropdown("profesor", "SELECT * FROM profesor"); ?></td>
					</tr>
				<tr>
					<td><strong>Materias</strong></td>
					<td colspan="2"><?php dropdown("Materia", "SELECT clave, CONVERT(descripcion USING utf8) FROM materia"); ?></td>
					
				</tr>
			</table>
			<div class="submit"><input type="submit" id="agregar" name="agregar" value="Agregar"></div>
		</form>
        
        <script >
            function poner(p){
        var aux=p;
                alert(p);
                write.document.getElementById("p");
            }</script>
    
        
        
    
</html>