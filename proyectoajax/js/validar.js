/*global $*/
function validateNewProfesor(){
    $('#iptDNIR').on('blur', function() {
        var dni = $(this).val();
        var numero
        var letr
        var letra
        var expresion_regular_dni
        expresion_regular_dni = /^\d{8}[a-zA-Z]$/;
        
        if(expresion_regular_dni.test (dni) == true){
            numero = dni.substr(0,dni.length-1);
            letr = dni.substr(dni.length-1,1);
            numero = numero % 23;
            letra='TRWAGMYFPDXBNJZSQVHLCKET';
            letra=letra.substring(numero,numero+1);
            if (letra!=letr.toUpperCase()) {
                $(this).next('label').removeClass('correcto');
                $(this).next('label').addClass('error');
            }else{
                $(this).next('label').removeClass('error');
                $(this).next('label').addClass('correcto');
            }
        }else{
            $(this).next('label').removeClass('correcto');
            $(this).next('label').addClass('error');
        }
    })
    
    $('#iptPasswordR').on('keypress', function(){
        var password1 = $('#iptPasswordR').val();
        var passwordReg = /^(?=.*\d)(?=.*[A-z])[0-9A-z]{5,}$/; 
        
        if(password1.match(passwordReg)){
            $(this).next('label').removeClass('error');
            $(this).next('label').addClass('correcto');
        }else{
            $(this).next('label').removeClass('correcto');
            $(this).next('label').addClass('error');
        }
    })
    
    /*5Caracteres 1letra + 1número*/
    $('#iptPassword2R').on('blur', function(){
        var password1 = $('#iptPasswordR').val();
        var password2 = $('#iptPassword2R').val();
        
        if(password1 === password2){
            if($(this).next().is('span')){
                $(this).next().next('label').remove();
            }
            $(this).next('label').addClass('correcto');
        }else{
            if(!$(this).next().is('span')){
                $('<span class="fa fa-check-square-o"> Deben de ser las dos contraseñas iguales</span>').insertAfter($(this)); 
            }
            $(this).next('label').removeClass('correcto');
            
        }
        
    })
}