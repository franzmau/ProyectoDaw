<?php
  include_once("util.php");
   if(isset($_GET["sal"])){ 
 
echo '<script language="javascript">';
echo 'document.getElementById("mensaje").innerHTML = <div class="alert alert-success">Paragraph changed!</div>';
echo '</script>';

}
$p=0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>REPOMA</title>

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


        <!-- Login -->
        <li class="dropdown"> 
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Login or Signup<i class="glyphicon glyphicon-user"></i></a>
                   <div class="dropdown-menu">

                    <form id="formLogin" class="form container-fluid">
                      <br>
                      <div class="form-group">
                      <input class="form-control" name="username" id="username" type="text" placeholder="Username" pattern="^[a-z,A-Z,0-9,_]{6,15}$" data-valid-min="6" title="Enter your username" required="">
                      </div>
                      <div class="form-group">  
                      <input class="form-control" name="password" id="password" type="password" placeholder="Password" title="Enter your password" required="">
                      </div>  
                      <button type="button" id="btnLogin" class="btn btn-block">Login</button>
                      <hr>
                      <a href="#" title="Fast and free sign up!" id="btnNewUser" data-toggle="collapse" data-target="#formRegister" class="small">New User? Sign-up..</a>
                    </form>

                    <form id="formRegister" class="form collapse container-fluid">
                      <br>
                      <div class="form-group">
                      <input class="form-control" name="email" id="inputEmail" type="email" placeholder="Email" required="">
                      </div>
                      <div class="form-group">
                      <input class="form-control" name="username" id="inputUsername" type="text" placeholder="Username" pattern="^[a-z,A-Z,0-9,_]{6,15}$" data-valid-min="6" title="Choose a username" required="">
                      </div>
                      <div class="form-group">
                      <input class="form-control" name="password" id="inputpassword" type="password" placeholder="Password" required="">
                      </div>
                      <div class="form-group">
                      <input class="form-control" name="verify" id="inputVerify" type="password" placeholder="Password (again)" required="">
                      </div>
                      <div class="form-group">
                      <button type="button" id="btnRegister" class="btn btn-block">Sign Up</button>
                      </div>
                    </form>

                    <hr>
                    <div class="container-fluid">
                      <a class="small" data-toggle="modal" role="button" href="#forgotPasswordModal">Forgot username or password?</a>
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
              <div style="width:70%; margin:0 auto; border:0px green dashed;" align="center">
                <table class="table table-bordered table-hover" id="sample_1" style="text-align:center">
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
                       desplegarProfesores();

                      function desplegarProfesores(){
                      $mysql=connect();
                      $query="SELECT p.nombre, p.califiacion, Count(e.idProfesor), d.dep, p.id_maestro FROM profesor p, evaluan e, departamento d where p.id_maestro=e.idProfesor and p.dep = d.id Group by e.idProfesor ORDER BY p.califiacion desc";
                      $results = $mysql->query($query);
                      while ($row = mysqli_fetch_array($results, MYSQLI_BOTH)) 
                      {
                      $idProfesor=$row[4];
                      echo '<tr>';
                      echo '<td align="left"><strong><i class="fa fa-lg fa-user" style="color:#536270"><a href="#" title="Consideraciones" type="submit" data-target="#Profesor" data-toggle="modal" onclick="ElegirProfesor('.$idProfesor.')"></i>   '.$row[0].'</a></strong></td>';
                      echo '<td><span class="label label-warning">'.$row[3].'</span></td>';
                      echo '<td><span class="badge">'.$row[2].'</span></td>';
                      echo '<td><span class="label label-success">'.$row[1].'</span></td>';
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
      <button style=" width:20%; height:60%;" type="submit" data-target="#myModal" class="btn btn-lg btn-success" onclick="AccionVentana2()" data-toggle="modal">Evaluar</button> 
   </br>
<div style="right:10%; position:relative"><img src="img/califica.png"><div>
</section>

<!-- Cursos-->
<section id="cursos" class="bg-light-gray" align="center">
      <h1>Cursos</h1>
      </br></br>
        <div style="width:70%; margin:0 auto; border:0px green dashed;" align="center">
            <table class="table table-bordered table-hover" id="sample_2" style="text-align:center">
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
                         desplegarCursos();

                        function desplegarCursos(){
                        $mysql=connect();
                        $query="SELECT m.descripcion, m.calif, Count(e.idMateria), d.dep, m.clave FROM materia m, evaluan e, departamento d where m.clave=e.idMateria and d.id=m.dep Group by e.idMateria ORDER BY m.calif desc";
                        $results = $mysql->query($query);
                        while ($row = mysqli_fetch_array($results, MYSQLI_BOTH)) 
                        {
                          $idMateria=$row[4];

                        echo '<td align="left"><strong><i class="glyphicon glyphicon-book" style="color:#536270;"><a href="#" title="Consideraciones" type="submit" data-target="#Materia" data-toggle="modal" onclick="ElegirMateria('.$idMateria.')"></i>   '.$row[0].'</a></strong></td>';
                        echo '<td><span class="label label-warning">'.$row[3].'</span></td>';
                        echo '<td><span class="badge">'.$row[2].'</span></td>';
                        echo '<td><span class="label label-success">'.$row[1].'</span></td>';
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
       </div>
     <button style=" width:20%; height:60%;" type="button" data-target="#myModal" class="btn btn-lg btn-success" data-toggle="modal">Evaluar</button>
      <div style="left:10%; position:relative"><img src="img/califica2.png"></div>
    </div>
  </div> 
</section>

<!--=======POP-UP PROFESOR================================
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

<!--=======POP-UP MATERIA================================
<div class="modal fade" id="Materia" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
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
-->
<!--=======POP-UP================================-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
             <h3 class="modal-title" id="myModalLabel" style="color:#0080FF;  font-size: 100%;font-weight: bold;text-align:center">Elige a tu profesor y el curso que imparte</h3>
              </div>
                <form name="evaluar" method="POST" action="servidor.php">
                 <div class="modal-body" style="color:black; font-size: 80%; font-weight: bold;text-align:center">
        
                    <div><h4 style="color: #536270">Profesor  </h4><div colspan="2" id="p" class="p" name="p" ><?php dropdown("profesor", "SELECT * FROM profesor"); ?></div></div>
                    </br>
                    <div><h4 style="color: #536270">Materia</h4>
                    <div colspan="2" id="h" class="h"><?php if(isset($p)){dropdown("Materia", "SELECT clave,descripcion FROM materia ");} ?></div></div>

              </div>
            <div class="modal-footer">
         <div class="add" id="add"><input type="submit" id="agregar" name="agregar" class="btn btn-primary" value="Evaluar"></div>
        </div>
       </form>
    </div>
  </div>
</div>

<!--=======POP-UP================================-->

<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-8"> <span class="copyright">2015 | Creada por Nancy Espinosa, Mauricio Villanueva y Ruben Rivera.</span> </div>
      <div class="col-md-4">
    </div>
  </div>
</footer>


<!--=======SCRIPT POP-UP================================-->
<script src="https://code.jquery.com/jquery.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

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
