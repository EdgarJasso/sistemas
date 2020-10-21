$(document).ready(function(){
	listar_area();

	$("#guardar_area").click(validarNuevaArea);
		$("#Area_nombre").keyup(validarAreaNombre);

	$("#actualizar_area").click(validarNuevaArea_E);
		$("#Area_nombreAct").keyup(validarAreaNombre_e);
		
}); 
function listar_area(){
	var listar_area = $('#area').DataTable({
		"ajax":{
			'method' : 'POST',
			'url' : '../../cuerpo/contenido/area/listado.php'
		},dom: 'Bfrtip',
   "buttons":[                	
	   {
		   extend:    'excelHtml5',
		   text:      '<i class="icon-file-excel"></i>',
		   titleAttr: 'Excel'
	   },
	   {
		   extend:    'pdfHtml5',
		   text:      '<i class="icon-file-pdf"></i>',
		   titleAttr: 'PDF'
	   }
   ],"columns":[
			{"data":"id_area"},
			{"data":"nombre"},
			{"defaultContent":'<td><center><div class="btn-group"><button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-cog"></span><span class="icon-circle-down"></span></button><div class="dropdown-menu box"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Ver_Area" id="Ver_Area"><span class="icon-eye"></span></button><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Editar_Area" id="Editar_Area_Btn"><span class="icon-pencil"></span></button><button type="button" class="btn btn-danger btn-sm" id="Eliminar_Area_Btn"><span class="icon-cross"></span></button></div></div></center></td>'}
		],
		"info": true,
		"pagingType": "full",
		"lengthMenu": [ 25, 50 ],
		  "language":{
			  "lengthMenu": "Mostrar _MENU_ registros por pagina",
				  "info": "Mostrando pagina _PAGE_ de _PAGES_",
				  "infoEmpty": "No hay registros disponibles",
				  "infoFiltered": "(filtrada de _MAX_ registros)",
				  "loadingRecords": "Cargando...",
				  "processing":     "Procesando...",
				  "search": "Buscar:",
				  "zeroRecords":    "No se encontraron registros coincidentes",
				  "paginate": {
					  "next":       "Siguiente",
					  "previous":   "Anterior",
					   "first": "Inicio",
					   "last":"Fin"
				  },					
		  }
	});
	obtener_data_ver_area("#area tbody", listar_area);
	obtener_data_editar_area("#area tbody", listar_area);
	obtener_data_eliminar_area("#area tbody", listar_area);
}
var obtener_data_ver_area = function(tbody, table){
	$(tbody).on("click", "button#Ver_Area", function(){
		var data = table.row( $(this).parents("tr") ).data();
		AgregarViewArea(data);
	});
}
var obtener_data_editar_area = function(tbody, table){
	$(tbody).on("click", "button#Editar_Area_Btn", function(){
		var data = table.row( $(this).parents("tr") ).data();
		agregarformArea(data);
	});
}
var obtener_data_eliminar_area = function(tbody, table){
	$(tbody).on("click", "button#Eliminar_Area_Btn", function(){
		var data = table.row( $(this).parents("tr") ).data();
		preguntarArea(data.id_area);
	});
}

function AgregarViewArea(datos){ 
	$('#view_area_id').html(datos.id_area);
	$('#view_area_nombre').html(datos.nombre);
}
  
