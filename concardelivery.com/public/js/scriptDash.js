let check = '<i class="material-icons" style="font-size: 1rem;">check</i>';
let servicosCadastradas = [
    {'id':'0', 'servicos':'Lavagem Completa Premium', 'img':'lavagemCompleta-min-min.png', 

    'desc':'<b>Embelezamento Completo</b><br> '+check+' Enceramento<br> '+check+' Aspiração interna <br> '+check+'Limpeza dos Bancos e Carpetes<br>'+check+' Limpeza do Porta-Malas ou Carroceria<br>'+check+'Limpeza das Rodas e Caixa de Rodas<br>'+check+'Silicone protetor no painel e partes plásticas<br>'+check+'Pretinho nos pneus<h6><em>*Preços para carros do modelo hatch<br><br>Sem taxa de locomoção</em><h6>'

    , 'promocao': '0', 'notMsg':'Boleto referente ao mês de abril atrasado!', 'prioridade': '3', 'preco':'34'},
    
    {'id':'1', 'servicos':'Lavagem Externa Premium', 'img':'lavagemExterna-min-min.png', 'desc':'desc da CEMIG', 
        'promocao':'0', 'notMsg':'', 'prioridade': '', 'preco':'14'},
    
    {'id':'2', 'servicos':'Limpeza Interna Especial', 'img':'limpezaInterna-min-min.png', 'desc':'desc da CARREFOUR', 'promocao':'0', 'notMsg':'Qualquer', 'prioridade': '2', 'preco':'19'},

    {'id':'3', 'servicos':'Higienização de Ar-Condicionado', 'img':'prof05.jpg', 'desc':'desc da COPASA', 'promocao':'0', 'notMsg':'', 'prioridade': '', 'preco':'29'},
    
    {'id':'4', 'servicos':'Higienização Automotiva', 'img':'prof03.jpg', 'desc':'desc da COPASA', 'promocao':'0', 'notMsg':'', 'prioridade': '', 'preco':'79'},

    {'id':'5', 'servicos':'Impermeabilização Automotiva', 'img':'prof02.jpg', 'desc':'desc da COPASA', 'promocao':'0', 'notMsg':'', 'prioridade': '', 'preco':'49'},

    {'id':'6', 'servicos':'Polimento Técnico', 'img':'prof04.jpg', 'desc':'desc da COPASA', 
    'promocao':'0', 'notMsg':'', 'prioridade': '', 'preco':'159'},
    
    {'id':'7', 'servicos':'Polimento de Faróis', 'img':'prof01.jpg', 'desc':'desc da COPASA', 'promocao':'0', 'notMsg':'', 'prioridade': '', 'preco':'49'}
    
];

// Inserindo dados dinamicamente

let posicao = 0;
let numeroDeservicos = servicosCadastradas.length;
let estrutura = '';
let itensAdicionados = [];

let index = document.getElementById('index');
let carrinhoDeCompra = document.getElementById('carrinhoDeCompra');
let conteudoCarrinho = document.getElementById('conteudoCarrinho');
let finalizaCompra = document.getElementById("finalizaCompra");
let confirmaPedido = document.getElementById("confirmaPedido");
let rodape = document.getElementById('rodape');
let tempoEstimado = document.getElementById("tempoEstimado");
let valorEstimado = document.getElementById("valorEstimado");
let carros = document.getElementById("carros");
let enderecos = document.getElementById("enderecos");

