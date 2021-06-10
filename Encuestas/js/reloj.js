const getRemainTime = deadline =>{
    let now = new Date();
        remainTime = (new Date(deadline) - now + 1000)/1000,
        remainSeconds = ('0'+ Math.floor(remainTime % 60)).slice(-2),
        remainMinutes = ('0'+ Math.floor(remainTime / 60 % 60)).slice(-2),
        remainHours = ('0'+ Math.floor(remainTime / 3600 % 24)).slice(-2),
        remainDays = Math.floor(remainTime / (3600 * 24));
    return {
        remainSeconds,
        remainMinutes,
        remainHours,
        remainDays,
        remainTime
    }
};
const reloj = (deadline, elemento, finalMessage, link) => {
    const el = document.getElementById(elemento);

    const timeUpdate = setInterval( () =>{
        let t = getRemainTime(deadline);
        el.innerHTML = `${remainMinutes}m:${t.remainSeconds}s`;
        if(t.remainMinutes < 1 && t.remainSeconds <= 1 || t.remainMinutes > 11){
            clearInterval(timeUpdate);
            el.innerHTML = finalMessage;
            //alert(finalMessage);
            Swal.fire({
                title: finalMessage,
                icon: 'warning',
                timer: 2000,
                timerProgressBar: true,
                showCancelButton: false,
                showConfirmButton: false
            });
            setTimeout(
                function(){
                    document.location.href=link;
                }, 2000);
        }
    }, 1000)
};

