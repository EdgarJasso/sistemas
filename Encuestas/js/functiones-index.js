$(document).ready(function(){

});
jQuery(document).on('submit', '#login', function(event){
    event.preventDefault();
    CheckLogin();
});

function CheckLogin(){ 
    var CL_name = $('#name').val();
    var CL_pass = $('#pass').val();

    cadenaCL = "name=" + CL_name +
             "&pass=" + CL_pass;
    $.ajax({
        type:"post",
        url:"root/checklogin.php",
        data: cadenaCL,
        success:function(r){
            if(r==1){
                console.log(r);
                Swal.fire({
                    title: 'Acceso Aprobado!',
                    icon: 'success',
                    timer: 2000,
                    timerProgressBar: true,
                    showCancelButton: false,
                    showConfirmButton: false
                });
                setTimeout(
                    function(){
                        window.location.href = "../php/root/index.php";
                    }, 2000);
            }else if(r==0){
                console.log(r);
                Swal.fire({
                    title: 'Acceso Denegado!',
                    icon: 'warning',
                    timer: 2000,
                    timerProgressBar: true,
                    showCancelButton: false,
                    showConfirmButton: false
                });
                setTimeout(
                    function(){
                        window.location.href = "../php/index.php";
                    }, 2000);
            }else{
                console.log(r);
                Swal.fire({
                    title: 'Informacion Erronea!',
                    icon: 'error',
                    timer: 2000,
                    timerProgressBar: true,
                    showCancelButton: false,
                    showConfirmButton: false
                });
                setTimeout(
                    function(){
                        window.location.href = "../php/index.php";
                    }, 2000);
            }
        }
    });
}