document.getElementById('agendamento-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Impede o envio do formulário

    const nome = document.getElementById('nome').value;
    const data = document.getElementById('data').value;
    const hora = document.getElementById('hora').value;

    const mensagemDiv = document.getElementById('mensagem');
    mensagemDiv.innerHTML = `Agendamento confirmado para ${nome} em ${data} às ${hora}.`;

    // Limpar o formulário após o agendamento
    this.reset();
});
