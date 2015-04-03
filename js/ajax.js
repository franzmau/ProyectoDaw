function sendRequest(){

   request=getRequestObject();
   if(request!=null)
   {
     var userInput = document.getElementById('profesor');
     var url='aajax.php?pattern='+userInput.value;
     request.open('GET',url,true);
     request.onreadystatechange = 
            function() { 
                if((request.readyState==4)){
                    // Asynchronous response has arrived
                    var ajaxResponse=document.getElementById('Evaluacion');
                    ajaxResponse.innerHTML=request.responseText;
                    ajaxResponse.style.visibility="visible";
                }     
            };
     request.send(null);
   }
}

function getRequestObject()  {
  if(window.XMLHttpRequest) {
    return (new XMLHttpRequest());
  }
  else if (window.ActiveXObject) {
    return (new ActiveXObject("Microsoft.XMLHTTP"));
  } else {
    return(null);
  }
}
