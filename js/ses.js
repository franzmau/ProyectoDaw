function evalValidation(){


  request=getRequestObject();
  if(request!=null)
  {
    // var url='http://localhost/REPOMA/vendor/slim/slim/index.php/validacion';
    var url='http://localhost/DAW/daw/Proy2/ProyectoDaw/vendor/slim/slim/index.php/validacion';
    request.open('GET',url,true);
    request.onreadystatechange = 
    function() { 
      if((request.readyState==4)){
        var a = request.responseText.trim();
        if( a == "1"){
          alert("Debes logearte primero");
        }else{
              $('#myModal').modal('show');
        }

      }     
    };
    request.send(null);
  }
}


function des(n){

var cambiar = document.getElementById("usuarioss");
cambiar.innerHTML="<i class='glyphicon glyphicon-user'> "+n;
}

function sesionEstado(){

  request=getRequestObject();
  if(request!=null)
  {
    // var url='http://localhost/REPOMA/vendor/slim/slim/index.php/validacion';
    var url='http://localhost/DAW/daw/Proy2/ProyectoDaw/vendor/slim/slim/index.php/validacion';
    request.open('GET',url,true);
    request.onreadystatechange = 
    function() { 
      if((request.readyState==4)){
        var a = request.responseText.trim();
        if( a == "1"){
            var cambiar = document.getElementById("usuarioss");
            cambiar.innerHTML="<i class='glyphicon glyphicon-user'></i> Ingresa o Registrate";
            document.getElementById('closeSession').style.display='none'; 
            document.getElementById('openSession').style.display='block';  
        }else
        {
          document.getElementById('closeSession').style.display='inline';  
          document.getElementById('openSession').style.display='none';   
        }
      }     
    };
    request.send(null);
  }
}

function cerrarSesion()
{

  // var url='http://localhost/REPOMA/vendor/slim/slim/index.php/cerrarSesion';
  var url='http://localhost/DAW/daw/Proy2/ProyectoDaw/vendor/slim/slim/index.php/cerrarSesion';
  
  request.send(null);
  location.reload();
}