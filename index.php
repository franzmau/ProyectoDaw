<?php
  include_once("util.php");
   session_start();
//  //require 'Slim/Slim.php';
// //\Slim\Slim::registerAutoloader();

// //$app->get('/hello/:name', function ($name) {
//   //  echo "Hello, $name";
// //});

// //$app->run();
// //*/

if(isset($_GET["sal"])){ 
 
echo '<script language="javascript">';
echo 'alert("Se agrego la evaluacion a profesor y materia")';
echo '</script>';
}

if(isset($_GET["salida"])&&  $_SESSION['addp']==1){ 
 
echo '<script language="javascript">';
echo 'alert("Se agrego al profesor")';
echo '</script>';
$_SESSION['addp']=0;
}

if( isset($_GET["sa"])&& $_SESSION['addm']==1){ 
 
echo '<script language="javascript">';
echo 'alert("Se agrego la materia")';
echo '</script>';
$_SESSION['addp']=0;
}

if( isset($_GET["s"])&& $_SESSION['edp']==1){ 
 
echo '<script language="javascript">';
echo 'alert("Se edito al profesor")';
echo '</script>';

$_SESSION['edp']=0;
}

if( isset($_GET["s3"])&& $_SESSION['edm']==1){ 
 
echo '<script language="javascript">';
echo 'alert("Se edito la materia")';
echo '</script>';
$_SESSION['edm']=0;

}


if( isset($_GET["s4"])&& $_SESSION['addre']==1){ 
 
echo '<script language="javascript">';
echo 'alert("Se agrego la relacion")';
echo '</script>';
$_SESSION['addre']=0;
}

if( isset($_GET["s5"])&& $_SESSION['r']==1){ 
 
echo '<script language="javascript">';
echo 'alert("Se elimino la relacion")';
echo '</script>';
$_SESSION['r']=0;
}

$p=0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>REPOMA</title>


<link href="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet"></link>

<!--AJAX--> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

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


