

<?php

header("Content-Type: text/html;charset=utf-8");
function connect() {
  $mysql = mysqli_connect("localhost","root","7797nebur","Proyecto daw");

    // header("Content-Type: text/html;charset=utf-8");
    // function connect() {
    //     $mysql = mysqli_connect("localhost","root","","ProyectoDaw2");

  mysqli_set_charset($mysql,'utf8');
  return $mysql;
}

function disconnect($mysql) {
    mysqli_close($mysql);
}

crea("CREATE OR REPLACE VIEW MAT AS Select m.descripcion as Materia , dm.descripcion as Dificultad, h.descripcion as Habilidad, i.descripcion as Interesante, Count(e.idMateria) as Eva, m.clave from materia m, dificultadmateria dm, habiilidadmateria h, interesante i, evaluan e where
 dm.max>=m.dificultad and dm.min <=m.dificultad and h.max>=m.habilidad and h.min<=m.habilidad and i.max>=m.interesante and i.min<=m.interesante  and e.idMateria= m.clave Group by e.idMateria");

crea("CREATE OR REPLACE VIEW `prof` AS select `m`.`nombre` AS `profesor`,`dm`.`descripcion` AS `consitente`,`h`.`descripcion` AS `dificultad`,`i`.`descripcion` AS `iniciativa`,`p`.`descripcion` AS `preocupacion`,count(`e`.`idProfesor`) AS `Eva`, id_maestro as maestro from (((((`proyectodaw2`.`profesor` `m` join `proyectodaw2`.`consistente` `dm`) join `proyectodaw2`.`dificultadmaestro` `h`) join `proyectodaw2`.`iniciativa` `i`) join `proyectodaw2`.`preocupacion` `p`) join `proyectodaw2`.`evaluan` `e`) where ((`dm`.`max` >= `m`.`Consistente`) and (`dm`.`min` <= `m`.`Consistente`) and (`h`.`max` >= `m`.`Dificultad`) and (`h`.`min` <= `m`.`Dificultad`) and (`i`.`max` >= `m`.`iniciativa`) and (`i`.`min` <= `m`.`iniciativa`) and (`p`.`max` >= `m`.`preocupacion`) and (`p`.`min` <= `m`.`preocupacion`) and (`e`.`idProfesor` = `m`.`id_maestro`)) group by `e`.`idProfesor`");

function showquery($query) {
    $mysql = connect();

    $query = mysqli_real_escape_string($mysql, $query);
    $results = $mysql->query($query);




    echo '<table class\"showquery\" border="1">';
    echo "<thead>\n";
    $fields = mysqli_num_fields($results);
    for($i = 0; $i < $fields; $i++) {
        $finfo = mysqli_fetch_field_direct($results, $i);
        echo "<th>" .  $finfo->name ."</th>\n";
    }
    echo "</thead>\n";

    while ($row = mysqli_fetch_array($results, MYSQLI_BOTH)) {
        echo "<tr>";
        for($i = 0; $i < $fields; $i++) {
            echo "<td>" .  $row[$i] ." </td> \n";
        }
        echo "</tr>\n";
    }
    echo "</table>\n";

    mysqli_free_result($results);

    disconnect($mysql);

}

function regresa($query)
{
    $mysql = connect();

    
    $result=mysqli_query($mysql,$query);
    $row=mysqli_fetch_assoc($result);
    
   // var_dump($row);
//printf ("%s \n",$row["nombre"]);

    
    
    return $row["nombre"];  
    
}
function regresa1($query,$a)
{
    $mysql = connect();

    
    $result=mysqli_query($mysql,$query);
    $row=mysqli_fetch_assoc($result);
    


    
    return $row[$a];    
    
}
function crea($query){
    $mysql = connect();

    
    $result=mysqli_query($mysql,$query);
}


function dropdown($name, $query) {
    $mysql = connect();

    $results = $mysql->query($query);

    echo "\t<select onchange=\"poner(this.value)\" id=\"".$name."\" name=\"" .$name ."\">\n";
    echo "\t\t <option value=0 name=0> --Selecciona uno-- </option>\n ";
    while ($row = mysqli_fetch_array($results, MYSQLI_BOTH)) {
        echo "\t\t<option id=\"" .$row[0] ."\" name=\"" .$row[0] ."\" value=\"" .$row[0] ."\">" .$row[1] ."</option>\n"; 

    }
    echo "\t</select>\n";

    mysqli_free_result($results);

    disconnect($mysql);
}

function runquery($query, $types = null, $params = null) {
    $mysql = connect();

    if(!($statement = $mysql->prepare($query))) {
        echo "<strong>Preparation failed:</strong> (" . $mysql->errno . ") " . $mysql->error;
        return false;
    }
    if($types != null && $params != null) {
        $bind_names[] = $types;
        for ($i = 0; $i < count($params); $i++) {
            $bind_name = 'bind' . $i;
            $$bind_name = $params[$i];
            $bind_names[] = &$$bind_name;
        }
        call_user_func_array(array($statement,'bind_param'),$bind_names);
    }
    if(!$statement->execute()) {
        echo "<strong>Execution failed:</strong> (" . $statement->errno . ") " . $statement->error;
        return false;
    }

    disconnect($mysql);
    return true;
}


function query($query)
{
    $mysql=connect();
 // Query execution; returns identifier of the result group
    $results = $mysql->query($query);
    $array;
    $cont=0;
    disconnect($mysql);
    while ($row = mysqli_fetch_array($results, MYSQLI_BOTH)) {
    // use of numeric index

        $array[$cont]=$row[0];
        $cont=$cont+1;    


    }
    mysqli_free_result($results);
    return $array;
}




function insertUser($matricula,$user,$password)
{
 $mysql = connect();
// insert command specification 
 $query='INSERT INTO usuario (matricula,usuario,contraseña) VALUES (?,?,?) ';
// Preparing the statement 
 if (!($statement = $mysql->prepare($query))) {
    die("Preparation failed: (" . $mysql->errno . ") " . $mysql->error);
}
// Binding statement params    
if (!$statement->bind_param("sss",$matricula,$user,$password)) {
    die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
}
 // Executing the statement
if (!$statement->execute()) {
    die("Execution failed: (" . $statement->errno . ") " . $statement->error);
} 
disconnect($mysql);

}

function insertRecord ($iprof, $idalumno, $idmat, $disp, $hab, $comp, $dif, $consistencia ,$interesante,$fecha,$difi)
{ 


 $mysql=connect();
// insert command secification 
 $query='INSERT INTO evaluan (idProfesor, idMateria, idAlumno,disponibilidad,habilidades, compromiso, dificultad, consistencia, interesante,fecha,difi) VALUES (?,?,?,?,?,?,?,?,?,?,?) ';
// Preparing the statement 
 if (!($statement = $mysql->prepare($query))) {
    die("Preparation failed: (" . $mysql->errno . ") " . $mysql->error);
}
// Binding statement params    
if (!$statement->bind_param("sssssssssss",$iprof,$idalumno,$idmat,$disp,$hab,$comp,$dif,$consistencia,$interesante,$fecha,$difi)) {
    die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
}
 // Executing the statement
if (!$statement->execute()) {
    die("Execution failed: (" . $statement->errno . ") " . $statement->error);
} 
disconnect($mysql);

}



function probar ($a1,$a2){
    switch($a1){
        case 1:
        if($a2<99){
            $a2=$a2+2;
        }

        
        break;
        case 2:
        if($a2<80){
            $a2=$a2+2;
        }elseif ($a2<94){
            $a2=$a2+1;
        }
        break;
        case 3:
        
        if($a2>90)
            $a2=$a2-1;
        elseif($a2>80)
            $a2=$a2;
        elseif($a2>70) 
            $a2=$a2-1;
        break;
        case 4:
        if($a2>89)
            $a2=$a2-2;
        elseif($a2>70)
            $a2=$a2-1;
        break;
        case 5:
        if($a2>71)
            $a2=$a2-2;
        break;
    }
    return $a2;
    
    

}

function algoritmo($idmat,$idprof, $disp, $hab, $comp, $dif, $consistencia ,$interesante,$difi){
   $mysql=connect();

   $m1=regresa1("Select dificultad from materia where clave=".$idmat,"dificultad");
   echo "dificultad actualm".$m1." <br>"; 
   $m2=regresa1("Select habilidad from materia where clave=".$idmat,"habilidad");
   echo "ha actual".$m2." <br>";
   $m3=regresa1 ("SELECT interesante from materia where clave=".$idmat,"interesante");
   echo "int actualm".$m3." <br>";
   $p1=regresa1("Select Consistente from profesor where id_maestro=".$idprof,"Consistente");
   echo "consis actualm".$p1." <br>";

   $p2=regresa1("Select Dificultad from profesor where id_maestro=".$idprof,"Dificultad");
   echo "dificultadp actual".$p2." <br>"; 
   $p3=regresa1("Select iniciativa from profesor where id_maestro=".$idprof,"iniciativa");

   echo "inic actualm".$p3." <br>";
   $p4=regresa1("Select preocupacion from profesor where id_maestro=".$idprof,"preocupacion");

   echo "preocupacion actualm".$p4." <br>";
   $m1=probar($difi,$m1);

   $m2=probar($hab,$m2);
   $m3=probar($interesante,$m3);
   $m4=($m1+$m2+$m3)/3;


   $p1=probar($consistencia,$p1);
   $p2=probar($dif,$p2);
   $p3=probar($consistencia,$p3);
   $p4=probar($comp,$p4);
   $p5=($p1+$p2+$p3+$p4)/4;

   $sql="UPDATE profesor SET `Consistente`=".$p1." ,`Dificultad`= ".$p2.",`iniciativa`=".$p3.", `preocupacion`=".$p4.",`califiacion`=".$p5." WHERE id_maestro=".$idprof;
   echo $sql;



   if (mysqli_query($mysql, $sql)) {
    echo "Record updated successfully";
    } else {
    echo "Error updating record: " . mysqli_error($conn);

    }
    $sql="UPDATE `materia` SET `dificultad`=".$m1." ,`habilidad`=".$m2.",`interesante`=".$m3.",`calif`=".$m4." WHERE clave=".$idmat;
    echo $sql;

    if (mysqli_query($mysql, $sql)) {
    echo "Record updated successfully";
    } else {
    echo "Error updating record: " . mysqli_error($conn);
    }



disconnect($mysql);

}


function getUser($id){
    $mysql=connect();
    $query="SELECT * FROM `usuario` WHERE `id` ='".$id."'";
    echo $query;
    $results = $mysql->query($query);
    if($row = mysqli_fetch_array($results, MYSQLI_BOTH)) 
    {
        return $row[1];
    }else{
        return 0;
    }
    disconnect($mysql);
}
?>

