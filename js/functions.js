$(document).ready(function(){

    $("#ponto").click(function(){

        const matricula = $("#matricula").val();
        const senha = $("#senha").val();

        $.ajax({
            url: "API/api.php",
            method: 'post',
            data: {requisicao: "ponto", matricula, senha },
            success: function(data){
                alert(data);
                $("#senha").val("");
                $("#matricula").val("");
            }
        })

    })

})