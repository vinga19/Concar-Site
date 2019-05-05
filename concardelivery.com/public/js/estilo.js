var numInicial = 1;

//Muda imagem Página Principal
window.setInterval(function(){
    if (numInicial == 7) {
    	numInicial = 1;
    }
    var imagem = document.getElementById("jumbo");
    imagem.style.backgroundImage = "url('./img/prof0"+numInicial+".jpg')";
    numInicial++;
}, 2000);

let verificaCadastro = function(){
    let nome = document.getElementById("nomeCont");
    let email = document.getElementById("emailCont");
    let senha = document.getElementById("senhaCont");

    if(nome.value.length < 3){
        alert("Nome inválido!");
    }else if(email.value.length < 6){
        alert("Email inválido!");
    }else if(senha.value.length < 6){
        alert("Senha invalida!");
    }
}

$("#btnCadastro").click(function() { 
    console.log("Tentativa de cadastro!");
    
    //get input field values
    var user_name       = $('input[name=nomeCont]').val(); 
    var user_email      = $('input[name=emailCont]').val();
    var user_senha    = $('textarea[name=senhaCont]').val();
    
    //simple validation at client's end
    var proceed = true;
    if(user_name==""){ 
        proceed = false;
    }
    if(user_email==""){ 
        proceed = false;
    }
    if(user_senha=="") {  
        proceed = false;
    }

    //everything looks good! proceed...
    if(proceed) 
    {
        //data to be sent to server
        post_data = {'userName':user_name, 'userEmail':user_email, 'userSenha':user_senha};
        
        //Ajax post data to server
        $.post('../src/cadastro.php', post_data, function(response){  

            //load json data from server and output message     
            if(response.type == 'error')
            {
                console.log("Erro ao cadastrar " +response.text);
                output = '<div class="alert-danger">'+response.text+'</div>';
            }else{
                output = '<div class="alert-success">'+response.text+'</div>';
                
                //reset values in all input fields
                $('input').val(''); 
                $('textarea').val(''); 
            }
        }, 'json');
        
    }
});

