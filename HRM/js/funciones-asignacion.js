function AgregarAsi(datos){ 
    // alert(datos);
     d = datos.split('||');
 
     nombre_e =" - ".concat(d[2]);
     empleado = d[1].concat(nombre_e);
 
     $('#view_asi_id').html(d[0]);
     $('#view_asi_emp').html(empleado);
     $('#view_asi_dias').html(d[3]);
 }
 
 function agregardatosAsi(ideasi, dias){
     cadena="ide=" + ideasi +
            "&dias=" + dias;
     //alert(cadena);
     $.ajax({
         type:"post",
         url:"../contenido/asignacion/add.php",
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
 
 function agregarformAsi(datos){
     d = datos.split('||');
  
     $('#Asi_idasignacion_e').val(d[0]);
     $('#Asi_idempleado_e').val(d[1]);
     $('#Asi_dias_e').val(d[2]);
 }
 
 function actualizaDatosAsi(){
     ida=$('#Asi_idasignacion_e').val();
     ide=$('#Asi_idempleado_e').val();
     dias=$('#Asi_dias_e').val();
     
     cadenaAsi=
     "idas="+ ida +
     "&ide=" + ide +
     "&dias="+ dias;
     
    // alert(cadenaAsi);
 
            $.ajax({
             type:"post",
             url:"../contenido/asignacion/edit.php",
             data:cadenaAsi,
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
                   //alert('exito');
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
 
 function preguntarAsi(id){
  alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
  function(){ eliminarDatosAsi(id) },
  function(){ alertify.error('Se cancelo')});
 }
 
 function eliminarDatosAsi(id){
     cadena = "id="+id;
     $.ajax({
         type:"post",
         url:"../contenido/asignacion/delete.php",
         data: cadena,
         success:function(r){
          if(r==1){
            $('#contenedor_empleados').load('empleados/tabla.php'); 
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
 
 