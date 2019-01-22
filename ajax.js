// Función para recoger los datos de PHP según el navegador, se usa siempre.
function objetoAjax(){
  var xmlhttp=false;
  try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
 
  try {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (E) {
    xmlhttp = false;
  }
}
 
if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
    xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}

//Función para recoger los datos del formulario y enviarlos por post  
function enviarDatosAdminNuevo(){
 
  //div donde se mostrará lo resultados
  divResultado = document.getElementById('resultado');
  //recogemos los valores de los inputs
  nom=document.nuevo_admin.nombre.value;
  ape=document.nuevo_admin.apellido.value;
  ema=document.nuevo_admin.email.value;
  con=document.nuevo_admin.password.value;
 
  //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del medotod POST
  //archivo que realizará la operacion
  //nuevoadmin.php
  ajax.open("POST", "nuevoadmin.php",true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
    //la función responseText tiene todos los datos pedidos al servidor
    if (ajax.readyState==4) {
      //mostrar resultados en esta capa
    divResultado.innerHTML = ajax.responseText
      //llamar a funcion para limpiar los inputs
    LimpiarCampos();
  }
 }
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  //enviando los valores a nuevoadmin.php para que inserte los datos
  ajax.send("nombre="+nom+"&apellido="+ape+"&email="+ema+"&password="+con)
}

//función para limpiar los campos
function LimpiarCampos(){
  document.nuevo_admin.nombre.value="";
  document.nuevo_admin.apellido.value="";
  document.nuevo_admin.email.value="";
  document.nuevo_admin.password.value="";
  document.nuevo_admin.nombre.focus();
}

function eliminarDato(email){
   //donde se mostrará el resultado de la eliminacion
   divResultado = document.getElementById('resultado');
   
   //usaremos un cuadro de confirmacion 
   var eliminar = confirm("¿Realmente desea eliminar esta cuenta?")
   if ( eliminar ) {
   //instanciamos el objetoAjax
   ajax=objetoAjax();
   //uso del medotod GET
   //indicamos el archivo que realizará el proceso de eliminación
   //junto con el email del empleado
   ajax.open("GET", "eliminarcuenta.php?email="+email);
   ajax.onreadystatechange=function() {
   if (ajax.readyState==4) {
   //mostrar resultados en esta capa
   divResultado.innerHTML = ajax.responseText
   }
   }
   //como hacemos uso del metodo GET
   //colocamos null
   ajax.send(null)
   }
}

function enviarDatosAdmin(){

  //donde se mostrará lo resultados
  divResultado = document.getElementById('resultado');
  divFormulario = document.getElementById('formulario');
  //valores de los inputs
  nom=document.frmadmin.nombre.value;
  ape=document.frmadmin.apellido.value;
  ema=document.frmadmin.email.value;
  pas=document.frmadmin.password.value;

  //instanciamos el objetoAjax
  ajax=objetoAjax();
  //usando del medoto POST
  //archivo que realizará la operacion
  //modificarcuenta.php
  ajax.open("POST", "modificarcuenta.php",true);
  ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
  //mostrar los nuevos registros en esta capa
  divResultado.innerHTML = ajax.responseText
  }

  }
  //muy importante este encabezado ya que hacemos uso de un formulario
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  //enviando los valores
  ajax.send("nombre="+nom+"&apellido="+ape+"&email="+ema+"&password="+pas)
}

function pedirDatos(email){
  //donde se mostrará el formulario con los datos
  divFormulario = document.getElementById('formulario');
  //instanciamos el objetoAjax
  ajax=objetoAjax();
  //uso del medotod GET
  ajax.open("GET", "consulta_por_email.php?email="+email);
  
  ajax.onreadystatechange=function() {

  if (ajax.readyState==4) {
  //mostrar resultados en esta capa
  divFormulario.innerHTML = ajax.responseText
  //mostrar el formulario
  divFormulario.style.display="block";
  }

  }
  //como hacemos uso del metodo GET
  //colocamos null
  ajax.send(null)
}