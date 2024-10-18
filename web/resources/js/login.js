function validateData(event) {
    event.preventDefault();

    const form = document.getElementById('record');
    const formElements = form.elements;

    for (let i = 0; i < formElements.length; i++) {
        if (!formElements[i].checkValidity()) {
        // Si algún campo no es válido, mostrar mensaje de error y salir de la función
        alert('Por favor, complete todos los campos correctamente.');
        return;
        }
    }

    sendForm();
}
function sendForm() {

    const username = $('#username').val();
    const password = $('#password').val();
    const formData = {
        username,
        password
    };
    $.ajax({
        url: "https://5.161.211.225/v4/web/services/login.php",
        type: "POST",
        data: formData,
        success: function(res) {
            if(res.status){
                if(res.login){
                    window.location = 'load.php';
                }else{
                    const username = $('#username').val('');
                    const password = $('#password').val('');
                    swal({
                        text: 'Por favor, verifica tu usuario y contraseña.',
                        title: "Credenciales Incorrectas",
                        icon: "warning",
                        dangerMode: true
                    })
                }
            }
        },
        error: function(res) {
            swal({
                title: "Error 500 Interno en el servidor!",
                text: "Error: Contacte a su administrador. ",
                icon: "warning",
                dangerMode: true
            })
        }
    });
}
