function validar(campo, alerta, label) {
    let n = campo.value;

    if (n.length == 0) {
        //Erro
        //Exibir alerta:
        document.getElementById(alerta).style.display = "block";
        //Reporte o campo como inválido
        campo.classList.add("is-invalid");
        //Reportar o label como invalido/atencao
        document.getElementById(label).classList.add("text-danger");
        //finalizar
        campo.value = "";
        campo.focus();
        return false;
    }
    //Tudo correto
    document.getElementById(alerta).style.display = "none";
    campo.classList.remove("is-invalid");
    campo.classList.add("is-valid");
    document.getElementById(label).classList.remove("text-danger");
    document.getElementById(label).classList.add("text-success");
    return true;
}

function calcular() {
    let n1 = document.dados.amplitude;
    let n2 = document.dados.distancia;

    if (validar(n1, "alerta1", "label1") && validar(n2, "alerta2", "label2")) {
        let res = Math.log10(parseFloat(n1.value)) + 3 * (Math.log10(8 * parseFloat(n2.value))) - 2.92;
        console.log(res);

        if (res < 3.5) {
            document.dados.classificacao.value = "Imperceptível.";
        } else if (res >= 3.5 && res <= 5.4) {
            document.dados.classificacao.value = "Pequeno.";
        } else if (res > 5.4 && res <= 6) {
            document.dados.classificacao.value = "Moderado.";
        } else if (res > 6.0 && res <= 6.9) {
            document.dados.classificacao.value = "Forte.";
        } else if (res > 6.9 && res <= 7.9) {
            document.dados.classificacao.value = "Grande.";
        } else {
            document.dados.classificacao.value = "Enorme.";
        }

        if (res < 3.5) {
            document.dados.efeitos.value = "Geralmente não sentido, mas gravado.";;
        } else if (res >= 3.5 && res <= 5.4) {
            document.dados.efeitos.value = "Às vezes sentido, mas raramente causa danos";
        } else if (res > 5.4 && res <= 6) {
            document.dados.efeitos.value = "Pequenos danos a prédios bem construídos, mas pode danificar seriamente casas mal construídas.";
        } else if (res > 6.0 && res <= 6.9) {
            document.dados.efeitos.value = "Pode ser destrutivo em áreas em torno de até 100km do epicentro.";
        } else if (res > 6.9 && res <= 7.9) {
            document.dados.efeitos.value = "Grande terremoto. Pode causar sérios danos numa grande faixa.";
        } else {
            document.dados.efeitos.value = "Enorme terremoto. Pode causar graves danos em muitas áreas mesmo que estejam a centenas de quilômetros.";
        }

    }



}