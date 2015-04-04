function evalValidation(){
  var btn1 = document.getElementById('eval1');
  var btn2 = document.getElementById('eval2');
  var err = document.getElementById('val');


  request=getRequestObject();
  if(request!=null)
  {
    var url='http://localhost/DAW/daw/ProyectoDaw/vendor/slim/slim/index.php/validacion';
    request.open('GET',url,true);
    
    request.onreadystatechange = 
    function() { 
      if((request.readyState==4)){
        var a = request.responseText.trim();

        if( a == "1"){
          alert("Debes logearte primero");
        }else{
              alert(a);
              $('#myModal').modal('show');
        }

      }     
    };
    request.send(null);
  }
}


function des(n){

	var cambiar = document.getElementById("usuarioss");
	cambiar.innerHTML=n;
}

