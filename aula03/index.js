function processarValidacao() {
    const valorInput = document.getElementById('inputcpf').value;
    
    const ehvalido = validarCPF(valorInput);

    if (ehvalido) {
       alert("O CPF" + valorInput + "É VALIDO!") ;
    } else {
        alert("O CPF" + valorInput + "É INVALIDO!") ;
    }
}
function soma(){
    const valorInput = document.getElementById('inputcpf').value;
    const nomeInput = document.getElementById('inputnome').value;
    const emailInput = document.getElementById('inputemail').value;
    const enderecoInput = document.getElementById('inputend').value;
    alert("Olá "+nomeInput+ ", Seu cpf é : "+valorInput+ " o seu endereço é "+enderecoInput+ " E seu email é : "+emailInput);

}

function validarCPF(cpf){
    cpf = cpf.replace(/[^\d]+/g, '');

    if (cpf.length !== 11 || !!cpf.match(/(\d)\1{10}/)) {
        return false;
    }

    const digitos = cpf.split('').map(el => +el);
}