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
    //plantilla de login boton de registrar ----
    //  $('#btregister').on('click', function() {
    //     $.ajax({
    //         url: "index.php",
    //         data: {
    //             ruta: 'login',
    //             accion: 'registro',
    //             nombre: $('#iptNombreR').val(),
    //             dni: $('#iptDNIR').val(),
    //             password: $('#iptPasswordR').val(),
    //             password2: $('#iptPassword2R').val(),
    //             departamento: $('select option:selected').val(),
                
    //         },
    //         type: "GET",
    //         dataType: "json"
    //     }).done(function(objetoJson) {
    //         login(objetoJson);
    //     });
    // });
    
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
  



// /*para el registro de un profesor con foto */
//  $('#btregister').on('click', function() {
//     var f = document.getElementById('register-form');
//     var formData = new FormData(f);
//     var archivo = document.getElementById('imagen');
//     formData.append(archivo, archivo.files[0]);
    
//     $.ajax({
//             url: "index.php?ruta=login&accion=registro",
//             data:formData,
//             type: 'POST',
//             contentType: false,
//             processData: false,
//             }).done(function(objetoJson){
//                 alert(objetoJson);
//             })
       
// });

