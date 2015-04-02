 function poner(p){
      var x = document.getElementById("profesor").selectedIndex;
      // var aux= document.getElementsByTagName("option")[x].value;
      // var y = document.getElementById("Materia").selectedIndex;
      // var a= document.getElementsByTagName("option")[y].value;
   
     x+0;
    if(x!=0)
     {
    //      document.getElementById('h').style.visibility= 'visible' ; 
        agregar(x); 
    //      if(a!=0){
    //     document.getElementById('add').style.visibility='visible';
        
    //      }else {
    //       document.getElementById('add').style.visibility='hidden';   
         }
         
         
    //  }
    //  else{
    //      document.getElementById('h').style.visibility= 'hidden' ; 
    //     document.getElementById('add').style.visibility='hidden';
    //  }
     
}
function agregar(p){
      //alert('1');
   request=getRequestObject();
   if(request!=null)
   {
        //alert('2');
     var url='http://localhost/DAW/daw/ProyectoDaw/vendor/slim/slim/index.php/materias/'+p;
     request.open('GET',url,true);
         //alert('3');
     request.onreadystatechange = 
            function() { 
                if((request.readyState==4)){
                    // Asynchronous response has arrived
                        //alert('4');
                    var ajaxResponse=document.getElementById('h');
                        //alert('5');
                    ajaxResponse.innerHTML=request.responseText;
                        //alert('6');
                    ajaxResponse.style.visibility="visible";
                        //alert('7');
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

