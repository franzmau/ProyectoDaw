 <link href="bootstrap.min.css" rel="stylesheet">
                        <!-- <link href="/five.css" rel="stylesheet"> -->
                        <script src="bootstrap.min.js"></script> 
<?php
/**
 * Step 1: Require the Slim Framework
 *
 * If you are not using Composer, you need to require the
 * Slim Framework and register its PSR-0 autoloader.
 *
 * If you are using Composer, you can skip this step.
 */
require 'Slim/Slim.php';


\Slim\Slim::registerAutoloader();

include_once("../../../util.php");


/**
 * Step 2: Instantiate a Slim application
 *
 * This example instantiates a Slim application using
 * its default settings. However, you will usually configure
 * your Slim application now by passing an associative array
 * of setting names and values into the application constructor.
 */
$app = new \Slim\Slim();

/**
 * Step 3: Define the Slim application routes
 *
 * Here we define several Slim application routes that respond
 * to appropriate HTTP request methods. In this example, the second
 * argument for `Slim::get`, `Slim::post`, `Slim::put`, `Slim::patch`, and `Slim::delete`
 * is an anonymous function.
 */

$app->get('/desplegarProfesores', function(){
                      // $mysql=connect();

                      // $query="SELECT p.nombre, p.califiacion, Count(e.idProfesor) FROM profesor p, evaluan e where p.id_maestro=e.idProfesor Group by e.idProfesor ORDER BY p.califiacion desc";
                      // $results = $mysql->query($query);
                      // while ($row = mysqli_fetch_array($results, MYSQLI_BOTH)) 
                      // {
                      // echo '<tr>';
                      // echo '<td>'.$row[0].'</td>';
                      // echo '<td>'.$row[2].'</td>';
                      // echo '<td>'.$row[1].'</td>';
                      // echo '</tr>';
                      // }
                      // mysqli_free_result($results);
                      // disconnect($mysql);
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
                      

});

$app->get('/desplegarCursos', function(){
                      // $mysql=connect();

                      // $query="SELECT m.descripcion, m.calif, Count(e.idMateria) FROM materia m, evaluan e where m.clave=e.idMateria Group by e.idMateria ORDER BY m.calif desc";
                      //   $results = $mysql->query($query);
                      //   while ($row = mysqli_fetch_array($results, MYSQLI_BOTH)) 
                      //   {
                      //   echo '<tr>';
                      //   echo '<td>'.$row[0].'</td>';
                      //   echo '<td>'.$row[2].'</td>';
                      //   echo '<td>'.$row[1].'</td>';
                      //   echo '</tr>';
                      //   }
                      // mysqli_free_result($results);
                      // disconnect($mysql);
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

});

$app->get('/validaUsuario/:usr/:passwd', function($user,$password){
                      $mysql=connect();

                      $query="SELECT * FROM `usuario` WHERE `matricula` ='".$user."'";
                        $results = $mysql->query($query);
                        if($row = mysqli_fetch_array($results, MYSQLI_BOTH)) 
                        {
                            if($row[2]==$password){
                                echo '<script language="javascript">';
                                echo 'alert("Saludos usuario : '.$user.'")';
                                echo '</script>';
                            }else{
                                echo '<script language="javascript">';
                                echo 'alert("Contraseña equivocada")';
                                echo '</script>';
                            }
                        }else{
                            echo '<script language="javascript">';
                                echo 'alert("Contraseña o Usuario equivocado")';
                                echo '</script>';
                        }
                      mysqli_free_result($results);
                      disconnect($mysql);

});

$app->get('/insertaUsuario/:usr/:passwd/:vfy/:mail', function($user,$password,$verify,$mail){
                      

                      if($password==$verify){
                        if(insertRecord($user,$password)){
                            echo '<script language="javascript">';
                                echo 'alert("Ususario nuevo agregado")';
                                echo '</script>';
                        }
                      }else{
                            echo '<script language="javascript">';
                                echo 'alert("Las contraseñas no coinciden. Intente de nuevo")';
                                echo '</script>';
                        }
});




