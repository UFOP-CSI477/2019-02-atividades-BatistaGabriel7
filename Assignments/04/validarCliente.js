$(document).ready(function() {
    $("#dados").validate({
        rules: {
            nome: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            endereco: {
                required: true
            },
            cidade: {
                required: true
            },
            usuario: {
                required: true
            },
            senha: {
                required: true
            }
        }
    })
})