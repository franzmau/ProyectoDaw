
function evalValidation(){

   request=getRequestObject();
   if(request!=null)
   {
    var url='http://localhost/DAW/daw/ProyectoDaw/vendor/slim/slim/index.php/validacion';
     request.open('GET',url,true);
   //  

     
    
     request.onreadystatechange = 
     function() { 
      if((request.readyState==4)){
                    // Asynchronous response has arrived
                    var ajaxResponse=document.getElementById('val');
                    var a = request.responseText;
                    a= a+"";
                    ajaxResponse.innerHTML=a;
                        alert(a);
                    //AccionVentana2();
                    // if(request.responseText!=""){
                    //     ajaxResponse.innerHTML='<script language="javascript">AccionVentana2();</script>';
                        
                    // }else{
                    //     ajaxResponse.innerHTML='<div class="alert alert-success">
                    //       <a href="#" class="close" data-dismiss="alert">&times;</a>
                    //       <strong>Warning!</strong> Necesitas logearte.
                    //     </div>';
                    // }
                  }     
                };
                request.send(null);
              }
            }


function des(n){

	var cambiar = document.getElementById("usuarioss");
	cambiar.innerHTML=n;
	alert('kim is da bezt');
}