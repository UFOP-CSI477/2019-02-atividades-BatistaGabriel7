$(document).ready(function() {
    $("#dados").validate({
        rules: {
            produto: {
                required: true
            },
            quantidade: {
                required: true,
            },
            cliente: {
                required: true
            }
        }
    })
})