<div class="mensaje"></div>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 

  <div id="repoma" style="visibility:hidden"><span class="navbar-header page-scroll"><a style="left:100% " class="navbar-brand page-scroll" href="#page-top">REPOMA</a></span></div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="hidden"> <a href="#page-top"></a></li>
        <li> <a class="page-scroll" href="#profesores">Profesores</a> </li>
        <li> <a class="page-scroll" href="#cursos">Cursos</a> </li>
        <li> <a class="page-scroll" href="#estadisticas">Estadisticas</a> </li>


        <!-- Login -->
        <li class="dropdown"> 
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Ingresa o Registrate <i class="glyphicon glyphicon-user"></i></a>
                   <div class="dropdown-menu">

              <form id="formLogin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form container-fluid">
              <br>
              <div class="form-group">
                <input class="form-control" name="username" id="username" size="10" type="text" placeholder="Matricula" pattern="^[a-z,A-Z,0-9,_]{6,15}$" data-valid-min="6" title="Enter your username" required="">
              </div>
              <div class="form-group">  
                <input class="form-control" name="password" id="password" size="10" type="password" placeholder="Contraseña" title="Enter your password" required="">
              </div>  
              <button type="submit" name="login" id="btnLogin" class="btn btn-block btn-primary" >Ingresa</button>
              <hr>
              <?php if(isset($_POST['username']) && isset($_POST['password']) && !isset($_POST['uname']) && !isset($_POST['passwd']) && !isset($_POST['verify']) && !isset($_POST['email'])){
                $u=substr(strtolower($_POST['username']),0,15);
                $pa=substr(strtolower($_POST['password']),0,15);
                         $url = "http://localhost/REPOMA/vendor/slim/slim/index.php/validaUsuario/$u/$pa"; //Route to the REST web service
                         $c = curl_init($url);
                         $response = curl_exec($c);
                         curl_close($c);
                       } 
                       ?>
                       <a href="#" id="btnNewUser" data-toggle="collapse" data-target="#formRegister" class="small"><strong>¿Eres nuevo? Registrate...</strong></a>
                     
                </form>

                     <form id="formRegister" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="signin" class="form collapse container-fluid">
                      <br>

                      <div class="form-group">
                        <input class="form-control" name="email" id="inputEmail" type="text"  size="10" placeholder="Matricula" required="">
                      </div>

                      <div class="form-group">
                        <input class="form-control" name="uname" id="inputUsername" type="text"  placeholder="Nombre" pattern="^[a-z,A-Z,0-9,_]{6,15}$" data-valid-min="9" required="">
                      </div>
                      <div class="form-group">
                        <input class="form-control" name="passwd" id="inputpassword" type="password" size="10" placeholder="Contraseña" required="">
                      </div>
                      <div class="form-group">
                        <input class="form-control" name="verify" id="inputVerify" type="password" size="10" placeholder="Contraseña (nuevamente)" required="">
                      </div>
                      <div class="form-group">
                        <button type="submit" id="btnRegister" href="#" class="btn btn-block btn-primary">Registrate</button>

                    
                          <?php 
                          if(isset($_POST['uname']) && isset($_POST['passwd']) && isset($_POST['verify']) && isset($_POST['email'])){
                            $u=substr(strtolower($_POST['uname']),0,15); $pa=substr(strtolower($_POST['passwd']),0,15);
                            $vfy=substr(strtolower($_POST['verify']),0,15); $mail=substr(strtolower($_POST['email']),0,15);
                         $url = "http://localhost/REPOMA/vendor/slim/slim/index.php/insertaUsuario/$u/$pa/$vfy/$mail"; //Route to the REST web service
                         $c = curl_init($url);
                         $response = curl_exec($c);
                         curl_close($c);
                       }
                       ?> 
                     </div>
                   </form>

                    <hr>
                    <div class="container-fluid">
                      <a class="small" href="#" data-toggle="modal" role="button"  data-target="#olvidaste" data-toggle="modal"><strong>¿Olvidaste tu contraseña?<strong></a>
                   </div>    
              </div>
          </li>
       </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>

<!-- Header -->
<header>

  <div class="container">
   <img src="img/tec.png" align="left">
    <div class="intro-text">
      <div class="intro-lead-in">Bienvenido al sistema de Retroalimentación a Profesores y Materias</div>
      <div class="intro-heading">REPOMA</div>
      <a href="#profesores" class="page-scroll btn btn-xl"><i class="fa fa-angle-double-down fa-4x"></i></a> </div>
    </div>
  </div>
</header>

<!-- Profesores -->
<section id="profesores" align="center">
          <h1>Profesores</h1>
            </br></br>
              <div class="table-responsive" style="width:70%; margin:0 auto; border:0px green dashed;" align="center">
                <table class="table table-hover" id="sample_1" style="text-align:center">
                  <thead>
                    <tr>
                       <th style="text-align:center">Nombre</th>
                       <th style="text-align:center">Departamento</th>
                       <th style="text-align:center">Evaluadores</th>
                       <th style="text-align:center">Promedio</th>
                     </tr>
                  </thead>
                  
                  <tbody>
                      <!--Los profesores mejor calificados por curso-->
                      <?php
                      $url = "http://localhost/REPOMA/vendor/slim/slim/index.php/desplegarProfesores"; //Route to the REST web service
                      $c = curl_init($url);
                      $response = curl_exec($c);
                      curl_close($c);
                      
                      ?>
                  </tbody>
                </table>
             </div>
       </div>
      <button type="submit" style="width:20%" data-target="#myModal" class="btn btn-lg btn-success" onclick="AccionVentana2()" data-toggle="modal">Evaluar</button> 
   </br>
<div style="right:10%; position:relative"><img src="img/califica.png"><div>
</section>

