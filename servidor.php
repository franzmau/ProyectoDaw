<?php

include_once("util.php");
session_start();


if (isset($_SESSION['id1']) || isset($_POST['agregar'])){
if(isset($_POST['agregar'])) {
 $a = $_POST['profesor'];
 $b=$_POST['Materia'];
 $_SESSION['id1']=$a;
       $_SESSION['id2']=$b;
}
    
   $a1=query("Select Nombre from profesor where id_maestro=".$_SESSION['id1']);
   $a2=query("Select descripcion from materia where clave=".$_SESSION['id2']);

    $_SESSION['prof']=$a1[0];
    $_SESSION['mat']=$a2[0];
    
    
    
  include("preguntas.php");
    
}

if(isset($_POST['evaluar'])){
   /*echo "MIRA VALGO 1 vale".$_POST['uno'];
    echo "Mira algo 2 vale".$_POST['dos'];
    echo "Mira algo 3 vale".$_POST['tres'];
    echo "Mira algo 4 vale".$_POST['cuatro'];
    echo "Mira algo 5 vale".$_POST['cinco'];
    echo "Mira algo 6 vale".$_POST['seis'];
    echo "Mira algo 7 vale".$_POST['siete'];
     */    
 if($_POST['uno']!=0 && $_POST['dos']!=0 && $_POST['tres']!=0 && $_POST['cuatro']!=0 && $_POST['cinco']!=0 && $_POST['seis']!=0 && $_POST['siete']!=0){   
    
   
    
    insertRecord($_SESSION['id1'], $_SESSION['id2'],1, $_POST['uno'], $_POST['dos'], $_POST['tres'], $_POST['cuatro'], $_POST['cinco'],$_POST['seis'],date("Y-m-d H:i:s"),$_POST['siete']);
    
    $_SESSION['id1']=null;
        $_SESSION['id2']=null;
      
    
    header ('Location:./index.php?sal=1');
     
    
 }

    
    
    else {
 
        
        
     echo '<script language="javascript">';
echo 'alert("Todos los campos deben de estar completos")';
echo '</script>';
    
 }
    

}


  ?> 