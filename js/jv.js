 function poner(p){
      var x = document.getElementById("profesor").selectedIndex;
     var aux= document.getElementsByTagName("option")[x].value;
      var y = document.getElementById("Materia").selectedIndex;
          var a= document.getElementsByTagName("option")[y].value;
        
     aux+0;
    if(aux!=0)
     {
         document.getElementById('h').style.visibility= 'visible' ; 
        agregar(aux); 
         if(a!=0){
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