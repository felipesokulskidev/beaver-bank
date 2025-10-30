const checkbox = document.getElementById("checkbox");
const botao = document.getElementById("botao");

checkbox.addEventListener("change", () => {
    botao.disabled = !checkbox.checked;

    if (checkbox.checked) {
        botao.classList.add("ativo");
    } else {
        botao.classList.remove("ativo");
    }
});

async function cadastrar() {
    var form = document.getElementById("form-cadastro");
    var form_dados = new FormData(form);

    var retorno = await fetch("../php/cadastrar.php", {
        method: "POST",
        body: form_dados
    });

    var dados = await retorno.json();

    if (dados.status == "s") {
        console.log(dados);
        alert(dados.mensagem);
        window.location.href = "sucesso.html";
    } else {
        alert(dados.mensagem);
    }
}