// GET route
$app->get(
    '/',
    function () {
        $template = <<<EOT
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8"/>
            <title>Slim Framework for PHP 5</title>
            <style>
                html,body,div,span,object,iframe,
                h1,h2,h3,h4,h5,h6,p,blockquote,pre,
                abbr,address,cite,code,
                del,dfn,em,img,ins,kbd,q,samp,
                small,strong,sub,sup,var,
                b,i,
                dl,dt,dd,ol,ul,li,
                fieldset,form,label,legend,
                table,caption,tbody,tfoot,thead,tr,th,td,
                article,aside,canvas,details,figcaption,figure,
                footer,header,hgroup,menu,nav,section,summary,
                time,mark,audio,video{margin:0;padding:0;border:0;outline:0;font-size:100%;vertical-align:baseline;background:transparent;}
                body{line-height:1;}
                article,aside,details,figcaption,figure,
                footer,header,hgroup,menu,nav,section{display:block;}
                nav ul{list-style:none;}
                blockquote,q{quotes:none;}
                blockquote:before,blockquote:after,
                q:before,q:after{content:'';content:none;}
                a{margin:0;padding:0;font-size:100%;vertical-align:baseline;background:transparent;}
                ins{background-color:#ff9;color:#000;text-decoration:none;}
                mark{background-color:#ff9;color:#000;font-style:italic;font-weight:bold;}
                del{text-decoration:line-through;}
                abbr[title],dfn[title]{border-bottom:1px dotted;cursor:help;}
                table{border-collapse:collapse;border-spacing:0;}
                hr{display:block;height:1px;border:0;border-top:1px solid #cccccc;margin:1em 0;padding:0;}
                input,select{vertical-align:middle;}
                html{ background: #EDEDED; height: 100%; }
                body{background:#FFF;margin:0 auto;min-height:100%;padding:0 30px;width:440px;color:#666;font:14px/23px Arial,Verdana,sans-serif;}
                h1,h2,h3,p,ul,ol,form,section{margin:0 0 20px 0;}
                h1{color:#333;font-size:20px;}
                h2,h3{color:#333;font-size:14px;}
                h3{margin:0;font-size:12px;font-weight:bold;}
                ul,ol{list-style-position:inside;color:#999;}
                ul{list-style-type:square;}
                code,kbd{background:#EEE;border:1px solid #DDD;border:1px solid #DDD;border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;padding:0 4px;color:#666;font-size:12px;}
                pre{background:#EEE;border:1px solid #DDD;border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;padding:5px 10px;color:#666;font-size:12px;}
                pre code{background:transparent;border:none;padding:0;}
                a{color:#70a23e;}
                header{padding: 30px 0;text-align:center;}
            </style>
        </head>
        <body>
            <header>
                <a href="http://www.slimframework.com"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHIAAAA6CAYAAABs1g18AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAABRhJREFUeNrsXY+VsjAMR98twAo6Ao4gI+gIOIKOgCPICDoCjCAjXFdgha+5C3dcv/QfFB5i8h5PD21Bfk3yS9L2VpGnlGW5kS9wJMTHNRxpmjYRy6SycgRvL18OeMQOTYQ8HvIoJKiiz43hgHkq1zvK/h6e/TyJQXeV/VyWBOSHA4C5RvtMAiCc4ZB9FPjgRI8+YuKcrySO515a1hoAY3nc4G2AH52BZsn+MjaAEwIJICKAIR889HljMCcyrR0QE4v/q/BVBQva7Q1tAczG18+x+PvIswHEAslLbfGrMZKiXEOMAMy6LwlisQCJLPFMfKdBtli5dIihRyH7A627Iaiq5sJ1ThP9xoIgSdWSNVIHYmrTQgOgRyRNqm/M5PnrFFopr3F6B41cd8whRUSufUBU5EL4U93AYRnIWimCIiSI1wAaAZpJ9bPnxx8eyI3Gt4QybwWa6T/BvbQECUMQFkhd3jSkPFgrxwcynuBaNT/u6eJIlbGOBWSNIUDFEIwPZFAtBfYrfeIOSRSXuUYCsprCXwUIZWYnmEhJFMIocMDWjn206c2EsGLCJd42aWSyBNMnHxLEq7niMrY2qyDbQUbqrrTbwUPtxN1ZZCitQV4ZSd6DyoxhmRD6OFjuRUS/KdLGRHYowJZaqYgjt9Lchmi3QYA/cXBsHK6VfWNR5jgA1DLhwfFe4HqfODBpINEECCLO47LT/+HSvSd/OCOgQ8qE0DbHQUBqpC4BkKMPYPkFY4iAJXhGAYr1qmaqQDbECCg5A2NMchzR567aA4xcRKclI405Bmt46vYD7/Gcjqfk6GP/kh1wovIDSHDfiAs/8bOCQ4cf4qMt7eH5Cucr3S0aWGFfjdLHD8EhCFvXQlSqRrY5UV2O9cfZtk77jUFMXeqzCEZqSK4ICkSin2tE12/3rbVcE41OBjBjBPSdJ1N5lfYQpIuhr8axnyIy5KvXmkYnw8VbcwtTNj7fDNCmT2kPQXA+bxpEXkB21HlnSQq0gD67jnfh5KavVJa/XQYEFSaagWwbgjNA+ywstLpEWTKgc5gwVpsyO1bTII+tA6B7BPS+0PiznuM9gPKsPVXbFdADMtwbJxSmkXWfRh6AZhyyzBjIHoDmnCGaMZAKjd5hyNJYCBGDOVcg28AXQ5atAVDO3c4dSALQnYblfa3M4kc/cyA7gMIUBQCTyl4kugIpy8yA7ACqK8Uwk30lIFGOEV3rPDAELwQkr/9YjkaCPDQhCcsrAYlF1v8W8jAEYeQDY7qn6tNGWudfq+YUEr6uq6FZzBpJMUfWFDatLHMCciw2mRC+k81qCCA1DzK4aUVfrJpxnloZWCPVnOgYy8L3GvKjE96HpweQoy7iwVQclVutLOEKJxA8gaRCjSzgNI2zhh3bQhzBCQQPIHGaHaUd96GJbZz3Smmjy16u6j3FuKyNxcBarxqWWfYFE0tVVO1Rl3t1Mb05V00MQCJ71YHpNaMcsjWAfkQvPPkaNC7LqTG7JAhGXTKYf+VDeXAX9IvURoAwtTFHvyYIxtnd5tPkywrPafcwbeSuGVwFau3b76NO7SHQrvqhfFE8kM0Wvpv8gVYiYBlxL+fW/34bgP6bIC7JR7YPDubcHCPzIp4+cum7U6NlhZgK7lua3KGLeFwE2m+HblDYWSHG2SAfINuwBBfxbJEIuWZbBH4fAExD7cvaGVyXyH0dhiAYc92z3ZDfUVv+jgb8HrHy7WVO/8BFcy9vuTz+nwADAGnOR39Yg/QkAAAAAElFTkSuQmCC" alt="Slim"/></a>
            </header>
            <h1>Welcome to Slim!</h1>
            <p>
                Congratulations! Your Slim application is running. If this is
                your first time using Slim, start with this <a href="http://docs.slimframework.com/#Hello-World" target="_blank">"Hello World" Tutorial</a>.
            </p>
            <section>
                <h2>Get Started</h2>
                <ol>
                    <li>The application code is in <code>index.php</code></li>
                    <li>Read the <a href="http://docs.slimframework.com/" target="_blank">online documentation</a></li>
                    <li>Follow <a href="http://www.twitter.com/slimphp" target="_blank">@slimphp</a> on Twitter</li>
                </ol>
            </section>
            <section>
                <h2>Slim Framework Community</h2>

                <h3>Support Forum and Knowledge Base</h3>
                <p>
                    Visit the <a href="http://help.slimframework.com" target="_blank">Slim support forum and knowledge base</a>
                    to read announcements, chat with fellow Slim users, ask questions, help others, or show off your cool
                    Slim Framework apps.
                </p>

                <h3>Twitter</h3>
                <p>
                    Follow <a href="http://www.twitter.com/slimphp" target="_blank">@slimphp</a> on Twitter to receive the very latest news
                    and updates about the framework.
                </p>
            </section>
            <section style="padding-bottom: 20px">
                <h2>Slim Framework Extras</h2>
                <p>
                    Custom View classes for Smarty, Twig, Mustache, and other template
                    frameworks are available online in a separate repository.
                </p>
                <p><a href="https://github.com/codeguy/Slim-Extras" target="_blank">Browse the Extras Repository</a></p>
            </section>
        </body>
    </html>
EOT;
        echo $template;
    }
);

// POST route
$app->post(
    '/post',
    function () {
        echo 'This is a POST route';
    }
);

// PUT route
$app->put(
    '/put',
    function () {
        echo 'This is a PUT route';
    }
);

// PATCH route
$app->patch('/patch', function () {
    echo 'This is a PATCH route';
});

// DELETE route
$app->delete(
    '/delete',
    function () {
        echo 'This is a DELETE route';
    }
);

<<<<<<< HEAD
=======
$app->get('/desplegarProfesores', function(){
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

});

$app->get('/desplegarCursos', function(){
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

});

$app->get('/validaUsuario/:usr/:passwd', function($user,$password){
                      $mysql=connect();

                      $query="SELECT * FROM `usuario` WHERE `matricula` ='".$user."'";
                        $results = $mysql->query($query);
                        if($row = mysqli_fetch_array($results, MYSQLI_BOTH)) 
                        {
                            if($row[2]==$password){
                                echo '<script language="javascript">';
                                echo 'alert("Saludos usuario : '.$user.'")';
                                echo '</script>';
                            }else{
                                echo '<script language="javascript">';
                                echo 'alert("Contraseña equivocada")';
                                echo '</script>';
                            }
                        }else{
                            echo '<script language="javascript">';
                                echo 'alert("Contraseña o Usuario equivocado")';
                                echo '</script>';
                        }
                      mysqli_free_result($results);
                      disconnect($mysql);

});

$app->get('/insertaUsuario/:usr/:passwd/:vfy/:mail', function($user,$password,$verify,$mail){
                      

                      if($password==$verify){
                        if(insertRecord($user,$password)){
                            echo '<script language="javascript">';
                                echo 'alert("Ususario nuevo agregado")';
                                echo '</script>';
                        }
                      }else{
                            echo '<script language="javascript">';
                            echo '<div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong>Alto!</strong> Las contraseñas no coinciden. Intente de nuevo.
                        </div>';
                                // echo 'alert("Las contraseñas no coinciden. Intente de nuevo")';
                                echo '</script>';
                        }
});

 $app->get('/materias/:input', function($profe){
                      
    dropdown("Materia", "SELECT m.clave, m.descripcion FROM imparten i, materia m WHERE m.clave=i.id_mat and i.id_prof='$profe'");
                    
});

>>>>>>> alert
/**
 * Step 4: Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();