<!-- Cursos-->
<section id="cursos" class="bg-light-gray" align="center">
      <h1>Cursos</h1>
      </br></br>
        <div class="table-responsive" style="width:70%; margin:0 auto; border:0px green dashed;" align="center">
            <table class="table table-hover" id="sample_2" style="text-align:center">
               <thead style="text-align:center !important">
                  <tr>
                    <th style="text-align:center">Curso</th>
                     <th style="text-align:center">Departamento</th>
                    <th style="text-align:center">Evaluadores</th>
                    <th style="text-align:center">Promedio</th>
                  </tr>
               </thead>
                      
               <tbody>
                        <!--Los cursos mejor calificados por maestro -->
                        <?php
                         $url = "http://localhost/REPOMA/vendor/slim/slim/index.php/desplegarCursos"; //Route to the REST web service
                      $c = curl_init($url);
                      $response = curl_exec($c);
                      curl_close($c);
                        
                        ?>
              </tbody>
            </table>
          </div>
          </div>
        </div>
     <button style=" width:20%" type="button" data-target="#myModal" class="btn btn-lg btn-success" data-toggle="modal">Evaluar</button>
      <div style="left:10%; position:relative"><img src="img/califica2.png"></div>
   </div>
  </div> 
</section>



<!-- Estadisticas -->
<section id="estadisticas" align="center">
        <h1>Estadisticas</h1>
          <h6>¿Que esperas? Checa las más nuevas evaluaciones y las no tan nuevas</h6>
            </br></br></br>
              <div class="table-responsive" style="width:80%; margin:0 auto; border:0px green dashed;" align="center">
                <table class="table table-hover" id="sample_3" style="text-align:center">
                  <thead>
                    <tr>
                       <th style="text-align:center"><strong><i class="fa fa-lg fa-user" style="color:#536270"></i> Profesor</strong></th>
                       <th style="text-align:center"><strong><i class="glyphicon glyphicon-book" style="color:#536270;"></i> Materia</strong></th>
                       <th style="text-align:center"><strong><i class="glyphicon glyphicon-user"></i>Usuario</strong></th>
                       <th style="text-align:center"><strong><i class="fa fa-lg fa-user" style="color:#536270"></i></br>Disponible</strong></th>
                       <th style="text-align:center"><i class="glyphicon glyphicon-book" style="color:#536270;"></i></br>Habilidades</strong></th>
                       <th style="text-align:center"><strong><i class="fa fa-lg fa-user" style="color:#536270"></i></br>Compromiso</strong></th>
                       <th style="text-align:center"><strong><i class="fa fa-lg fa-user" style="color:#536270"></i></br>Dificultad</th>
                       <th style="text-align:center"><strong><i class="fa fa-lg fa-user" style="color:#536270"></i></br>Consistencia</strong></th>
                       <th style="text-align:center"><strong><i class="glyphicon glyphicon-book" style="color:#536270;"></i></br>Interesante</strong></th>
                       <th style="text-align:center"><strong><i class="glyphicon glyphicon-book" style="color:#536270;"></i></br>Dificultad</strong></th>
                     </tr>
                  </thead>   
                  <tbody>
                        <!--Los cursos mejor calificados por maestro -->
                        <?php
                         desplegarVista();

                        function desplegarVista(){
                        $mysql=connect();
                        $query="SELECT profesor, materia, usuario, disponible, habilidades, compromiso, dificultad_prof, consistencia, interesante, dificultad_mat from vista";
                        $results = $mysql->query($query);
                        while ($row = mysqli_fetch_array($results, MYSQLI_BOTH)) 
                        {

                        echo '<tr>';
                        echo '<td><strong>'.$row[0].'<strong></td>';
                        echo '<td><strong>'.$row[1].'<strong></td>';
                        echo '<td><span class="label label-primary">'.$row[2].'</span></td>';
                        echo '<td>'.$row[3].'</td>';
                        echo '<td>'.$row[4].'</td>';
                        echo '<td>'.$row[5].'</td>';
                        echo '<td>'.$row[6].'</td>';
                        echo '<td>'.$row[7].'</td>';
                        echo '<td>'.$row[8].'</td>';
                        echo '<td>'.$row[9].'</td>';
                        echo '</tr>';
                        }
                        mysqli_free_result($results);
                        disconnect($mysql);
                        }
                        ?>

                  </tbody>
                </table>
             </div>
             </div>