function agregardatosArea(nombre){
	cadenaA="nombre=" + nombre;
	$.ajax({
		type:"post",
		url:"../../cuerpo/contenido/area/add.php",
		data:cadenaA,
		success:function(r){
		  if(r==1){  
			Swal.fire({
			title: 'Agregado Exitosamente!',
			icon: 'success',
			timer: 3000,
			timerProgressBar: true,
			showCancelButton: false,
			showConfirmButton: false
		});

		$('#marcadores').load('../../php/marcadores.php');
    $('#contenedor_area').load('../../cuerpo/contenido/area/tabla.php'); 
    $('#contenedor_empleados').load('../../cuerpo/contenido/empleados/tabla.php'); 
    $('#contenedor_usuarios').load('../../cuerpo/contenido/usuarios/tabla.php'); 
    $('#contenedor_servicios').load('../../cuerpo/contenido/servicios/tabla.php'); 
    $('#contenedor_peticiones').load('../../cuerpo/contenido/peticiones/tabla.php'); 
    $('#contenedor_bitacora').load('../../cuerpo/contenido/bitacora/tabla.php'); 
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

function agregarformArea(datos){
	$('#idareaAct').val(datos.id_area);
	$('#Area_nombreAct').val(datos.nombre);
}

function actualizaDatosArea(){
    idA=$('#idareaAct').val();
	nombreA=$('#Area_nombreAct').val();
    
	cadenaAr=
    "id="+ idA +
	"&nombre=" +nombreA;
    
		   $.ajax({
			type:"post",
			url:"../../cuerpo/contenido/area/edit.php",
			data:cadenaAr,
			success:function(r){
				if(r==1){  
					Swal.fire({
					title: 'Modificado Exitosamente!',
					icon: 'success',
					timer: 3000,
					timerProgressBar: true,
					showCancelButton: false,
					showConfirmButton: false
				});
				$('#marcadores').load('../../php/marcadores.php');
    $('#contenedor_area').load('../../cuerpo/contenido/area/tabla.php'); 
    $('#contenedor_empleados').load('../../cuerpo/contenido/empleados/tabla.php'); 
    $('#contenedor_usuarios').load('../../cuerpo/contenido/usuarios/tabla.php'); 
    $('#contenedor_servicios').load('../../cuerpo/contenido/servicios/tabla.php'); 
    $('#contenedor_peticiones').load('../../cuerpo/contenido/peticiones/tabla.php'); 
    $('#contenedor_bitacora').load('../../cuerpo/contenido/bitacora/tabla.php');  
				  }else{
					console.log(data);
					Swal.fire({
						title: 'Error en el proceso!\n\n\n'+data,
						icon: 'error',
						confirmButtonText: 'Continuar'
					});
				   }
			}
		});

}

function preguntarArea(id){
 alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
 function(){ eliminarDatosArea(id) },
 function(){ alertify.error('Se cancelo')});
}

function eliminarDatosArea(id){
	cadena = "id="+id;
	$.ajax({
		type:"post",
		url:"../../cuerpo/contenido/area/delete.php",
		data: cadena,
		success:function(r){
			if(r==1){  
				Swal.fire({
				title: 'Eliminado Exitosamente!',
				icon: 'success',
				timer: 3000,
				timerProgressBar: true,
				showCancelButton: false,
				showConfirmButton: false
			});
			$('#marcadores').load('../../php/marcadores.php');
    $('#contenedor_area').load('../../cuerpo/contenido/area/tabla.php'); 
    $('#contenedor_empleados').load('../../cuerpo/contenido/empleados/tabla.php'); 
    $('#contenedor_usuarios').load('../../cuerpo/contenido/usuarios/tabla.php'); 
    $('#contenedor_servicios').load('../../cuerpo/contenido/servicios/tabla.php'); 
    $('#contenedor_peticiones').load('../../cuerpo/contenido/peticiones/tabla.php'); 
    $('#contenedor_bitacora').load('../../cuerpo/contenido/bitacora/tabla.php'); 
			  }else{
				console.log(data);
				Swal.fire({
					title: 'Error en el proceso!\n\n\n'+data,
					icon: 'error',
					confirmButtonText: 'Continuar'
				});
			   }
		}

	});
}

function validarNuevaArea(){
	var area_nombre = validarAreaNombre();

	if (area_nombre=="true") {
		//alertify.success("Enviando datos...");
		nombre = $('#Area_nombre').val();
		  agregardatosArea(nombre);
	}else{
		console.log('Error al agregar informacion(Area)');
        Swal.fire({
            title: 'Error en la validacion \n Favor de revisar',
            icon: 'warning',
            timer: 2000,
            timerProgressBar: true,
            showCancelButton: false,
            showConfirmButton: false
        });
	}
}
function validarAreaNombre(){  
	var valor = document.getElementById("Area_nombre").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_area_nombre').remove();
		$('#Area_nombre').parent().attr("class", "form-group has-error has-feedback");
		$('#Area_nombre').parent().append('<span id="icono_area_nombre" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_area_nombre').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(numeros.test(valor)){
		$('#icono_area_nombre').remove();
		$('#Area_nombre').parent().attr("class", "form-group has-error has-feedback");
		$('#Area_nombre').parent().append('<span id="icono_area_nombre" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_area_nombre').text("Numeros no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_area_nombre').remove();
		$('#Area_nombre').parent().attr("class", "form-group has-error has-feedback");
		$('#Area_nombre').parent().append('<span id="icono_area_nombre" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_area_nombre').text("Longitud no valida 5-20").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_area_nombre').remove();
		$('#Area_nombre').parent().attr("class", "form-group has-success has-feedback");
		$('#Area_nombre').parent().children("span").text("").hide();
		$('#Area_nombre').parent().append('<span id="icono_area_nombre" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}


function validarNuevaArea_E(){
	var area_nombre_e = validarAreaNombre_e();

	if (area_nombre_e == "true") {
		//alertify.success("Enviando datos...");
		actualizaDatosArea();
	}else{
		console.log('Error al agregar informacion(Area)');
        Swal.fire({
            title: 'Error en la validacion \n Favor de revisar',
            icon: 'warning',
            timer: 2000,
            timerProgressBar: true,
            showCancelButton: false,
            showConfirmButton: false
        });
	}
}
function validarAreaNombre_e(){  
	var valor = document.getElementById("Area_nombreAct").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_area_nombreAct').remove();
		$('#Area_nombreAct').parent().attr("class", "form-group has-error has-feedback");
		$('#Area_nombreAct').parent().append('<span id="icono_area_nombreAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_area_nombreAct').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(numeros.test(valor)){
		$('#icono_area_nombreAct').remove();
		$('#Area_nombreAct').parent().attr("class", "form-group has-error has-feedback");
		$('#Area_nombreAct').parent().append('<span id="icono_area_nombreAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_area_nombreAct').text("Numeros no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_area_nombreAct').remove();
		$('#Area_nombreAct').parent().attr("class", "form-group has-error has-feedback");
		$('#Area_nombreAct').parent().append('<span id="icono_area_nombreAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_area_nombreAct').text("Longitud no valida 5-20").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_area_nombreAct').remove();
		$('#Area_nombreAct').parent().attr("class", "form-group has-success has-feedback");
		$('#Area_nombreAct').parent().children("span").text("").hide();
		$('#Area_nombreAct').parent().append('<span id="icono_area_nombreAct" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}


