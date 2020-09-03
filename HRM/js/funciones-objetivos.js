
function AgregarObj(datos){ 
    // alert(datos);
     d = datos.split('||');
 
     nombre_p =" - ".concat(d[2]);
     puesto = d[1].concat(nombre_p);

     nombre_e =" - ".concat(d[4]);
     empleado = d[3].concat(nombre_e);
 
     $('#view_obj_id').html(d[0]);
     $('#view_obj_puesto').html(puesto);
     $('#view_obj_emp').html(empleado);
     $('#view_obj_tit').html(d[5]);
     $('#view_obj_desc').html(d[6]);
     $('#view_obj_f').html(d[7]);
     $('#view_obj_cum').html(d[8]);
     $('#view_obj_pot').html(d[9]);
 }
 function agregardatosObj(idp, ide, tit, desc, fecha, cumplio, porce){
     cadena="idp=" + idp +
            "&ide=" + ide+
            "&tit=" + tit +
            "&desc=" + desc +
            "&fecha=" + fecha +
            "&cumplio=" + cumplio +
            "&porce=" + porce;
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
     $('#Obj_tit_e').val(d[3]);
     $('#Obj_descripcion_e').val(d[4]);
     $('#Obj_ff_e').val(d[5]);
     $('#Obj_cumplio_e[value='+d[6]+']').prop('checked', true);
     $('#Obj_por_e').val(d[7]);
     $('#porcentaje_salida_e').html(d[7]);  
 }
 
 function actualizaDatosObj(){
     id=$('#Obj_id_e').val();
     idp=$('#Obj_idpuesto_e').val();
     ide=$('#Obj_idempleado_e').val();
     tit=$('#Obj_tit_e').val();
     desc=$('#Obj_descripcion_e').val();
     ff=$('#Obj_ff_e').val();
     cum = $('input[name=Obj_cumplio_e]:checked').val();
     por =$('#Obj_por_e').val();

     cadenaObj=
     "ido="+ id +
     "&idp=" + idp +
     "&ide="+ ide+
     "&tit="+ tit+
     "&desc="+ desc +
     "&ff="+ ff +
     "&cum="+ cum +
     "&por="+ por;
     
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

        $("#Obj_tit").keyup(validarObjTit);
		$("#Obj_descripcion").keyup(validarObjDesc);
        $("#Obj_ff").keyup(validarObjFecha);
        $("#Obj_ff").click(validarObjFecha);
        
        
    $("#actualizar_objetivo").click(validarNuevoObjetivo_E);
        $("#Obj_tit_e").keyup(validarObjTit_e);
        $("#Obj_descripcion_e").keyup(validarObjDesc_e);
        $("#Obj_ff_e").keyup(validarObjFecha_e);
        $("#Obj_ff_e").click(validarObjFecha_e);
		
});


