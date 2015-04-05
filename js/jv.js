
var xmlhttp;
function load(str, url, cfunc)
{

  if (window.XMLHttpRequest)
  {
    xmlhttp=new XMLHttpRequest();
  }
  else
  {
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=cfunc;
  xmlhttp.open("POST",url,true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(str);
}

function metodoAjax(datos, ruta)
{
 load(datos, ruta, function()
 { 
   if (xmlhttp.readyState==4 && xmlhttp.status==200)
   {
     document.getElementById("cuerpo").innerHTML=xmlhttp.responseText;
   }
 });
}

function metodoAjax2(datos, ruta,id)
{
 load(datos, ruta, function()
 { 
   if (xmlhttp.readyState==4 && xmlhttp.status==200)
   {
     document.getElementById(id).innerHTML=xmlhttp.responseText;
   }
 });
}

function ElegirProfesor(idProfesor)
{
 metodoAjax2("valor="+idProfesor,"recibeP.php","cuerpo2");
}


function ElegirMateria(idMateria)
{
 metodoAjax("valor2="+idMateria,"recibeM.php","cuerpo");
}

function poner(p,state){
  var x = document.getElementById("profesor").selectedIndex;
    // var aux= document.getElementsByTagName("option")[x].value;
      //    var a= document.getElementsByTagName("option")[y].value;
      x+0;
      if(x!=0)
      {
       document.getElementById('h').style.visibility= 'visible' ; 
       if(state==0){
          agregar(x);
       }
      
       var y = document.getElementById("Materia").selectedIndex;
       y+0;
       if(y!=0){
        document.getElementById('add').style.visibility='visible';
        
      }else {
        document.getElementById('add').style.visibility='hidden';   
      }
    }
    else{
     document.getElementById('h').style.visibility= 'hidden' ; 
     document.getElementById('add').style.visibility='hidden';
   }

 }


 
 function agregar(p){

   request=getRequestObject();
   if(request!=null)
   {

     // var url='http://localhost/REPOMA/vendor/slim/slim/index.php/materias/'+p;
     var url='http://localhost/DAW/daw/ProyectoDaw/vendor/slim/slim/index.php/materias/'+p;
     request.open('GET',url,true);

     request.onreadystatechange = function() { 
      if((request.readyState==4)){
                    // Asynchronous response has arrived
                    var ajaxResponse=document.getElementById('h');

                    ajaxResponse.innerHTML=request.responseText;

                    ajaxResponse.style.visibility="visible";
                  }     
                };
                request.send(null);
              }
            }

            function getRequestObject() {
  // Asynchronous objec created, handles browser DOM differences

  if(window.XMLHttpRequest) {
    // Mozilla, Opera, Safari, Chrome IE 7+
    return (new XMLHttpRequest());
  }
  else if (window.ActiveXObject) {
    // IE 6-
    return (new ActiveXObject("Microsoft.XMLHTTP"));
  } else {
    // Non AJAX browsers
    return(null);
  }
}



