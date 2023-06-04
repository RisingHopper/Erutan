/**Funcion para la validacion CaptchaV3*/
const validateRegistroForm = (tokenRegistroResponse) => {
    //alert("funcion test")
    let formdataValidateFormRegistro = new FormData();
    formdataValidateFormRegistro.append("token", tokenRegistroResponse);
    let requestOptions = {
        method: 'POST',
        body: formdataValidateFormRegistro,
        redirect: 'follow'
    };
    fetch("locahost/DWES/theErutan/web/functions/reCAPTCHAvalidator.php", requestOptions)
        .then(response => response.text())
        .then(result => JSON.parse(result))
        .then(data => data.success === true ? addContactForm() : ((data.dataError == "2") ? showAlert("error", "SPAM", "Ha sido detectado como spam. Si no es usted un robot pongase en contacto con nosotros.") : responseKo()))
        .catch(error => console.log('error', error));
}


/**Función para añadir la solicitud de contacto*/

const addContactForm = () => {
    let formdataRegistroForm = new FormData();
    formdataRegistroForm.append("nombreCompleto", document.getElementById("nombreCompleto").value);
    formdataRegistroForm.append("usuario", document.getElementById("usuario").value);
    formdataRegistroForm.append("email", document.getElementById("email").value);
    formdataRegistroForm.append("telefono", document.getElementById("telefono").value);
    formdataRegistroForm.append("pais", document.getElementById("pais").value);
    formdataRegistroForm.append("ciudad", document.getElementById("ciudad").value);
    formdataRegistroForm.append("contrasenya", document.getElementById("contrasenya").value);
    formdataRegistroForm.append("contrasenyaConfirmar", document.getElementById("contrasenyaConfirmar").value);

    let requestOptions = {
        method: 'POST',
        body: formdataRegistroForm,
        redirect: 'follow'
    };
    fetch("locahost/DWES/theErutan/web/functions/addContacto.php", requestOptions)
        .then(response => response.text())
        .then(result => responseOk(result, "Gracias por contactar con nosotros!"))
        .catch(error => console.log('error', error));
}