function validarNuevoObjetivo(){
    var obj_tit = validarObjTit();
	var obj_desc = validarObjDesc();
	var obj_ff = validarObjFecha();

	if (obj_tit=="true" && obj_desc=="true" && obj_ff=="true" ) {
		alertify.success("Enviando datos...");
        idp = $('#Obj_idpuesto').val();
        ide = $('#Obj_idempleado').val();
        tit = $('#Obj_tit').val();
        desc = $('#Obj_descripcion').val();
        fecha = $('#Obj_ff').val();
        cumplio = $('input[name=Obj_cumplio]:checked').val();
        porce = $('#Obj_por').val();
          
        agregardatosObj(idp, ide, tit, desc, fecha, cumplio, porce);
	} else{
		alertify.error('Favor de revisar datos');
	}
}
function validarObjTit(){  
	var valor = document.getElementById("Obj_tit").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_obj_tit').remove();
		$('#Obj_tit').parent().attr("class", "form-group has-error has-feedback");
		$('#Obj_tit').parent().append('<span id="icono_texto_obj_tit" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_obj_tit').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if( valor.length <= 5  ){
		$('#icono_texto_obj_tit').remove();
		$('#Obj_tit').parent().attr("class", "form-group has-error has-feedback");
		$('#Obj_tit').parent().append('<span id="icono_texto_obj_tit" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_obj_tit').text("Longitud valida 5-50 caracteres").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_obj_tit').remove();
		$('#Obj_tit').parent().attr("class", "form-group has-success has-feedback");
		$('#Obj_tit').parent().children("span").text("").hide();
		$('#Obj_tit').parent().append('<span id="icono_texto_obj_tit" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarObjDesc(){  
	var valor = document.getElementById("Obj_descripcion").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_obj_desc').remove();
		$('#Obj_descripcion').parent().attr("class", "form-group has-error has-feedback");
		$('#Obj_descripcion').parent().append('<span id="icono_texto_obj_desc" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_obj_desc').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if( valor.length <= 15  ){
		$('#icono_texto_obj_desc').remove();
		$('#Obj_descripcion').parent().attr("class", "form-group has-error has-feedback");
		$('#Obj_descripcion').parent().append('<span id="icono_texto_obj_desc" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_obj_desc').text("Longitud valida 15-150 caracteres").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_obj_desc').remove();
		$('#Obj_descripcion').parent().attr("class", "form-group has-success has-feedback");
		$('#Obj_descripcion').parent().children("span").text("").hide();
		$('#Obj_descripcion').parent().append('<span id="icono_texto_obj_desc" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
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
    var obj_tit_e = validarObjTit_e();
	var obj_desc_e = validarObjDesc_e();
	var obj_ff_e = validarObjFecha_e();

	if (obj_tit_e=="true" && obj_desc_e=="true" && obj_ff_e=="true" ) {
		alertify.success("Enviando datos...");
         actualizaDatosObj();
	} else{
		alertify.error('Favor de revisar datos');
	}
}
function validarObjTit_e(){  
	var valor = document.getElementById("Obj_tit_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_obj_tit_e').remove();
		$('#Obj_tit_e').parent().attr("class", "form-group has-error has-feedback");
		$('#Obj_tit_e').parent().append('<span id="icono_texto_obj_tit_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_obj_tit_e').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if( valor.length <= 5  ){
		$('#icono_texto_obj_tit_e').remove();
		$('#Obj_tit_e').parent().attr("class", "form-group has-error has-feedback");
		$('#Obj_tit_e').parent().append('<span id="icono_texto_obj_tit_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_obj_tit_e').text("Longitud valida 5-50 caracteres").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_obj_tit_e').remove();
		$('#Obj_tit_e').parent().attr("class", "form-group has-success has-feedback");
		$('#Obj_tit_e').parent().children("span").text("").hide();
		$('#Obj_tit_e').parent().append('<span id="icono_texto_obj_tit_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarObjDesc_e(){  
	var valor = document.getElementById("Obj_descripcion_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_ticono_texto_obj_desc_eexto_obj_desc').remove();
		$('#Obj_descripcion_e').parent().attr("class", "form-group has-error has-feedback");
		$('#Obj_descripcion_e').parent().append('<span id="icono_texto_obj_desc_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_obj_desc_e').text("Ingrese una fecha valida").show();
		estado  = "false";
		console.log(estado);
	}else if( valor.length <= 15  ){
		$('#icono_texto_obj_desc_e').remove();
		$('#Obj_descripcion_e').parent().attr("class", "form-group has-error has-feedback");
		$('#Obj_descripcion_e').parent().append('<span id="icono_texto_obj_desc_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_obj_desc_e').text("Longitud no valida 15 caracteres").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_obj_desc_e').remove();
		$('#Obj_descripcion_e').parent().attr("class", "form-group has-success has-feedback");
		$('#Obj_descripcion_e').parent().children("span").text("").hide();
		$('#Obj_descripcion_e').parent().append('<span id="icono_texto_obj_desc_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
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