</section>


<!-- GESTOR REPOMA-->
<section id="cursos" class="bg-light-gray" align="center">
      <h1>Gestor REPOMA</h1>
      </br>

<!-- REGISTRAR / MODIFICAR / ELIMINAR PROFESOR -->
<div align="center" class="table-responsive" >  
  <table style="width:90%; height:90%" class="especial">
    <thead id="especial">
     <tr id="especial"><th id="especial">
      <div class"container" style="width:100%;">
        <h3 style="text-align:center"><i class="fa fa-lg fa-user" style="color:#536270"></i> Profesor</h3>
          <div class="row">
            <div class="col-sm-10 col-sm-offset-1">

            <div class="comment-tabs">
            <ul class="nav nav-tabs" role="tablist" >
                <li class="active"><a href="#agregarP" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Agregar</h4></a></li>
                <li><a href="#modificarP" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Modificar</h4></a></li>
            </ul>

            <div class="tab-content administrador" align="center">
              </br></br>  
                <div class="tab-pane active" id="agregarP"> 
                 
                 <form name="profe" method="POST" action="servidor.php">
                  
                  <label>Nombre </label>
                  <input style="width:60%" type="text" name="nombre">
                  </br></br>
                  
                  <label>Departamento </label>
                  <?php
                  dropdown("Depa", "Select * from departamento ");
                  ?>

                  </br></br></br>
                  <input type="submit" class="btn btn-success" style="width:35%" name="addp" value="Agregar">
                  </form>

                 </br></br>
                </div>

                <div class="tab-pane" id="modificarP">
                    
                    <form name="editprofe" method="POST" action="servidor.php">
                    
                    <label>Profesor </label>
                    <?php 
                    $aux=regresa1 ("SELECT count(*) FROM `profesor`","count(*)");
                    echo '<select name ="p1" >';
                     for($i=1;$i<=$aux;$i++){
                    echo '<option value='.$i.'>'.$i.'</option>';}
                    echo '</select>'?>
                    </br>
                      <label>Nombre </label>
                      <input style="width:60%" type="text" name="newname">

                      </br></br>

                      <label>Departamento</label>
                      <?php
                      dropdown("Dep2", "Select * from departamento ");
                      ?>

                    </br></br></br>
                      <input type="submit" class="btn btn-warning" style="width:35%" name="editp" value="Modificar">   
                    </br></br>
                    </form> 

                     </br></br>
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 </th>

<th id="especial"></th> <!-- ////////// -->

<!-- REGISTRAR / MODIFICAR / ELIMINAR MATERIA -->
<th id="especial">
 <div class="container" style="width:100%;">
   <h3 style="text-align:center"><i class="glyphicon glyphicon-book" style="color:#536270;"></i> Curso</h3>
    <div class="row">
       <div class="col-sm-10 col-sm-offset-1">
            <div class="comment-tabs">
            <ul class="nav nav-tabs" role="tablist" >
                <li class="active"><a href="#agregarM" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Agregar</h4></a></li>
                <li><a href="#modificarM" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Modificar</h4></a></li>
            </ul>

            <div class="tab-content administrador" align="center">
                
                <div class="tab-pane active" id="agregarM">

                  </br></br>

                  <form name="materia" method="POST" action="servidor.php">
                    <label>Materia</label>

                    <input style="width:60%" type="text" name="descripcion">

                    </br></br>

                    <label>Departamento</label>
                    <?php dropdown("Dep", "Select * from departamento ");?>

                  </br></br></br>
                    <input type="submit" name="addm" class="btn btn-success" style="width:35%" value="Agregar">
                  </form>  
                  </br></br>
                </div>

                <div class="tab-pane" id="modificarM">


                  <form name="editmat" method="POST" action="servidor.php">
                   </br></br>

                     <label>Curso </label>

                     <?php 
                      $aux=regresa1 ("SELECT count(*) FROM `materia`","count(*)");
                      echo '<select name ="p2" >';
                      for($i=1;$i<=$aux;$i++){
                      echo '<option value='.$i.'>'.$i.'</option>';  
                      }
                      echo '</select>'
                      ?>

                      <label>Nombre </label>
                      <input style="width:60%" type="text" name="newm">
                      </br></br>

                      <label>Departamento </label>
                      <?php
                      dropdown("Dep3", "Select * from departamento ");
                      ?>

                      </br></br></br>
                      <input type="submit" class="btn btn-warning" style="width:35%" name="editm" value="Modificar">   
                    </br></br>
                  </form>           
                  </br></br>
                  </div>

                </div>
               </div>
              </div>
            </div>
          </div>
      </th></tr>
    </thead>
  </table>
 </div>  
