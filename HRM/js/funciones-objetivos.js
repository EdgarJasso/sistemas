
function AgregarObj(datos){ 
     d = datos.split('||');
 
     nombre_p =" - ".concat(d[2]);
     puesto = d[1].concat(nombre_p);

     nombre_e =" - ".concat(d[4]);
     empleado = d[3].concat(nombre_e);
 
     $('#view_obj_id').html(d[0]);
     $('#view_obj_puesto').html(puesto);
     $('#view_obj_emp').html(empleado);
     $('#view_obj_objetivo').html(d[5]);
     $('#view_obj_tema').html(d[6]);
     $('#view_obj_subtema').html(d[7]);
     $('#view_obj_periodo').html(d[8]);
     $('#view_obj_fecha').html(d[9]);
	 $('#view_obj_estado').html(d[10]);
	 $('#view_obj_cumplio').html(d[11]);
	 $('#view_obj_comentarios').html(d[12]);
 }
 function agregardatosObj(idp, ide, objetivo, tema, subtema,periodo, fecha, comentarios){
     cadena="idp=" + idp +
            "&ide=" + ide+
            "&objetivo=" + objetivo +
            "&tema=" + tema +
            "&subtema=" + subtema +
            "&periodo=" + periodo +
			"&fecha_asignacion=" + fecha +
			"&comentarios=" + comentarios;
    // alert(cadena);
     $.ajax({
         type:"post",
         url:"../contenido/objetivos/add.php",
         data:cadena,
         success:function(r){
           if(r==1){
            $('#contenedor_empleados').load('empleados/tabla.php'); 
     $('#contenedor_usuarios').load('usuarios/tabla.php'); 
     $('#contenedor_direccion').load('direccion/tabla.php'); 
     $('#contenedor_area').load('area/tabla.php'); 
     $('#contenedor_categoria').load('categoria/tabla.php'); 
     $('#contenedor_antiguedad').load('antiguedad/tabla.php'); 
     $('#contenedor_objetivos').load('objetivos/tabla.php'); 
     $('#contenedor_asignacion').load('asignacion/tabla.php'); 
	 $('#contenedor_vacaciones').load('vacaciones/tabla.php'); 
	 $('#contenedor_documentos').load('documentos/tabla.php'); 
     $('#contenedor_imagen').load('imagen/tabla.php'); 
            // alertify.success("agregado con exito!");
			 Swal.fire({
				title: 'Agregado Exitosamente!',
				icon: 'success',
				timer: 3000,
				timerProgressBar: true,
				showCancelButton: false,
				showConfirmButton: false
			});
           }else{
              //alertify.error("Fallo en el servidor...");
		   console.log(r);
		   Swal.fire({
			   title: 'Error en el proceso!\n\n\n'+r,
			   icon: 'error',
			   confirmButtonText: 'Continuar'
		   });
            }
         }
     });
 }
 
 function agregarformObj(datos){
     d = datos.split('||');
  
     $('#Obj_id_e').val(d[0]);
     $('#Obj_idpuesto_e').val(d[1]);
     $('#Obj_idempleado_e').val(d[2]);
     $('#Obj_objetivo_e').val(d[3]);
     $('#Obj_tema_e').val(d[4]);
     $('#Obj_subtema_e').val(d[5]);
	 $('#Obj_periodo_e').val(d[6]);
	 $('#Obj_ff_e').val(d[7]);
     $('#Obj_realizado_e[value='+d[8]+']').prop('checked', true);
     $('#Obj_comentarios_e').html(d[9]);  
 }
 
 function actualizaDatosObj(){
     id=$('#Obj_id_e').val();
     idp=$('#Obj_idpuesto_e').val();
     ide=$('#Obj_idempleado_e').val();
     objetivo=$('#Obj_objetivo_e').val();
     tema=$('#Obj_tema_e').val();
     subtema=$('#Obj_subtema_e').val();
	 periodo=$('#Obj_periodo_e').val();
	 fecha=$('#Obj_ff_e').val();
     realizado = $('input[name=Obj_realizado_e]:checked').val();
     comentarios =$('#Obj_comentarios_e').val();

     cadenaObj=
     "ido="+ id +
     "&idp=" + idp +
     "&ide="+ ide+
     "&objetivo="+ objetivo+
     "&tema="+ tema +
     "&subtema="+ subtema +
     "&periodo="+ periodo +
	 "&fecha_asignacion="+ fecha +
	 "&realizado="+ realizado +
     "&comentarios="+ comentarios;
     
     //alert(cadenaObj);
 
            $.ajax({
             type:"post",
             url:"../contenido/objetivos/edit.php",
             data:cadenaObj,
             success:function(r){
              if(r==1){
                $('#contenedor_empleados').load('empleados/tabla.php'); 
                $('#contenedor_usuarios').load('usuarios/tabla.php'); 
                $('#contenedor_direccion').load('direccion/tabla.php'); 
                $('#contenedor_area').load('area/tabla.php'); 
                $('#contenedor_categoria').load('categoria/tabla.php'); 
                $('#contenedor_antiguedad').load('antiguedad/tabla.php'); 
                $('#contenedor_objetivos').load('objetivos/tabla.php'); 
                $('#contenedor_asignacion').load('asignacion/tabla.php'); 
				$('#contenedor_vacaciones').load('vacaciones/tabla.php'); 
				$('#contenedor_documentos').load('documentos/tabla.php'); 
                $('#contenedor_imagen').load('imagen/tabla.php');  
                    //alertify.success("Datos Actualizados!");
				Swal.fire({
                    title: 'Actualizado Exitosamente!',
                    icon: 'success',
                    timer: 3000,
                    timerProgressBar: true,
                    showCancelButton: false,
                    showConfirmButton: false
                });
               }else{
				console.log(r);
				Swal.fire({
					title: 'Error en el proceso!\n\n\n'+r,
					icon: 'error',
					confirmButtonText: 'Continuar'
				});
                }
             }
         });
 
 }
 
 function preguntarObj(id){
  alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
  function(){ eliminarDatosObj(id) },
  function(){ alertify.error('Se cancelo')});
 }
 
 function eliminarDatosObj(id){
     cadena = "id="+id;
     $.ajax({
         type:"post",
         url:"../contenido/objetivos/delete.php",
         data: cadena,
         success:function(r){
          if(r==1){
            $('#contenedor_empleados').load('empleados/tabla.php'); 
            $('#contenedor_usuarios').load('usuarios/tabla.php'); 
            $('#contenedor_direccion').load('direccion/tabla.php'); 
            $('#contenedor_area').load('area/tabla.php'); 
            $('#contenedor_categoria').load('categoria/tabla.php'); 
            $('#contenedor_antiguedad').load('antiguedad/tabla.php'); 
            $('#contenedor_objetivos').load('objetivos/tabla.php'); 
            $('#contenedor_asignacion').load('asignacion/tabla.php'); 
			$('#contenedor_vacaciones').load('vacaciones/tabla.php'); 
			$('#contenedor_documentos').load('documentos/tabla.php'); 
            $('#contenedor_imagen').load('imagen/tabla.php');  
            //alertify.success("Eliminado con exito!");
				Swal.fire({
                    title: 'Eliminado Exitosamente!',
                    icon: 'success',
                    timer: 3000,
                    timerProgressBar: true,
                    showCancelButton: false,
                    showConfirmButton: false
                });
             }else{
                //alertify.error("Error en el servidor...")
				console.log(r);
                Swal.fire({
                    title: 'Error en el proceso!\n\n\n'+r,
                    icon: 'error',
                    confirmButtonText: 'Continuar'
                });
             }
         }
 
     });
 }
 
 $(document).ready(function(){
    $("#guardar_objetivos").click(validarNuevoObjetivo);
        $("#Obj_objetivo").keyup(validarObjObjetivo);
		$("#Obj_tema").keyup(validarObjTema);
		$("#Obj_subtema").keyup(validarObjSubtema);
        $("#Obj_ff").keyup(validarObjFecha);
        $("#Obj_ff").click(validarObjFecha);
        
        
    $("#actualizar_objetivo").click(validarNuevoObjetivo_E);
	$("#Obj_objetivo_e").keyup(validarObjObjetivo_e);
	$("#Obj_tema_e").keyup(validarObjTema_e);
	$("#Obj_subtema_e").keyup(validarObjSubtema_e);
	$("#Obj_ff_e").keyup(validarObjFecha_e);
	$("#Obj_ff_e").click(validarObjFecha_e);
		
});


