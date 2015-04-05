
<?php
  include_once("util.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>REPOMA: Evaluacion</title>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="css/five.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,600,600italic' rel='stylesheet' type='text/css'>
</head>

<body id="page-top" class="index">

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
   <div><span class="navbar-header page-scroll"><a style="left:100%" class="navbar-brand page-scroll" href="index.php">REPOMA</a></span></div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="hidden"> <a href="#page-top"></a></li>
        <li> <a class="page-scroll" href="index.php"><strong>Regresar a REPOMA <span class="glyphicon glyphicon-arrow-right"></span></strong></a></li>
       </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>


<!-- Profesores -->
<section id="profesores" align="center">
          <h1>Evaluación</h1>

            </br></br>
              <div style="width:70%; margin:0 auto; border:0px green dashed;" align="center">
               <form action="servidor.php" method="POST" name="preguntas" >
<?php
        echo "Estas a punto de evaluar a <p class='lead'>".$_SESSION['prof'] ."</p><br> En la materia de <p class='lead'> ".$_SESSION['mat']." </p><br>";
    $prof=$_SESSION['prof'];
    $mat=$_SESSION['mat'];
?>

<ul class="list-group">
  <li class="list-group-item">
<label> ¿Consideras que <?php echo 
$prof=$_SESSION['prof'];
 ?>  ha explicado bien los temas de la materia y no existe alguna dificultad para entenderlos?</label>
</br>
<select name="cuatro" style="width:40%">
<option value="0">----Selecciona una----</option> 
  <option value="1">Siempre</option>
  <option value="2">Casi siempre</option>
  <option value="3">A veces</option>
  <option value="4">Casi nunca</option>
  <option value="5"> Nunca</option>
</select>

  </li>
  <li class="list-group-item">
<label> Qué nivel de dificultad consideras que tiene <?php echo 
$prof=$_SESSION['mat'];
 ?>  independientemente del profesor? </label>
</br>
<select name="siete" style="width:40%">
<option value="0">----Selecciona una----</option> 
  <option value="1">Muy Sencilla</option>
  <option value="2">Sencillo</option>
  <option value="3">Media</option>
  <option value="4">Difícil</option>
  <option value="5">Muy Difícil</option>
</select> 
  </li>

  <li class="list-group-item">
<label> ¿Cuánta habilidad consideras que has desarrollado?</label>
</br>
<select name="dos" style="width:40%">
  <option value="0">----Selecciona una----</option>
  <option value="1">Demasiada</option>
  <option value="2"> Considerable</option>
  <option value="3">Lo normal</option>
  <option value="4">Un poco </option>
  <option value="5"> Nada</option>
</select>
  </li>

  <li class="list-group-item">
<label>¿Consideras que  <?php echo 
$prof=$_SESSION['prof'];
 ?> tiene <span class="label label-warning">iniciativa</span> y compromiso contigo? </label>
</br>
<select name="tres" style="width:40%">
  <option value="0">---Selecciona una----</option>
  <option value="1">Siempre</option>
  <option value="2">Casi siempre</option>
  <option value="3">A veces</option>
  <option value="4">Casi nunca</option>
  <option value="5"> Nunca</option>
</select>
</br>

<div align="right">
<span class="label label-warning">Capacidad para idear, inventar o emprender cosas</span>
</div>
  </li>

<li class="list-group-item">
<label> ¿Al momento de tener una duda<?php echo 
$prof=$_SESSION['prof'];
 ?> se preocupa por resolverla? </label>
</br>
<select name="uno" style="width:40%">
  <option value="0">----Selecciona una----</option>
  <option value="1">Siempre</option>
  <option value="2">Casi siempre</option>
  <option value="3">A veces</option>
  <option value="4">Casi nunca</option>
  <option value="5"> Nunca</option>
</select>
</li>

<li class="list-group-item">
<label>¿Consideras que  <?php echo 
$prof=$_SESSION['prof'];
 ?> es consistenete con lo que dice y hace a lo largo del semestre?</label>
<select name="cinco" style="width:40%">
  <option value="0">----Seleccione una----</option>
  <option value="1">Siempre</option>
  <option value="2">Casi siempre</option>
  <option value="3">A veces</option>
  <option value="4">Casi nunca</option>
  <option value="5"> Nunca</option>
</select>
</li>

<li class="list-group-item">
  <label>¿Consideras  <?php echo 
$MAT=$_SESSION['mat'];
 ?> Interesante?</label>
 </br>
<select name="seis" style="width:40%">
  <option value="0">----Selecciona una----</option>
  <option value="1"> Muy interesante</option>
  <option value="2">Interesante</option>
  <option value="3">Neutra</option>
  <option value="4">muy poco interesante</option>
  <option value="5"> Nada interesante</option>
</select>
</li>
</ul>
<button type="submit" style="width:40%"name ="evaluar" class="btn btn-lg btn-success" id="evaluar">Evaluar ahora</button>
</form>
</div>
</section>


<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-8"> <span class="copyright">2015 | Creada por Nancy Espinosa, Mauricio Villanueva y Ruben Rivera.</span> </div>
      <div class="col-md-4">
    </div>
  </div>
</footer>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<!-- jQuery --> 
<script type="text/javascript" src="js/jquery.js"></script>


<!-- Bootstrap Core JavaScript --> 
<script src="js/bootstrap.min.js"></script> 

<!-- Plugin JavaScript --> 
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script> 
<script src="js/classie.js"></script> 
<script src="js/cbpAnimatedHeader2.js"></script> 

<!-- Custom Theme JavaScript --> 
<script src="js/five.js"></script>
        
</body>
</html>