</br></br></br></br>

<!-- REGISTRAR / MODIFICAR / ELIMINAR RELACION PROFESOR-CURSO -->
<div align="center" class="table-responsive">
 <table style="width:90%; height:90%" class="especial">
   <thead id="especial">
     <tr id="especial">
      <th id="especial">

      <div class"container" style="width:50%;">
        <h3 style="text-align:center"><i class="fa fa-lg fa-user" style="color:#536270"></i>  Profesor <i class="glyphicon glyphicon-resize-horizontal"></i><i class="glyphicon glyphicon-book" style="color:#536270;"></i> Curso</h3>
          <div class="row">
            <div class="col-sm-10 col-sm-offset-1">

            <div class="comment-tabs">
            <ul class="nav nav-tabs" role="tablist" >
                <li class="active"><a href="#agregarPM" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Agregar</h4></a></li>
                <li><a href="#modificarPM" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Modificar</h4></a></li>
                <li><a href="#eliminarPM" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Eliminar</h4></a></li>
            </ul>

            <div class="tab-content administrador" align="center">
              </br></br>

                <div class="tab-pane active" id="agregarPM"> 
                 
               </form>
                    <br>
                    <form name="unir" method="POST" action="servidor.php">
                    <label>Relación </label> <br>
                    <?php
                    
                    dropdown("M", "SELECT clave,descripcion FROM materia ");
                    echo "<br><br>";
                   dropdown("P", "SELECT id_maestro,nombre FROM profesor ");

                 
                    ?>
                    </br></br>
                    <input type="submit" class="btn btn-success" style="width:35%" name="addr" value="Agregar">      
                 </br></br>
                </form>
                 </br></br></br>
                </div>

                <div class="tab-pane" id="modificarPM">
                
                </div>


                <div class="tab-pane" id="eliminarPM">

                <form name="elire" method="POST" action="servidor.php">
                <?php 
                  $aux=regresa1 ("SELECT count(*) FROM `imparten`","count(*)");
                  echo"Relación </br></br>";
                  echo '<select name ="i" >';
                   for($i=1;$i<=$aux;$i++){
                  echo '<option value='.$i.'>'.$i.'</option>';}echo '</select>'?>
                  </br></br>
                  <input type="submit" class="btn btn-danger" style="width:35%" name="editr" value="Eliminar">
                </form>
                 </br></br></br>
                </div>

               </div>
              </div>
            </div>
          </div>
          </div>

        </th>
      </tr>
    </thead>
 </table>
</div> 
</section>



