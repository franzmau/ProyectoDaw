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

                       function poner(p){
    
      var x = document.getElementById("profesor").selectedIndex;
     var aux= document.getElementsByTagName("option")[x].value;
      var y = document.getElementById("Materia").selectedIndex;
          var a= document.getElementsByTagName("option")[y].value;
     aux+0;
    if(x!=0)
     {
         document.getElementById('h').style.visibility= 'visible' ; 
        agregar(aux); 
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


}

