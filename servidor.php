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

if(isset($_POST['addp'])){

     insertar($_POST['nombre'],$_POST['Depa'],1);

      
    $_SESSION['addp']=1;
header ('Location:./Index.php?salida=1');
} 


if(isset($_POST['addr'])){

     inserta($_POST['M'],$_POST['P']);
  
      
    $_SESSION['addre']=1;
header ('Location:./Index.php?s4=1');
} 


if(isset($_POST['editr'])){
 
     borrar($_POST['i']);
  
      
    $_SESSION['r']=1;
header ('Location:./Index.php?s5=1');
} 




if(isset($_POST['editp'])){

     editar($_POST['newname'],$_POST['Dep2'],$_POST['p1'],1);

      
    $_SESSION['edp']=1;
header ('Location:./index.php?s=1');
}




if(isset($_POST['editm'])){

     editar($_POST['newm'],$_POST['Dep3'],$_POST['p2'],2);

      
    $_SESSION['edm']=1;
header ('Location:./Index.php?s3=1');
}






if(isset($_POST['addm'])){

     insertar($_POST['descripcion'],$_POST['Dep'],2);

      
    $_SESSION['addm']=1;
header ('Location:./Index.php?sa=1');
} 



if(isset($_POST['evaluar'])){
  
 if($_POST['uno']!=0 && $_POST['dos']!=0 && $_POST['tres']!=0 && $_POST['cuatro']!=0 && $_POST['cinco']!=0 && $_POST['seis']!=0 && $_POST['siete']!=0){   
    
   try{
    
    insertRecord($_SESSION['id1'], $_SESSION['id2'],1, $_POST['uno'], $_POST['dos'], $_POST['tres'], $_POST['cuatro'], $_POST['cinco'],$_POST['seis'],date("Y-m-d H:i:s"),$_POST['siete']);
           
   }catch(Exception $e){
   
   }
     
     
     
     
    $_SESSION['id1']=null;
        $_SESSION['id2']=null;
      
     
     
     
    $_SESSION['m']=1;
header ('Location:./index.php?sal=1');
     
    
 }

    
    
    else {
 
        
        
     echo '<script language="javascript">';
echo 'alert("Todos los campos deben de estar completos")';
echo '</script>';
    
 }
    

}



  ?> 
