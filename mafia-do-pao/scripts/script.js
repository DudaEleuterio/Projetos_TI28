document.getElementById('telefone').addEventListener('input', function(event) {
    const input = event.target;
    let value = input.value.replace(/\D/g, ''); // Remove caracteres não numéricos

    if (value.length <= 10) {
        value = value.replace(/(\d{2})(\d{0,4})/, '($1) $2');
        value = value.replace(/(\d{4})(\d{0,4})/, '$1-$2');
    } else {
        value = value.replace(/(\d{2})(\d{5})(\d{0,4})/, '($1) $2-$3');
    }

    input.value = value;
});    

// FORMATO DO CPF
// Função para formatar o CPF conforme a máscara
function formatarCPF(input) {
    // Remove todos os caracteres que não são dígitos
    let valor = input.value.replace(/\D/g, '');
 
    // Adiciona a máscara ao valor
    // Adiciona o primeiro ponto após os 3 primeiros dígitos
    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
    // Adiciona o segundo ponto após os 3 dígitos seguintes
    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
    // Adiciona o hífen antes dos 2 últimos dígitos
    valor = valor.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
 
    // Atualiza o valor do campo de entrada com a máscara
    input.value = valor;
}
 
// Adiciona um event listener para o evento DOMContentLoaded
// Esse evento é disparado quando o HTML inicial foi completamente carregado e analisado
document.addEventListener('DOMContentLoaded', function() {
    // Seleciona o campo de entrada de CPF pelo ID
    const cpfInput = document.getElementById('cpf');
    // Adiciona um event listener para o evento de entrada (input) do campo de CPF
    // Sempre que o usuário digita no campo, a função formatarCPF é chamada
    cpfInput.addEventListener('input', function() {
        formatarCPF(this);
    });
});