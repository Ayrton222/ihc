var Elemento = document.getElementById('btn');
var paiDoElemento = Elemento.parentNode;

var sim = document.getElementById('check');


var elementosInseridos = [];

function teste(){

    if(sim.checked){

        var forms = document.getElementById("formCadastro");
        forms.action = './php/CadastroMotorista.php';

        sim.value = 'sim';
        console.log(sim.value);
       var info =[
        {tag: 'h2' , attribute: 'class', content: 'Insira os dados do seu veiculo'},
        {tag: 'input', attribute: 'placeholder', value:'Digite o modelo do seu veiculo', name:'veiculo'},
        {tag: 'input', attribute: 'placeholder', value: 'Digite a placa do seu veiculo', name:'placa'}
       ];
       
       for(var i = 0; i < info.length; i++){
           var novoElemento = document.createElement(info[i].tag);
           novoElemento.setAttribute(info[i].attribute, info[i].value);
           novoElemento.innerHTML = info[i].content;
           novoElemento.name = info[i].name;

           elementosInseridos.push(novoElemento);

           paiDoElemento.insertBefore(novoElemento,Elemento)
       }

       
    }else{
        sim.value = 'nao';

        console.log(sim.value);
        for (var j = 0; j < elementosInseridos.length; j++) {
            var elementoRemover = elementosInseridos[j];
            paiDoElemento.removeChild(elementoRemover);
          }
          elementosInseridos = []; 
    }
}