<!=======POP-UP OLVIDASTE TU CONTRASEÑA================================-->
<div class="modal fade" id="olvidaste" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title" id="myModalLabel" style="color:#0080FF;  font-size: 100%;font-weight: bold;text-align:center">¿Haz olvidado tu contraseña? No te preocupes ¡Recuperala ahora!</h3>
            </div>
         <form id="helpForm" method="post" class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="helpForm">
             
             <div class="modal-body" style="color:black; font-size: 80%; font-weight: bold;text-align:center">
              
                    <div id="olvidasteContraseña">

                   <?php if(isset($_POST['usuarioH']) && isset($_POST['emailH'])){
                  $uH=substr(strtolower($_POST['usuarioH']),0,15); $mailH=substr(strtolower($_POST['emailH']),0,15);
                  $url = "http://localhost/REPOMA/vendor/slim/slim/index.php/EnviarContraseña/$uH/$mailH"; //Route to the REST web service
                  $c = curl_init($url);
                  $response = curl_exec($c);
                  curl_close($c);}?>

                   </div>


        </br>
         <div class="form-group">
           <label class="col-md-3 control-label">Matricula</label>
           <div class="col-md-7">
             <input type="text" class="form-control" name="usuario" />
           </div>
         </div>
         
        <div class="form-group">
            <label class="col-lg-3 control-label">Correo Electrónico</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" name="email" />
            </div>
         </div>


            </div>
           <div class="modal-footer">
               <div class="form-group">
               <div class="col-md-5 col-md-offset-3">
               <button type="submit" class="btn btn-primary" class="btn btn-default">Enviar</button>
               </div>
               </div>
           </div>
      </form>
       </div>
    </div>
  </div>
</div>



<!--=======POP-UP PROFESOR================================-->
<div class="modal fade" id="Profesor" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-body" style="color:black; font-size: 80%; font-weight: bold;text-align:center">
                <div id="cuerpo2">
                </div>
            </div>
           <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
       </div>
    </div>
  </div>
</div>




<!=======POP-UP MATERIA================================-->
<div class="modal fade" id="materia" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-body" style="color:black; font-size: 80%; font-weight: bold;text-align:center">
                <div id="cuerpo">
                </div>
            </div>
           <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
       </div>
    </div>
  </div>
</div>


<!--=======POP-UP EVALUAR================================-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
             <h3 class="modal-title" id="myModalLabel" style="color:#0080FF;  font-size: 100%;font-weight: bold;text-align:center">Elige a tu profesor y el curso que imparte</h3>
              </div>
                <form name="evaluar" method="POST" action="servidor.php">
                 <div class="modal-body" style="color:black; font-size: 80%; font-weight: bold;text-align:center">
        
                    <div><h4 style="color: #536270">Profesor  </h4><div colspan="2" id="p" class="p" name="p" ><?php dropdown("profesor", "SELECT distinct p.id_maestro, p.nombre FROM profesor p, imparten i where p.id_maestro=i.id_prof"); ?></div></div>
                    </br>
                    <div><h4 style="color: #536270">Materia</h4>
                    <div colspan="2" id="h" class="h"></div></div>

              </div>
            <div class="modal-footer">
         <div class="add" id="add"><input type="submit" id="agregar" name="agregar" class="btn btn-primary" value="Evaluar"></div>
        </div>
       </form>
    </div>
  </div>
</div>
  <!--PIE DE PAGINA -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-8"> <span class="copyright">2015 | Creada por Nancy Espinosa, Mauricio Villanueva y Ruben Rivera.</span> </div>
      <div class="col-md-4">
    </div>
  </div>
</footer>




<script src="//oss.maxcdn.com/jquery/1.11.1/jquery.min.js"></script>
<script src="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
 
<script type="text/javascript" src="validator.js"></script>


<!--SCRIPT POP-UP--> 
<script src="https://code.jquery.com/jquery.js"></script>

<!--Opciones POP-UP--> 
<script src="js/jv.js"></script>

<!-- jQuery --> 
<script src="js/jquery.js"></script> 

<!-- Bootstrap Core JavaScript --> 
<script src="js/bootstrap.min.js"></script> 

<!-- Plugin JavaScript --> 
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script> 
<script src="js/classie.js"></script> 
<script src="js/cbpAnimatedHeader.js"></script> 

<!-- Custom Theme JavaScript --> 
<script src="js/five.js"></script>

<!-- Dyanmic-data-table--> 
<script type="text/javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/DT_bootstrap.js"></script>
<script src="js/dynamic-table.js"></script>

 </body>
</html>

