$(function () {
    $('#pet_fecha').datetimepicker({
        icons: {
            time: "icon-clock",
            date: "iconcalendar",
            up: "icon-arrow-up2",
            down: "icon-arrow-down2",
            previous: "icon-arrow-left2",
            next: "icon-arrow-right2",
            today: "icon-target",
            clear: "icon-bin"
        }
    });
});
$(function () {
    $('#pet_fecha_e').datetimepicker({
        icons: {
            time: "icon-clock",
            date: "iconcalendar",
            up: "icon-arrow-up2",
            down: "icon-arrow-down2",
            previous: "icon-arrow-left2",
            next: "icon-arrow-right2",
            today: "icon-target",
            clear: "icon-bin"
        }
    });
}); 
$(document).ready(function(){
 $("#guardar_peticion").click(ValidarPet);
    $("#pet_area").click(validarPetArea);
    $("#pet_area").change(generarempleados_a);
    $("#pet_empleado").click(validarPetEmpleado);
    $("#pet_fecha").click(validarPetFecha);
    $("#pet_fecha").keyup(validarPetFecha);
    $("#pet_servicio").click(validarPetServicio);
    $("#pet_estado").click(validarPetEstado);
 

$("#actualizar_peticion").click(ValidarPet_e);
    $("#pet_area_e").click(validarPetArea_e);
    $("#pet_area_e").change(generarempleados_e);
    $("#pet_empleado_e").click(validarPetEmpleado_e);
    $("#pet_fecha_e").click(validarPetFecha_e);
    $("#pet_fecha_e").keyup(validarPetFecha_e);
    $("#pet_servicio_e").click(validarPetServicio_e);
    $("#pet_estado_e").click(validarPetEstado_e);
});
function generarempleados_a(){
    var id_a = $('#pet_area').val();
    var id = "pet_empleado"
    cadena = "id_a=" + id_a +
             "&id=" + id;
    $.ajax({
    type:"post",
    url:"../../php/generar_empleados.php",
    data: cadena,
        success:function(data){
            $('#generar_empleados_a').html(data);
        }
    });
}
function generarempleados_e(){
    var id_a = $('#pet_area_e').val();
    var id = "pet_empleado_e"
    cadena = "id_a=" + id_a +
             "&id=" + id;
    $.ajax({
    type:"post",
    url:"../../php/generar_empleados.php",
    data: cadena,
        success:function(data){
            $('#generar_empleados_e').html(data);
        }
    });
}
function AgregarViewPet(datos){ 
    d = datos.split('||');

    wa = " - ".concat(d[5]);
    area = d[4].concat(wa);

     nwol = " ".concat(d[3]);
     nml= d[2].concat(nwol);

     nw = " ".concat(nml);
     name= d[1].concat(nw);

        $('#view_peticion_id').html(d[0]);
        $('#view_peticion_empleado').html(name);
        $('#view_peticion_area').html(area);
        $('#view_peticion_fecha').html(d[6]);
        $('#view_peticion_servicio').html(d[7]);
        $('#view_peticion_comentarios').html(d[8]);
        $('#view_peticion_estado').html(d[9]);
    }
