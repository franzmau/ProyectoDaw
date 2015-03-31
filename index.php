<?php
  include_once("util.php");
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

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header page-scroll">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    </div>
    <span class="navbar-header page-scroll"><a class="navbar-brand page-scroll" href="#page-top">REPOMA</a></span> 
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="hidden"> <a href="#page-top"></a></li>
        <li> <a class="page-scroll" href="#profesores">Profesores</a> </li>
        <li> <a class="page-scroll" href="#cursos">Cursos</a> </li>
        <li> <a class="page-scroll" href="#contact">Contactanos</a> </li>
        
        <!-- Login -->
        <li class="dropdown"> 
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="User dashboard"> Login or Signup<i class="fa fa-lg fa-user"></i></a>
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
    <div class="intro-text">
      <div class="intro-lead-in">Bienvenido al sistema de Retroalimentacion a Profesores y Materias</div>
      <div class="intro-heading">REPOMA</div>
      <a href="#profesores" class="page-scroll btn btn-xl"><i class="fa fa-angle-double-down fa-4x"></i></a> </div>
  </div>
  </div>
</header>

<!-- Profesores -->
<section id="profesores" align="center">
  
          <h3>Profesores</h3>
              <div style="width:70%; margin:0 auto; border:0px green dashed;" align="center">
                <table class="table table-bordered" id="sample_1">
                  <thead>
                    <tr>
                       <th>Nombre</th>
                       <th># Evaluaciones</th>
                       <th>Promedio</th>
                     </tr>
                  </thead>
                  
                  <tbody>
                      <!--Los profesores mejor calificados por curso-->
                      <?php
                       desplegarProfesores();

                      function desplegarProfesores(){
                      $mysql=connect();
                      $query="SELECT p.nombre, p.califiacion, Count(e.idProfesor) FROM profesor p, evaluan e where p.id_maestro=e.idProfesor Group by e.idProfesor ORDER BY p.califiacion desc";
                      $results = $mysql->query($query);
                      while ($row = mysqli_fetch_array($results, MYSQLI_BOTH)) 
                      {
                      echo '<tr>';
                      echo '<td>'.$row[0].'</td>';
                      echo '<td>'.$row[2].'</td>';
                      echo '<td>'.$row[1].'</td>';
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
</section>

<!-- Cursos-->
<section id="cursos" class="bg-light-gray" align="center">
      <h3>Cursos</h3>
        <div style="width:70%; margin:0 auto; border:0px green dashed;" align="center">
            <table class="table table-bordered" id="sample_2">
               <thead>
                  <tr>
                    <th>Curso</th>
                    <th># Evaluaciones</th>
                    <th>Maestro</th>
                  </tr>
               </thead>
                      
               <tbody>
                        <!--Los cursos mejor calificados por maestro -->
                        <?php
                         desplegarCursos();

                        function desplegarCursos(){
                        $mysql=connect();
                        $query="SELECT m.descripcion, m.calif, Count(e.idMateria) FROM materia m, evaluan e where m.clave=e.idMateria Group by e.idMateria ORDER BY m.calif desc";
                        $results = $mysql->query($query);
                        while ($row = mysqli_fetch_array($results, MYSQLI_BOTH)) 
                        {
                        echo '<tr>';
                        echo '<td>'.$row[0].'</td>';
                        echo '<td>'.$row[2].'</td>';
                        echo '<td>'.$row[1].'</td>';
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
     <button style=" width:15%; height:60%;" type="button" data-target="#myModal" class="btn btn-lg btn-success" data-toggle="modal">Evaluar</button>
    </div>
  </div> 
</section>


<section id="contact">

</section>


<!--=======SCRIPT POP-UP================================-->
    <script src="https://code.jquery.com/jquery.js"></script>

<!--=======POP-UP================================-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
             <h4 class="modal-title" id="myModalLabel" style="color:#0080FF;  font-size: 100%;font-weight: bold;text-align:center">Elige a tu profesor y el curso que imparte</h4>
              </div>
               <div class="modal-body" style="color:black; font-size: 80%; font-weight: bold;text-align:center">
              
                                
              <form name="evaluar" method="POST" action="servidor.php" >
                <table class="tabla_forma">
                  <tr>
                    <td><strong>Maestro:</strong></td>
                    <td colspan="2" id="p" class="p" name="p" ><?php dropdown("profesor", "SELECT * FROM profesor"); ?></td>
                    </tr>
                  <tr>
                    <td><strong>Materias</strong></td>
                  <td colspan="2">  <div id="h" class="h" ><?php if(isset($p)){
                   dropdown("Materia", "SELECT clave,descripcion FROM materia ");} ?>  </div></td> 
                  </tr>
                </table>
              </form>

               </div>
           <div class="modal-footer">
         <div class="add" id="add"><input  type="submit" name="agregar" class="btn btn-primary" data-target="#Evaluar" data-dismiss="modal" class="btn btn-lg btn-success" data-toggle="modal" type="submit" id="agregar" name="agregar" value="Evaluar"></div>
       </div>
    </div>
  </div>
</div>

<!--=======POP-UP================================-->
<div class="modal fade" id="Evaluar" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
   <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
              <h4 class="modal-title" id="myModalLabel" style="color:#0080FF;font-size: 100%;font-weight: bold;text-align:center">Evaluación</h4>
                </div>
                 <div class="modal-body" style="color:black; font-size: 80%; font-weight: bold;text-align:center">
                
                   <form action="servidor.php" method="POST" name="preguntas" >

                    <?php
                    echo "Estas a punto de evaluar a ".$_SESSION['prof'] ."<br> En la materia de ".$_SESSION['mat']." <br>";
                    $prof=$_SESSION['prof'];
                    $mat=$_SESSION['mat'];
                    ?>
                    <br>

                          <label> Qué tan seguido consideras que <?php echo $prof=$_SESSION['prof'];?> ha explicado bien los temas y no existe alguna dificultad para entender un tema? </label>
                          <br>
                          <br>
                          <select name="cuatro" >
                          <option value="0">----Selecciona una----</option> 
                            <option value="1">Siempre</option>
                            <option value="2">Casi siempre</option>
                            <option value="3">A veces</option>
                            <option value="4">Casi nunca</option>
                            <option value="5"> Nunca</option>
                          </select>
                    <br>
                    
                          <label> Qué nivel de dificultad consideras que tiene <?php echo $prof=$_SESSION['mat'];?>  independientemente del profesor? </label>
                          <br>
                          <br>
                          <select name="siete" >
                          <option value="0">----Selecciona una----</option> 
                            <option value="1">Muy Sencilla</option>
                            <option value="2">Sencillo</option>
                            <option value="3">Media</option>
                            <option value="4">Difícil</option>
                            <option value="5">Muy Difícil</option>
                          </select>
                    <br>
                          <label> ¿Cuánta habilidad consideras tu que has desarrollado?</label>
                          <br>
                          <br>
                          <select name="dos" >
                            <option value="0">----Selecciona una----</option>
                            <option value="1">Demasiada</option>
                            <option value="2"> Considerable</option>
                            <option value="3">Lo normal</option>
                            <option value="4">Un poco </option>
                            <option value="5"> Nada</option>
                          </select>
                    <br>
                          <label>¿Consideras que  <?php echo $prof=$_SESSION['prof'];?> tiene <a href="#" title="Capacidad para idear, inventar o emprender cosas" class="tooltip"> <span title="Mas información">  iniciativa</span></a>  y compromiso contigo? </label>
                          <br>
                          <br>
                          <select name="tres">
                            <option value="0">---Selecciona una----</option>
                            <option value="1">Siempre</option>
                            <option value="2">Casi siempre</option>
                            <option value="3">A veces</option>
                            <option value="4">Casi nunca</option>
                            <option value="5"> Nunca</option>
                          </select>
                    <br>
                          <label> ¿Al momento de tener una duda  <?php echo $prof=$_SESSION['prof'];?> se preocupa por ella? </label>
                          <br>
                          <br>
                          <select name="uno">
                            <option value="0">----Selecciona una----</option>
                            <option value="1">Siempre</option>
                            <option value="2">Casi siempre</option>
                            <option value="3">A veces</option>
                            <option value="4">Casi nunca</option>
                            <option value="5"> Nunca</option>
                          </select>

                    <br>
                          <label>¿Consideras que  <?php echo $prof=$_SESSION['prof'];?> es consistenete con lo que dice y hace a lo largo del semestre?</label>
                          <br>
                          <br>
                          <select name="cinco">
                            <option value="0">----Seleccione una----</option>
                            <option value="1">Siempre</option>
                            <option value="2">Casi siempre</option>
                            <option value="3">A veces</option>
                            <option value="4">Casi nunca</option>
                            <option value="5"> Nunca</option>
                          </select>
                    <br>
                          <label>¿Consideras  <?php echo $MAT=$_SESSION['mat'];?> Interesante?</label>
                          <br>
                          <br>
                          <select name="seis">
                            <option value="0">----Selecciona una----</option>
                            <option value="1"> Muy interesante</option>
                            <option value="2">Interesante</option>
                            <option value="3">Neutra</option>
                            <option value="4">muy poco interesante</option>
                            <option value="5"> Nada interesante</option>
                          </select>
                          <br><br>
                </form>
              </div>
             <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
         <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
       </div>
    </div>
 </div>
</div>

<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-8"> <span class="copyright">2015 | Creada por Nancy, Francisco y Ruben.</span> </div>
      <div class="col-md-4">
    </div>
  </div>
</footer>



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

<!-- Contact Form JavaScript --> 
<script src="js/jqBootstrapValidation.js"></script> 
<script src="js/contact_me.js"></script> 

<!-- Custom Theme JavaScript --> 
<script src="js/five.js"></script>

<!-- Dyanmic-data-table--> 
<script type="text/javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/DT_bootstrap.js"></script>
<script src="js/dynamic-table.js"></script>

 </body>
</html>
