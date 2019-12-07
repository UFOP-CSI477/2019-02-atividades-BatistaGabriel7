$(document).ready(function() {
    $("#dados").validate({
        rules: {
            nome: {
                required: true
            },
            peso: {
                required: true
            },
            unidade: {
                required: true
            },
            valor: {
                required: true
            },
            estoque: {
                required: true
            },
            mercado: {
                required: true
            },
            fornecedor: {
                required: true
            }
        }
    })
})