function validarNuevoObjetivo(){
    var Obj_objetivo = validarObjObjetivo();
	var Obj_tema = validarObjTema();
	var obj_subtema = validarObjSubtema();
	var obj_fecha = validarObjFecha();

	if (Obj_objetivo=="true" && Obj_tema=="true" && obj_subtema=="true" && obj_fecha == "true") {
		alertify.success("Enviando datos...");
        idp = $('#Obj_idpuesto').val();
        ide = $('#Obj_idempleado').val();
        objetivo = $('#Obj_objetivo').val();
		tema = $('#Obj_tema').val();
		subtema = $('#Obj_subtema').val();
        periodo = $('#Obj_periodo').val();
        fecha = $('#Obj_ff').val();
        comentarios = $('#Obj_comentarios').val();
          
        agregardatosObj(idp, ide, objetivo, tema, subtema, periodo, fecha, comentarios);
	} else{
		alertify.error('Favor de revisar datos');
	}
}
function validarObjObjetivo(){  
	var valor = document.getElementById("Obj_objetivo").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚñÑ]{0,20}$\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚñÑ]{0,10}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_obj_obj').remove();
		$('#Obj_objetivo').parent().attr("class", "form-group has-error has-feedback");
		$('#Obj_objetivo').parent().append('<span id="icono_texto_obj_obj" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_obj_objetivo').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if( valor.length <= 5  ){
		$('#icono_texto_obj_obj').remove();
		$('#Obj_objetivo').parent().attr("class", "form-group has-error has-feedback");
		$('#Obj_objetivo').parent().append('<span id="icono_texto_obj_obj" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_obj_objetivo').text("Longitud valida 5-50 caracteres").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_obj_obj').remove();
		$('#Obj_objetivo').parent().attr("class", "form-group has-success has-feedback");
		$('#Obj_objetivo').parent().children("span").text("").hide();
		$('#Obj_objetivo').parent().append('<span id="icono_texto_obj_obj" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarObjTema(){  
	var valor = document.getElementById("Obj_tema").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚñÑ]{0,20}$\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚñÑ]{0,10}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_obj_tema').remove();
		$('#Obj_tema').parent().attr("class", "form-group has-error has-feedback");
		$('#Obj_tema').parent().append('<span id="icono_texto_obj_tema" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_obj_tema').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if( valor.length <= 5  ){
		$('#icono_texto_obj_tema').remove();
		$('#Obj_tema').parent().attr("class", "form-group has-error has-feedback");
		$('#Obj_tema').parent().append('<span id="icono_texto_obj_tema" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_obj_tema').text("Longitud valida 5-150 caracteres").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_obj_tema').remove();
		$('#Obj_tema').parent().attr("class", "form-group has-success has-feedback");
		$('#Obj_tema').parent().children("span").text("").hide();
		$('#Obj_tema').parent().append('<span id="icono_texto_obj_tema" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarObjSubtema(){  
	var valor = document.getElementById("Obj_subtema").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚñÑ]{0,20}$\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚñÑ]{0,10}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_obj_subtema').remove();
		$('#Obj_subtema').parent().attr("class", "form-group has-error has-feedback");
		$('#Obj_subtema').parent().append('<span id="icono_texto_obj_subtema" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_obj_subtema').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if( valor.length <= 5  ){
		$('#icono_texto_obj_subtema').remove();
		$('#Obj_subtema').parent().attr("class", "form-group has-error has-feedback");
		$('#Obj_subtema').parent().append('<span id="icono_texto_obj_subtema" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_obj_subtema').text("Longitud valida 5-200 caracteres").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_obj_subtema').remove();
		$('#Obj_subtema').parent().attr("class", "form-group has-success has-feedback");
		$('#Obj_subtema').parent().children("span").text("").hide();
		$('#Obj_subtema').parent().append('<span id="icono_texto_obj_subtema" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarObjFecha(){
	var valor = document.getElementById("Obj_ff").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_obj_f').remove();
		$('#Obj_ff').parent().attr("class", "form-group has-error has-feedback");
		$('#Obj_ff').parent().append('<span id="icono_texto_obj_f" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_obj_f').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_obj_f').remove();
		$('#Obj_ff').parent().attr("class", "form-group has-success has-feedback");
		$('#Obj_ff').parent().children("span").text("").hide();
		$('#Obj_ff').parent().append('<span id="icono_texto_obj_f" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("formato: "+valor);
	console.log("final :"+estado);
	return estado;
}


function validarNuevoObjetivo_E(){
    var obj_obj_e = validarObjObjetivo_e();
	var obj_tema_e = validarObjTema_e();
	var obj_subtema_e = validarObjSubtema_e();
	var obj_fecha_e = validarObjFecha_e();

	if (obj_obj_e=="true" && obj_tema_e=="true" && obj_subtema_e=="true"&& obj_fecha_e == "true" ) {
		alertify.success("Enviando datos...");
         actualizaDatosObj();
	} else{
		alertify.error('Favor de revisar datos');
	}
}
function validarObjObjetivo_e(){  
	var valor = document.getElementById("Obj_objetivo_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚñÑ]{0,20}$\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚñÑ]{0,10}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_obj_obj_e').remove();
		$('#Obj_objetivo_e').parent().attr("class", "form-group has-error has-feedback");
		$('#Obj_objetivo_e').parent().append('<span id="icono_texto_obj_obj_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_obj_objetivo_e').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if( valor.length <= 5  ){
		$('#icono_texto_obj_obj_e').remove();
		$('#Obj_objetivo_e').parent().attr("class", "form-group has-error has-feedback");
		$('#Obj_objetivo_e').parent().append('<span id="icono_texto_obj_obj_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_obj_objetivo_e').text("Longitud valida 5-50 caracteres").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_obj_obj_e').remove();
		$('#Obj_objetivo_e').parent().attr("class", "form-group has-success has-feedback");
		$('#Obj_objetivo_e').parent().children("span").text("").hide();
		$('#Obj_objetivo_e').parent().append('<span id="icono_texto_obj_obj_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarObjTema_e(){  
	var valor = document.getElementById("Obj_tema_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚñÑ]{0,20}$\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚñÑ]{0,10}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_obj_tema_e').remove();
		$('#Obj_tema_e').parent().attr("class", "form-group has-error has-feedback");
		$('#Obj_tema_e').parent().append('<span id="icono_texto_obj_tema_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_obj_tema_e').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if( valor.length <= 5  ){
		$('#icono_texto_obj_tema_e').remove();
		$('#Obj_tema_e').parent().attr("class", "form-group has-error has-feedback");
		$('#Obj_tema_e').parent().append('<span id="icono_texto_obj_tema_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_obj_tema_e').text("Longitud valida 5-50 caracteres").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_obj_tema_e').remove();
		$('#Obj_tema_e').parent().attr("class", "form-group has-success has-feedback");
		$('#Obj_tema_e').parent().children("span").text("").hide();
		$('#Obj_tema_e').parent().append('<span id="icono_texto_obj_tema_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarObjSubtema_e(){  
	var valor = document.getElementById("Obj_subtema_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚñÑ]{0,20}$\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚñÑ]{0,10}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_obj_subtema_e').remove();
		$('#Obj_subtema_e').parent().attr("class", "form-group has-error has-feedback");
		$('#Obj_subtema_e').parent().append('<span id="icono_texto_obj_subtema_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_obj_subtema_e').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if( valor.length <= 5  ){
		$('#icono_texto_obj_subtema_e').remove();
		$('#Obj_subtema_e').parent().attr("class", "form-group has-error has-feedback");
		$('#Obj_subtema_e').parent().append('<span id="icono_texto_obj_subtema_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_obj_subtema_e').text("Longitud valida 5-50 caracteres").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_obj_subtema_e').remove();
		$('#Obj_subtema_e').parent().attr("class", "form-group has-success has-feedback");
		$('#Obj_subtema_e').parent().children("span").text("").hide();
		$('#Obj_subtema_e').parent().append('<span id="icono_texto_obj_subtema_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarObjFecha_e(){
	var valor = document.getElementById("Obj_ff_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_obj_f_e').remove();
		$('#Obj_ff_e').parent().attr("class", "form-group has-error has-feedback");
		$('#Obj_ff_e').parent().append('<span id="icono_texto_obj_f_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_obj_f_e').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_obj_f_e').remove();
		$('#Obj_ff_e').parent().attr("class", "form-group has-success has-feedback");
		$('#Obj_ff_e').parent().children("span").text("").hide();
		$('#Obj_ff_e').parent().append('<span id="icono_texto_obj_f_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("formato: "+valor);
	console.log("final :"+estado);
	return estado;
}