while(posicao < numeroDeservicos){ //Alimentando variavel estrutura para gerar os servicos

    estrutura += '<div class="col s12 m6 l4 animated flipInX" id="card0'+posicao+'">'
        + '<div class="card">'; 

    if(servicosCadastradas[posicao]['promocao'] == 1){
        let cor = 'yellow';
        if(servicosCadastradas[posicao]['prioridade'] == 2){
            cor = 'orange';
        }else if(servicosCadastradas[posicao]['prioridade'] == 3){
            cor = 'red';
        }
        estrutura += '<span class="new badge btn btn-floating pulse '+cor+'" style="position: absolute; float:right; top: 1rem; right: 1rem">'
               +  '1'
            +'</span>';
    }

    estrutura += '<div class="card-image waves-effect waves-block waves-light">'
           +'<img class="activator imgPrinc" src="img/'+ servicosCadastradas[posicao]['img'] +'" style="height: 200px">'
       +' </div>'
       +'<div class="card-content">'
       +'  <span class="card-title activator grey-text text-darken-4">'
       +'      <!-- Modal Trigger -->'
       +'      <span  id="tituloCartao01">'+servicosCadastradas[posicao]['servicos']+'</span> '
       +'      <i class="material-icons right" style="margin-right:0; float: right; position: relative;">'
       +'          more_vert '
       +'      </i>'
       +'  </span>'
       +'  <p>'
       +'    R$ '+servicosCadastradas[posicao]['preco']+',90*'
       +'      <a class="waves-effect waves-light btn modal-trigger right blue lighten-2" onclick="itemAdicionado('+posicao+'); seleciona('+posicao+');" id="comprar0'+posicao+'">Comprar</a>' //href#modal1
       +'    </p>'
       +'</div>'
       +'<div class="card-reveal">'
       +'    <span class="card-title grey-text text-darken-4 center"><span></span><i class="material-icons right">close</i></span>' //'+servicosCadastradas[posicao]['servicos']+'
       +'    <div class="container center">'
       +'       <div class="row" id="txtDesc0'+posicao+'">'
       + servicosCadastradas[posicao]['desc']
       +'       </div>'
       +'    </div>'
       +'</div>'
       +'</div>'
       +'</div>';
        //<button class="btn btn-flat right green" onclick="tooltip()"><a href="#" style="color:white;">Comprar</a></button>
    posicao++;
}

window.onload  = popular;

function popular(){
    let cartoes = document.getElementById('cartoes');
    cartoes.innerHTML = estrutura;
    escondeVoltar();
    rodape.style.marginTop = "0";
    console.log('populou!');
}
function deselecionaItem(posicao){
    let i = 0;
    while(i < itensAdicionados.length){
        if(itensAdicionados[i]['id'] == servicosCadastradas[posicao]['id']){
            removeItem(i);
        }
        i++;
    }
}
function deseleciona(posicao){
    let comprar = document.getElementById("comprar0"+posicao);
    comprar.textContent = "Comprar";
    comprar.classList.add("blue");
    comprar.classList.remove("grey");
    comprar.setAttribute("onclick", "itemAdicionado("+posicao+"); seleciona("+posicao+");"); //Adicionar functions
    //comprar.href= "#modal1";
    //$("#comprar0"+posicao).css("pointer-events", "none"); //Remove href que setava Modal
    if(posicao == 0){
        let k = 1;
        while(k <= 2){
            let cartao = document.getElementById("card0"+k);
            let btnComprar = document.getElementById("comprar0"+k);
            if(cartao.classList.contains("grey")){
                cartao.classList.remove("grey");
                cartao.classList.remove("lighten-4");
            }
            btnComprar.textContent = "Comprar";
            btnComprar.classList.remove("disabled");
            btnComprar.classList.add("blue");    
            k++;
        }  
    }
}
//Provisoria
function seleciona(posicao){
    let comprar = document.getElementById("comprar0"+posicao);
    comprar.textContent = "Selecionado";
    comprar.classList.remove("blue");
    comprar.classList.add("grey");
    comprar.setAttribute("onclick", "deselecionaItem("+posicao+"); deseleciona("+posicao+");"); //Adicionar functions
    comprar.removeAttribute("href");
    //$("#comprar0"+posicao).css("pointer-events", "none"); //Remove href que setava Modal
    if(posicao == 0){
        let i = 0;
        while(i < itensAdicionados.length){
            if(itensAdicionados[i]['id'] == 1){
                removeItem(i);
            }if(itensAdicionados[i]['id']== 2){
                removeItem(i);
            }
            i++;
        }
        let k = 1;
        while(k <= 2){
            let cartao = document.getElementById("card0"+k);
            let btnComprar = document.getElementById("comprar0"+k);
            if(cartao.classList.contains("light-blue")){
                cartao.classList.remove("light-blue");
                cartao.classList.remove("lighten-2");
            }
            cartao.children[0].classList.add("grey");
            cartao.children[0].classList.add("lighten-4");
            btnComprar.textContent = "Incluso";
            btnComprar.classList.add("disabled");
            btnComprar.classList.remove("blue");    
            k++;
        }  
    }
}

