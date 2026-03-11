function trocarNome() {
    var nome = document.getElementById("campoNome").value;
    document.getElementById("nomeExibido").innerText = 
    "Nome : " + nome;
}
function somar(){
    var numero1 = parseFloat(document.getElementById("num1").value);

    var numero2 = parseFloat(document.getElementById("num2").value);

    var soma = numero1 + numero2;

    document.getElementById("resultado").innerText = 
    "Resultado : "+ soma;
}
function dividir() {
    var numro1 = parseFloat(document.getElementById("valorpeso").value);

    var numro2 = parseFloat(document.getElementById("valoraltura").value);
    var loko = numro2 * numro2;
    var cubo = numro1/loko;

    if (cubo<18.5) {
        document.getElementById("imc").innerText = 
        "Seu Imc : "+ cubo+" Você está estremamente magro";
    }
    else if (cubo>= 18.5 && cubo<=24.9) {
        document.getElementById("imc").innerText = 
        "Seu Imc : "+ cubo+" Você está normal";
    }
   else if (cubo>= 25 && cubo<=29.9) {
        document.getElementById("imc").innerText = 
        "Seu Imc : "+ cubo+"Você está sobrepeso";
    }
   else if (cubo>= 30 && cubo<=39.9) {
        document.getElementById("imc").innerText = 
        "Seu Imc : "+ cubo+" Você está obeso";
    } else {
        document.getElementById("imc").innerText = 
        "Seu Imc : "+ cubo+" Você está estremamente obeso";
    }   
}
