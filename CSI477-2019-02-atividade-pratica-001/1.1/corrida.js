var count = 0;

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

var d = document;

function inserir(idTabela) {
    if (count < 6 && validar(largada, "alerta1", "label1") && validar(competidor, "alerta2", "label2") && validar(tempo, "alerta3", "label3")) {
        var newRow = d.createElement('tr');
        newRow.insertCell(0).innerHTML = d.getElementsByName('largada')[0].value;
        newRow.insertCell(1).innerHTML = d.getElementsByName('competidor')[0].value;
        newRow.insertCell(2).innerHTML = d.getElementsByName('tempo')[0].value;
        d.getElementById(idTabela).appendChild(newRow);
        count++;
        }
    if(count > 5){
        alert("Número máximo de participantes atingido!");
    }
}

function resultado() {
    objetos = [];

    $('#body tr').each(function() {
        var colunas = $(this).children();
        var obj = {
            'largada': $(colunas[0]).text(),
            'competidor': $(colunas[1]).text(),
            'tempo': $(colunas[2]).text(),
            'posicao': "",
            'vencedor': ""
        };
        objetos.push(obj);
    });
    objetos.sort((a, b) => parseFloat(a.tempo) - parseFloat(b.tempo));
    objetos.map((element, index) => {
        element.posicao = index + 1;
        if (index == 0) {
            element.vencedor = "Vencedor!";
        }
    });
    $('thead tr').append($('<th>', { text: 'Posição' }))
    $('thead tr').append($('<th>', { text: 'Vencedor' }))
    $("#body > tr").remove();
    objetos.map((element, index) => {
        let table = document.getElementById("body");
        document.createElement("tr");
        let row = table.insertRow(index);
        let largada = row.insertCell(0);
        let competidor = row.insertCell(1);
        let tempo = row.insertCell(2);
        let posicao = row.insertCell(3);
        let vencedor = row.insertCell(4);
        largada.innerHTML = element.largada;
        competidor.innerHTML = element.competidor;
        tempo.innerHTML = element.tempo;
        posicao.innerHTML = element.posicao;
        vencedor.innerHTML = element.vencedor;
    })
    $("#colocar").attr("disabled", "disabled");
    $("#body tr:first").css({ "background-color": "#66CCFF" })
}