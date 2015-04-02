

<?php
	header("Content-Type: text/html;charset=utf-8");
	function connect() {
		$mysql = mysqli_connect("localhost","root","7797nebur","Proyecto daw");
        mysqli_set_charset($mysql,'utf8');
		return $mysql;
	}
	
	function disconnect($mysql) {
		mysqli_close($mysql);
	}
	
	function showquery($query) {
		$mysql = connect();
		
		$query = mysqli_real_escape_string($mysql, $query);
		$results = $mysql->query($query);
		
		echo "\n<table class\"showquery\">\n";
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
				echo "<td>" .  $row[$i] ."</td>\n";
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



function insertRecord($matricula,$password)
{
     $mysql = connect();
// insert command specification 
$query='INSERT INTO usuario (matricula,usuario) VALUES (?,?) ';
// Preparing the statement 
if (!($statement = $mysql->prepare($query))) {
    die("Preparation failed: (" . $mysql->errno . ") " . $mysql->error);
}
// Binding statement params    
if (!$statement->bind_param("ss",$matricula, $password)) {
    die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
}
 // Executing the statement
 if (!$statement->execute()) {
    die("Execution failed: (" . $statement->errno . ") " . $statement->error);
  } 
     disconnect($mysql);
}
return true;
	
?>