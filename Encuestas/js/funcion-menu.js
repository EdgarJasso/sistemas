$(document).ready(function(){
    $('.mennu li:has(ul)').click(function(e){
        e.preventDefault();

        if( $(this).hasClass('activado')){
            $(this).hasClass('activado');
            $(this).removeClass('activado');
            $('.mennu li ul li').css({'display' : 'none'});
            $(this).children('ul').slideUp();
        }else{
            $('.mennu li ul').slideUp();
            $('.mennu li').removeClass('activado');
            $(this).addClass('activado');
            $('.mennu li ul li').css({'display' : 'block'});
            $(this).children('ul').slideDown();
        }
     });

});