function atualizaCarrinho(){
    let itensCliente = '';    
    for(var i = 0; i < itensAdicionados.length; i++){
        itensCliente += '<div class="col s12 m6 l4 animated flipInX">'
            +       '<div class="card">'
            + '<div class="card-image waves-effect waves-block waves-light">'
            +'<img class="activator imgPrinc" src="img/'+ itensAdicionados[i]['img'] +'" style="height: 200px">'
            +' </div>'
            +'<div class="card-content">'
            +'  <span class="card-title activator grey-text text-darken-4">'
            +'      <!-- Modal Trigger -->'
            +'      <span  id="tituloCartao01">'+itensAdicionados[i]['servicos']+'</span> '
            +'      <i class="material-icons right" style="margin-right:0; float: right; position: relative;">'
            +'          more_vert '
            +'      </i>'
            +'  </span>'
            +'  <p>'
            +'     R$ '+itensAdicionados[i]['preco']+',00'
            +'      <a onclick="removeItem('+i+')" class="waves-effect waves-light btn right red"  style="font-size: 1rem;">Remover Item</a>'
            +'    </p>'
            +'</div>'
            +'<div class="card-reveal">'
            +'    <span class="card-title grey-text text-darken-4 center"><span>'+itensAdicionados[i]['servicos']+'</span><i class="material-icons right">close</i></span>'
            +'    <div class="container center">'
            +'       <div class="row" id="txtDesc01">'
            + itensAdicionados[i]['desc']
            +'       </div>'
            +'    </div>'
            +'</div>'
            +'</div>'
            +'</div>';
    }
    conteudoCarrinho.innerHTML = itensCliente;
}
function itemAdicionado(posicao){
    itensAdicionados.push(servicosCadastradas[posicao]);
    atualizaCarrinho();
    finaliza();
}
function removeItem(posicaoItem){
    let itemRemovido = document.getElementById("itemRemovido");
    let posDeseleciona = parseInt(itensAdicionados[posicaoItem]['id']);
    let semItens = '<h3 style="text-align: center; margin-top: 20%; margin-bottom: 8rem;" class="animated rubberBand" >Nenhum item adicionado ao carrinho ainda :(</h3>';
    itensAdicionados.splice(posicaoItem, 1);    

    atualizaCarrinho();
    if(itensAdicionados.length == 0){
        conteudoCarrinho.innerHTML = semItens;
        cancelFinaliza();
        escondeConfirma();
    }
    deseleciona(posDeseleciona);
}
function carrinho(){
    index.style.display = 'none';
    carros.style.display = "none";
    enderecos.style.display = "none";
    carrinhoDeCompra.style.display = 'block';
    cancelFinaliza();
    mostraConfirma();
    mostraVoltar();
}
function servicos(){
    index.style.display = "block";
    carrinhoDeCompra.style.display = "none";
    carros.style.display = "none";
    enderecos.style.display = "none";
    
    if(itensAdicionados.length > 0){
        finaliza();
        escondeConfirma();
    }
    escondeVoltar();
}
function finaliza(){
    if(itensAdicionados.length > 0){        
        finalizaCompra.style.display = "block";   
    }
}
function cancelFinaliza(){
    finalizaCompra.style.display = "none";    
}
function mostraConfirma(){
    if(itensAdicionados.length > 0){
        confirmaPedido.style.display = "block";        
    }
}
function escondeConfirma(){
    confirmaPedido.style.display = "none";
}
function mostraVoltar(){
    let voltar = document.getElementById("voltar");
    voltar.style.display = "block";
}
function escondeVoltar(){
    let voltar = document.getElementById("voltar");
    voltar.style.display = "none";
}
function valorTotal(){
    let valor = 0;
    let valorAdicional = 0;
    let valorTotalAdicional = 0;
    let i = 0;
    while(i<itensAdicionados.length){
        console.log(valor);
        valor += parseInt(itensAdicionados[i]['preco']) + 0.90;
        i++;
    }
    $("#adicionais").on("change", function(){
        valorAdicional = $(this).val();
        //alert(valores.length*9.9);
        valorTotalAdicional = parseInt(valorAdicional.length) * 9.9;    
        valor += valorTotalAdicional;
        valorEstimado.innerHTML = valor.toFixed(2);
        return false;
    });

    valorEstimado.innerHTML = valor.toFixed(2) ;
}

function precoOfer(){
    let visivelIndex = $('#index').is(":visible");
    let preco = document.getElementById("precoOferecido");
    if(visivelIndex){
        preco.style.display = "block";
    }else{
        preco.style.display = "none";
    }
}
window.setInterval(precoOfer, 400);

function meusCarros(){
    index.style.display = 'none';
    carrinhoDeCompra.style.display = 'none';
    enderecos.style.display = "none";
    carros.style.display = "block";
}
function meusEnderecos(){
    index.style.display = 'none';
    carrinhoDeCompra.style.display = 'none';
    carros.style.display = "none";
    enderecos.style.display = "block";
}