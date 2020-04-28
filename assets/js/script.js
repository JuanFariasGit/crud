function deletar(obj) {
    const id = obj.id;
    const nome = obj.name;
    const option = "delete";

    if(confirm("Você realmente deseja deletar o usuário " + nome + " ?") === true) {
        $.ajax ({
            type:"POST",
            url:"http://localhost/crud/action_pessoa",
            data:{option:option, id:id},
            success: function() {
                location.reload();
            }
        })
    }
}

var qnt_res_pg = 3;
var pagina = 1;

$(document).ready(function () {
    listar_pessoas(pagina, qnt_res_pg);
});

function listar_pessoas(pagina, qnt_res_pg) {
    const option = "read";

    $.ajax ({
        type:"POST",
        url:"http://localhost/crud/action_pessoa",
        data:{option: option, pagina: pagina, qnt_res_pg: qnt_res_pg},
        success: function(res) {
            $("#lista_pessoas").html(res);
        }
    });
}