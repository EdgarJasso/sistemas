function AgregarAnt(datos){ 
 //alert(datos);
    d = datos.split('||');

    nombre_e =" - ".concat(d[2]);
    empleado = d[1].concat(nombre_e);

    nombre_p =" - ".concat(d[5]);
    puesto = d[4].concat(nombre_p);

	$('#view_ant_id').html(d[0]);
	$('#view_ant_emp').html(empleado);
	$('#view_ant_pues').html(puesto);
	$('#view_ant_jefe').html(d[6]);
	$('#view_ant_activo').html(d[7]);
    $('#view_ant_fi').html(d[8]);
    $('#view_ant_ff').html(d[9]);
	$('#view_ant_com').html(d[10]);
	$('#view_ant_color').css("background-color",d[11]);
}
 
function agregardatosAnt(ideant, idpant,idj, activo, feciant, fecfant, com){
	cadena="ide=" + ideant +
		   "&idp=" + idpant+
		   "&jefe=" + idj+
		   "&activo=" + activo+
           "&fi=" + feciant +
           "&ff=" + fecfant +
		   "&com=" + com +
		   "&color=" + colorHEX();
		   
    //alert(cadena);
	$.ajax({
		type:"post",
		url:"../contenido/antiguedad/add.php",
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

function agregarformAnt(datos){
    d = datos.split('||');
 
	$('#Ant_idantiguedad_e').val(d[0]);
	$('#Ant_idempleado_e').val(d[1]);
	$('#Ant_idpuesto_e').val(d[2]);
	$('#Ant_idjefe_e').val(d[3]);
	$("input[name='Ant_activo_e'][value='"+d[4]+"']").prop('checked', true);
    $('#Ant_fi_e').val(d[5]);
    $('#Ant_ff_e').val(d[6]);
	$('#Ant_com_e').val(d[7]);
	$('#Ant_color_e').val(d[8]);
}

function actualizaDatosAnt(){
    ida=$('#Ant_idantiguedad_e').val();
	ide=$('#Ant_idempleado_e').val();
	idp=$('#Ant_idpuesto_e').val();
	jefe=$('#Ant_idjefe_e').val();
	activo = $('input[name="Ant_activo_e"]:checked').val();
    fi=$('#Ant_fi_e').val();
    ff=$('#Ant_ff_e').val();
	com=$('#Ant_com_e').val();
	color=$('#Ant_color_e').val();
	
	cadenaAnt=
    "ida="+ ida +
	"&ide=" + ide +
	"&idp="+ idp+
	"&jefe="+ jefe+
	"&activo=" + activo +
    "&fi="+ fi +
    "&ff="+ ff + 
	"&com="+ com +
	"&color=" + color;
    
   // alert(cadenaAnt);

		   $.ajax({
			type:"post",
			url:"../contenido/antiguedad/edit.php",
			data:cadenaAnt,
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

function preguntarAnt(id){
 alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
 function(){ eliminarDatosAnt(id) },
 function(){ alertify.error('Se cancelo')});
}

function eliminarDatosAnt(id){
	cadena = "id="+id;
	$.ajax({
		type:"post",
		url:"../contenido/antiguedad/delete.php",
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


	$("#guardar_antiguedad").click(validarNuevaAnt);
		$("#Ant_fi").click(validarFechaAntI);

	$("#actualizar_antiguedad").click(validarNuevaAnt_E);
	$("#Ant_fi_e").click(validarFechaAntI_E);
		
});

function validarNuevaAnt(){
	var fi = validarFechaAntI();

	if (fi=="true") {
		alertify.success("Enviando datos...");
		ideant = $('#Ant_idempleado').val();
		idpant = $('#Ant_idpuesto').val();
		idjd = $('#Ant_idjefe').val();
		activo = $('input[name=Ant_activo]:checked').val();
		feciant = $('#Ant_fi').val();
		fecfant = "pendiente";
		com = $('#Ant_com').val();
		
	 agregardatosAnt(ideant, idpant, idjd, activo, feciant, fecfant, com);
	} else{
		alertify.error('Favor de revisar datos');
	}
}
function validarFechaAntI(){
	
		
	var valor = document.getElementById("Ant_fi").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_ant_fi').remove();
		$('#Ant_fi').parent().attr("class", "form-group has-error has-feedback");
		$('#Ant_fi').parent().append('<span id="icono_texto_ant_fi" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_ant_fi').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_ant_fi').remove();
		$('#Ant_fi').parent().attr("class", "form-group has-success has-feedback");
		$('#Ant_fi').parent().children("span").text("").hide();
		$('#Ant_fi').parent().append('<span id="icono_texto_ant_fi" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("formato: "+valor);
	console.log("final :"+estado);
	return estado;
}
function validarFechaAntF(){
	
		
	var valor = document.getElementById("Ant_ff").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_ant_ff').remove();
		$('#Ant_ff').parent().attr("class", "form-group has-error has-feedback");
		$('#Ant_ff').parent().append('<span id="icono_texto_ant_ff" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_ant_ff').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_ant_ff').remove();
		$('#Ant_ff').parent().attr("class", "form-group has-success has-feedback");
		$('#Ant_ff').parent().children("span").text("").hide();
		$('#Ant_ff').parent().append('<span id="icono_texto_ant_ff" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("formato: "+valor);
	console.log("final :"+estado);
	return estado;
}


function validarNuevaAnt_E(){
	var fi_e = validarFechaAntI_E();

	if (fi_e=="true") {
		alertify.success("Enviando datos...");
		actualizaDatosAnt();
	} else{
		alertify.error('Favor de revisar datos');
	}
}
function validarFechaAntI_E(){
	
		
	var valor = document.getElementById("Ant_fi_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_ant_fi_e').remove();
		$('#Ant_fi_e').parent().attr("class", "form-group has-error has-feedback");
		$('#Ant_fi_e').parent().append('<span id="icono_texto_ant_fi_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_ant_fi_e').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_ant_fi_e').remove();
		$('#Ant_fi_e').parent().attr("class", "form-group has-success has-feedback");
		$('#Ant_fi_e').parent().children("span").text("").hide();
		$('#Ant_fi_e').parent().append('<span id="icono_texto_ant_fi_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("formato: "+valor);
	console.log("final :"+estado);
	return estado;
}
function validarFechaAntF_E(){
	
		
	var valor = document.getElementById("Ant_ff_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_ant_ff_e').remove();
		$('#Ant_ff_e').parent().attr("class", "form-group has-error has-feedback");
		$('#Ant_ff_e').parent().append('<span id="icono_texto_ant_ff_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_ant_ff_e').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_ant_ff_e').remove();
		$('#Ant_ff_e').parent().attr("class", "form-group has-success has-feedback");
		$('#Ant_ff_e').parent().children("span").text("").hide();
		$('#Ant_ff_e').parent().append('<span id="icono_texto_ant_ff_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("formato: "+valor);
	console.log("final :"+estado);
	return estado;
}
function generarLetra(){
	var letras = ["a","b","c","d","e","f","0","1","2","3","4","5","6","7","8","9"];
	var numero = (Math.random()*15).toFixed(0);
	return letras[numero];
}
	
function colorHEX(){
	var coolor = "";
	for(var i=0;i<6;i++){
		coolor = coolor + generarLetra() ;
	}
	console.log('#'+coolor);
	return "#" + coolor;
}