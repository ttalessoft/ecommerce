$(document).ready(function(){
    $("#cep").mask("00.000-000")
    $("#telefone_fixo").mask("(00)0000-0000")
    $("#telefone_celular").mask("(00)00000-0000")
    $("#cnpj").mask("00.000.000/0000-00")
    $("#cpf").mask("000.000.000-00")
    $("#rg").mask("999.999.999-W", {
        translation:{
            'W':{
                pattern: /[X0-9]/
            }
        },
        reverse: true
    })
    $("#data").mask("00/00/0000")
    $("#dataShort").mask("00/00/00")
    $("#moeda1").mask("999.999.990,00", {reverse: true})
    $("#moeda2").mask("999.999.990,00", {reverse: true})
    $("#moeda3").mask("999.999.990,00", {reverse: true})
    $("#placa").mask("AAA-0000", {
        translation:{
            'A':{
                pattern: /[A-Z]/
            }
        },
        reverse: true
    })
    $("#peso").mask("999.999.990,00kg", {reverse: true})
})