function ValidarPet(){
    var p_Area = validarPetArea();
    var p_Empleado = validarPetEmpleado();
    var p_Fecha = validarPetFecha();
    var p_Servicio = validarPetServicio();
    var p_Estado = validarPetEstado();

    if( p_Area == "true" && p_Empleado == "true" && p_Fecha == "true"&& p_Servicio == "true" && p_Estado == "true" ){
        info_area =  $("#pet_area").val();
        info_empleado =  $("#pet_empleado").val();
        info_fecha = $("#pet_fecha").val();
        info_servicio =  $("#pet_servicio").val();
        info_comentarios = $("#pet_comentarios").val();
        info_estado = $("#pet_estado").val();
        
        AgregarPet(info_area, info_empleado, info_fecha,info_servicio, info_comentarios, info_estado);
    
    }else{
        console.log('Error al agregar informacion(Peticion)');
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
function AgregarPet(info_area, info_empleado, fecha, info_servicio, info_comentarios, info_estado){
    cadena = "info_empleado=" + info_empleado +
             "&info_area=" + info_area + 
             "&fecha=" + fecha + 
             "&info_servicio=" + info_servicio+
             "&comentarios=" + info_comentarios+
             "&estado=" + info_estado;
    $.ajax({
        type:"post",
        url:"../../cuerpo/contenido/peticiones/add.php",
        data: cadena,
        success:function(data){
            if(data==1){
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
function validarPetArea(){
	var valor = document.getElementById("pet_area").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null"){
		$('#icono_texto_pet_area').remove();
		$('#pet_area').parent().attr("class", "form-group has-error has-feedback");
		$('#pet_area').parent().append('<span id="icono_texto_pet_area" class="icon-cross form-control-feedback mt-2" style="right: 10px;top: 35px;"></span>');
		$('#text_help_pet_area').text("Seleccione un area valida").show();
		estado  = "false";
	}else{
		$('#icono_texto_pet_area').remove();
		$('#pet_area').parent().attr("class", "form-group has-success has-feedback");
		$('#pet_area').parent().children("span").text("").hide();
		$('#pet_area').parent().append('<span id="icono_texto_pet_area" class="icon-checkmark form-control-feedback mt-2" style="right: 10px;top: 35px;"></span>');
		estado  = "true";
    }

return estado;
}
function validarPetEmpleado(){
	var valor = document.getElementById("pet_empleado").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null"){
		$('#icono_texto_pet_empleado').remove();
		$('#pet_empleado').parent().attr("class", "form-group has-error has-feedback");
		$('#pet_empleado').parent().append('<span id="icono_texto_pet_empleado" class="icon-cross form-control-feedback mt-2" style="right: 10px;top: 35px;"></span>');
		$('#text_help_pet_empleado').text("Seleccione un empleado valido").show();
		estado  = "false";
	}else{
		$('#icono_texto_pet_empleado').remove();
		$('#pet_empleado').parent().attr("class", "form-group has-success has-feedback");
		$('#pet_empleado').parent().children("span").text("").hide();
		$('#pet_empleado').parent().append('<span id="icono_texto_pet_empleado" class="icon-checkmark form-control-feedback mt-2" style="right: 10px;top: 35px;"></span>');
		estado  = "true";
    }
    
return estado;
}
function validarPetFecha(){
    
    var valor = document.getElementById("pet_fecha").value;
  //  alert(valor);
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
    let espacios = /^\s$/;
    let fecha = /^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})(\s)([0-1][0-9]|2[0-3])(:)([0-5][0-9]|2[aApP][mM])$/;
	let estado  = "false";

	if( valor == null || valor.length == 0){
		$('#icono_texto_pet_fecha').remove();$('.input-group-addon').remove();
		$('#pet_fecha').parent().attr("class", "form-group has-error has-feedback");
        $('#pet_fecha').parent().append('<span id="icono_texto_pet_fecha" class="icon-cross form-control-feedback mt-2" style="right: 30px;top: 40px;"></span><span class="input-group-addon"><span class="icon-calendar"></span></span>');
		$('#text_help_pet_fecha').text("Ingrese un formato valido").show();
		estado  = "false";
	}else{
		$('#icono_texto_pet_fecha').remove();
		$('#pet_fecha').parent().attr("class", "form-group has-success has-feedback");
		$('#pet_fecha').parent().children("span").text("").hide();
		$('#pet_fecha').parent().append('<span id="icono_texto_pet_fecha" class="icon-checkmark form-control-feedback mt-2" style="right: 30px;top: 40px;"></span><span class="input-group-addon"><span class="icon-calendar"></span></span>');
		estado  = "true";
    }
    
return estado;
}
function validarPetServicio(){
	var valor = document.getElementById("pet_servicio").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null"){
		$('#icono_texto_pet_servicio').remove();
		$('#pet_servicio').parent().attr("class", "form-group has-error has-feedback");
		$('#pet_servicio').parent().append('<span id="icono_texto_pet_servicio" class="icon-cross form-control-feedback mt-2" style="right: 10px;top: 35px;"></span>');
		$('#text_help_pet_servicio').text("Seleccione un servicio valido ").show();
		estado  = "false";
	}else{
		$('#icono_texto_pet_servicio').remove();
		$('#pet_servicio').parent().attr("class", "form-group has-success has-feedback");
		$('#pet_servicio').parent().children("span").text("").hide();
		$('#pet_servicio').parent().append('<span id="icono_texto_pet_servicio" class="icon-checkmark form-control-feedback mt-2" style="right: 10px;top: 35px;"></span>');
		estado  = "true";
    }
    
return estado;
}
function validarPetEstado(){
	var valor = document.getElementById("pet_estado").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null"){
		$('#icono_texto_pet_estado').remove();
		$('#pet_estado').parent().attr("class", "form-group has-error has-feedback");
		$('#pet_estado').parent().append('<span id="icono_texto_pet_estado" class="icon-cross form-control-feedback mt-2" style="right: 10px;top: 35px;"></span>');
		$('#text_help_pet_estado').text("Seleccione un estado valido ").show();
		estado  = "false";
	}else{
		$('#icono_texto_pet_estado').remove();
		$('#pet_estado').parent().attr("class", "form-group has-success has-feedback");
		$('#pet_estado').parent().children("span").text("").hide();
		$('#pet_estado').parent().append('<span id="icono_texto_pet_estado" class="icon-checkmark form-control-feedback mt-2" style="right: 10px;top: 35px;"></span>');
		estado  = "true";
    }
    
return estado;
}
function agregarformPet(datos){
    d = datos.split('||');
 
    $('#id_peticion_e').val(d[0]);
	$('#pet_area_e').val(d[1]);
	
	$('#pet_fecha_e').val(d[3]);
    $('#pet_servicio_e').val(d[4]);
    $('#pet_comentarios_e').val(d[5]);
    $('#pet_estado_e').val(d[6]);

    $.when( generarempleados_e()).then(function(){
        $('#pet_empleado_e').val(d[2]);
    });


}
           
function actualizaDatosPet(){
    id=$('#id_peticion_e').val();
	area=$('#pet_area_e').val();
	id_empleado=$('#pet_empleado_e').val();
    fecha=$('#pet_fecha_e').val();
	servicio=$('#pet_servicio_e').val();
    comentarios_pet= $('#pet_comentarios_e').val();
    estado_pet = $('#pet_estado_e').val();
    
	cadenapet=
    "id="+ id +
	"&area=" +area+
	"&id_empleado="+id_empleado+
    "&fecha="+fecha+
	"&servicio="+servicio+
    "&comentarios=" + comentarios_pet+
    "&estado=" + estado_pet;
    
		   $.ajax({
			type:"post",
			url:"../../cuerpo/contenido/peticiones/edit.php",
			data:cadenapet,
			success:function(data){
                if(data==1){
                    Swal.fire({
                        title: 'Actualizado Exitosamente!',
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
function ValidarPet_e(){
    var p_Area_e = validarPetArea_e();
    var p_Empleado_e = validarPetEmpleado_e();
    var p_Fecha_e = validarPetFecha_e();
    var p_Servicio_e = validarPetServicio_e();
    var p_Estado_e = validarPetEstado_e();

    if( p_Area_e == "true" && p_Empleado_e == "true" && p_Fecha_e == "true" && p_Servicio_e == "true" && p_Estado_e == "true" ){

        
        actualizaDatosPet();
    
    }else{
        console.log('Error al agregar informacion(Peticion)');
        console.log( p_Area_e );
        console.log( p_Empleado_e );
        console.log(  p_Fecha_e );
        console.log(p_Servicio_e );
        console.log( p_Estado_e );
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
function validarPetArea_e(){
	var valor = document.getElementById("pet_area_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null"){
		$('#icono_texto_pet_area_e').remove();
		$('#pet_area_e').parent().attr("class", "form-group has-error has-feedback");
		$('#pet_area_e').parent().append('<span id="icono_texto_pet_area_e" class="icon-cross form-control-feedback mt-2" style="right: 10px;top: 35px;"></span>');
		$('#text_help_pet_area_e').text("Seleccione un area valida").show();
		estado  = "false";
	}else{
		$('#icono_texto_pet_area_e').remove();
		$('#pet_area_e').parent().attr("class", "form-group has-success has-feedback");
		$('#pet_area_e').parent().children("span").text("").hide();
		$('#pet_area_e').parent().append('<span id="icono_texto_pet_area_e" class="icon-checkmark form-control-feedback mt-2" style="right: 10px;top: 35px;"></span>');
		estado  = "true";
    }

return estado;
}
function validarPetEmpleado_e(){
	var valor = document.getElementById("pet_empleado_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null"){
		$('#icono_texto_pet_empleado_e').remove();
		$('#pet_empleado_e').parent().attr("class", "form-group has-error has-feedback");
		$('#pet_empleado_e').parent().append('<span id="icono_texto_pet_empleado_e" class="icon-cross form-control-feedback mt-2" style="right: 10px;top: 35px;"></span>');
		$('#text_help_pet_empleado_e').text("Seleccione un empleado valido").show();
		estado  = "false";
	}else{
		$('#icono_texto_pet_empleado_e').remove();
		$('#pet_empleado_e').parent().attr("class", "form-group has-success has-feedback");
		$('#pet_empleado_e').parent().children("span").text("").hide();
		$('#pet_empleado_e').parent().append('<span id="icono_texto_pet_empleado_e" class="icon-checkmark form-control-feedback mt-2" style="right: 10px;top: 35px;"></span>');
		estado  = "true";
    }
    
return estado;
}
function validarPetFecha_e(){
    
    var valor = document.getElementById("pet_fecha_e").value;
  //  alert(valor);
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
    let espacios = /^\s$/;
    let fecha = /^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})(\s)([0-1][0-9]|2[0-3])(:)([0-5][0-9]|2[aApP][mM])$/;
	let estado  = "false";

	if( valor == null || valor.length == 0){
		$('#icono_texto_pet_fecha_e').remove();$('.input-group-addon_e').remove();
		$('#pet_fecha_e').parent().attr("class", "form-group has-error has-feedback");
        $('#pet_fecha_e').parent().append('<span id="icono_texto_pet_fecha_e" class="icon-cross form-control-feedback mt-2" style="right: 30px;top: 40px;"></span><span class="input-group-addon_e"><span class="icon-calendar"></span></span>');
		$('#text_help_pet_fecha_e').text("Ingrese un formato valido").show();
		estado  = "false";
	}else{
		$('#icono_texto_pet_fecha').remove();
		$('#pet_fecha').parent().attr("class", "form-group has-success has-feedback");
		$('#pet_fecha').parent().children("span").text("").hide();
		$('#pet_fecha').parent().append('<span id="icono_texto_pet_fecha" class="icon-checkmark form-control-feedback mt-2" style="right: 30px;top: 40px;"></span><span class="input-group-addon"><span class="icon-calendar"></span></span>');
		estado  = "true";
    }
    
return estado;
}
function validarPetServicio_e(){
	var valor = document.getElementById("pet_servicio_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null"){
		$('#icono_texto_pet_servicio_e').remove();
		$('#pet_servicio_e').parent().attr("class", "form-group has-error has-feedback");
		$('#pet_servicio_e').parent().append('<span id="icono_texto_pet_servicio_e" class="icon-cross form-control-feedback mt-2" style="right: 10px;top: 35px;"></span>');
		$('#text_help_pet_servicio_e').text("Seleccione un servicio valido ").show();
		estado  = "false";
	}else{
		$('#icono_texto_pet_servicio_e').remove();
		$('#pet_servicio_e').parent().attr("class", "form-group has-success has-feedback");
		$('#pet_servicio_e').parent().children("span").text("").hide();
		$('#pet_servicio_e').parent().append('<span id="icono_texto_pet_servicio_e" class="icon-checkmark form-control-feedback mt-2" style="right: 10px;top: 35px;"></span>');
		estado  = "true";
    }
    
return estado;
}
function validarPetEstado_e(){
	var valor = document.getElementById("pet_estado_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null"){
		$('#icono_texto_pet_estado_e').remove();
		$('#pet_estado_e').parent().attr("class", "form-group has-error has-feedback");
		$('#pet_estado_e').parent().append('<span id="icono_texto_pet_estado_e" class="icon-cross form-control-feedback mt-2" style="right: 10px;top: 35px;"></span>');
		$('#text_help_pet_estado_e').text("Seleccione un estado valido ").show();
		estado  = "false";
	}else{
		$('#icono_texto_pet_estado_e').remove();
		$('#pet_estado_e').parent().attr("class", "form-group has-success has-feedback");
		$('#pet_estado_e').parent().children("span").text("").hide();
		$('#pet_estado_e').parent().append('<span id="icono_texto_pet_estado_e" class="icon-checkmark form-control-feedback mt-2" style="right: 10px;top: 35px;"></span>');
		estado  = "true";
    }
    return estado;
}

function preguntarPet(id){
    alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
    function(){ eliminarDatosPet(id) },
    function(){ alertify.error('Se cancelo')});
   }
   
   function eliminarDatosPet(id){
       cadena = "id="+id;
       $.ajax({
           type:"post",
           url:"../../cuerpo/contenido/peticiones/delete.php",
           data: cadena,
           success:function(data){
            if(data==1){
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