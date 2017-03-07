//---- plantilla de login boton de enviar ------
    $('#btLogIn').on('click', function() {
        $.ajax({
            url: "index.php",
            data: {
                ruta: 'login',
                accion: 'login',
                email: $('#iptEmail').val(),
                password: $('#iptPassword').val()
            },
            type: "GET",
            dataType: "json"
        }).done(function(objetoJson) {
            login(objetoJson);
            location.reload(); 
        });
    });
    
    function login(objetoJson){
        if(objetoJson.login){
           $('.informacion').text('Registro correcto.');
        }else{
           $('.informacion').text('Fallo de registro.');
        }
    };
    
    //---- plantilla de login boton de borrar ------
    $('#btDelete').on('click', function() {
        $.ajax({
            url: "index.php",
            data: {
                ruta: 'login',
                accion: 'delete',
                email: $('#iptEmail').val(),
                password: $('#iptPassword').val()
            },
            type: "GET",
            dataType: "json"
        }).done(function(objetoJson) {
            login(objetoJson);
        });
    });
  
//---- plantilla de login boton de logout ------
    $('#cerrar-sesion').on('click', function() {
        $.ajax({
            url: "index.php",
            data: {
                ruta: 'login',
                accion: 'logout',
                email: $('#iptEmail').val(),
                password: $('#iptPassword').val()
            },
            type: "GET",
            dataType: "json"
        }).done(function(objetoJson) {
            location.reload();
            });
    });


// boton Go back para volver al proyecto desde login
$('#btBackLogin').click(function(e){
    
    e.preventDefault();
    window.location.replace('https://proyectoies-imochon7.c9users.io');
});

