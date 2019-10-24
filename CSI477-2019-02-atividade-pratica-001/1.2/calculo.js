function validar(campo) {
    let n = campo.value;

    if (n.length == 0 || isNaN(parseFloat(n))) {
        //erro
        window.alert("Informe o valor corretamente!");

        campo.value = "";
        campo.focus();
        return false;
    }

    //correto
    return true;
}

function calcular() {
    let n1 = document.dados.peso;
    let n2 = document.dados.altura;

    if (validar(n1) && validar(n2)) {
        let res = n1.value / (n2.value * n2.value);
        document.dados.imc.value = res.toFixed(2);

        if (res < 18.5) {
            document.dados.classificacao.value = "Subnutrição.";
        } else if (res >= 18.5 && res <= 24.9) {
            document.dados.classificacao.value = "Peso Saudável.";
        } else if (res >= 25.0 && res <= 29.9) {
            document.dados.classificacao.value = "Sobrepeso.";
        } else if (res >= 30.0 && res <= 34.9) {
            document.dados.classificacao.value = "Obesidade grau 1.";
        } else if (res >= 35.0 && res <= 39.9) {
            document.dados.classificacao.value = "Obesidade grau 2.";
        } else {
            document.dados.classificacao.value = "Obesidade grau 3.";
        }

        let min = (n2.value * n2.value) * 18.5;
        let max = (n2.value * n2.value) * 24.9;

        if (res < 18.5) {
            document.dados.ideal.value = "Seu peso ideal está entre " + (min.toFixed(2)) + "kg e " + (max.toFixed(2)) + "kg.";;
        } else if (res >= 18.5 && res <= 24.9) {
            document.dados.ideal.value = "Seu peso ideal está entre " + (min.toFixed(2)) + "kg e " + (max.toFixed(2)) + "kg.";
        } else if (res >= 25.0 && res <= 29.9) {
            document.dados.ideal.value = "Seu peso ideal está entre " + (min.toFixed(2)) + "kg e " + (max.toFixed(2)) + "kg.";
        } else if (res >= 30.0 && res <= 34.9) {
            document.dados.ideal.value = "Seu peso ideal está entre " + (min.toFixed(2)) + "kg e " + (max.toFixed(2)) + "kg.";
        } else if (res >= 35.0 && res <= 39.9) {
            document.dados.ideal.value = "Seu peso ideal está entre " + (min.toFixed(2)) + "kg e " + (max.toFixed(2)) + "kg.";
        } else {
            document.dados.ideal.value = "Seu peso ideal está entre " + (min.toFixed(2)) + "kg e " + (max.toFixed(2)) + "kg.";
        }

    }



}