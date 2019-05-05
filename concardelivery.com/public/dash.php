<!DOCTYPE html>
<?php
session_start();
if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['email']);
  	unset($_SESSION['senha']);
  	unset($_SESSION['nome']);
	header('location:index.html');
}

$logado = $_SESSION['email'];
?>

	<html>

	<head>
		<meta charset="UTF-8">
		<!--Logo Página-->
		<link rel="shortcut icon" href="img/logoConcar2.png" />
		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
		<link rel="stylesheet" href="css/animate.min.css">
		<link rel="stylesheet" href="css/dash.min.css">
		<link rel="stylesheet" href="css/relogio.min.css">
		<!-- <link rel="stylesheet" href="https://cdn.rawgit.com/chingyawhao/materialize-clockpicker/master/dist/css/materialize.clockpicker.css" >  -->
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>
			<?php echo $_SESSION['nome'] ?> - Concar Delivery - Serviços Automotivos</title>
		<meta name="author" content="Eduardo Ribeiro and Vitor Ribeiro">
		<meta name="keywords" content="Concar, Concar Delivery, serviços automotivos, lavagem de carros, Concar Uberlândia, Concar Uberaba">
		<meta content="Serviços Automotivos para o dia a dia de seu carro, sem você sair de casa ou trabalho." name="description">
	</head>

	<body>
		<nav>
			<div class="nav-wrapper black" style="background: url('./img/back02.jpg')">
				<!--background03.jpg -->
				<a href="dash.php" class="brand-logo" id="nomeEmpresa">Concar</a>
				<a href="dash.php" class="brand-logo hide-on-med-and-down"><img src="img/logoConcar.png" alt="Logo da empresa Concar" id="logoEmpresa"></a>

				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li><a href="#">Status do pedido</a></li>
					<li><a href="#" onclick="servicos();">Serviços</a></li>
					<li><a href="#"><i class="large material-icons" onclick="carrinho()">add_shopping_cart</i></a></li>
				</ul>
				<!-- <span class="margin-top: -4rem; color: red;">4</span> -->
			</div>
		</nav>
		<ul id="slide-out" class="side-nav">
			<li>
				<div class="userView" style="background-color: rgba(0,0,0,0.1)">
					<div class="background">
						<img src="img/back02.jpg" style="width: 100%; height: 100%;">
					</div>
					<a href="#!user"><img class="circle" src="img/cliente.png" style="background-color: rgba(255, 255,255, .7)"></a>
					<a href="#!name"><span class="white-text name"><?php echo $_SESSION['nome']?></span></a>
					<a href="#!email"><span class="white-text email"><?php echo $_SESSION['email']?></span></a>
				</div>
			</li>
			<li>
				<a href="#!" onclick="servicos();" id="servicosMenu">
					<i class="material-icons">local_car_wash</i> Serviços
				</a>
			</li>
			<li><a href="#!" onclick="meusEnderecos(); mostraVoltar()" id="meusEnderecos"><i class="material-icons">assignment_ind</i>Meus Endereços</a></li>
			<li><a href="#!" onclick="meusCarros(); mostraVoltar()" id="meusVeiculos"><i class="material-icons">time_to_leave</i>Meus Veículos</a></li>
			<li><a href="#!" onclick="carrinho()" id="meusPedidos"><i class="material-icons">add_shopping_cart</i>Meus pedidos</a></li>
		</ul>
		<!--Botao Menu do computador  -->
		<div class="fixed-action-btn horizontal button-collapse click-to-toggle">
			<a href="#" data-activates="slide-out" class="button-collapse hide-on-med-and-down btn-large blue lighten-3 btn-floating">
				<i class="material-icons">menu</i>
			</a>
		</div>
		<!-- Botão mobile-->
		<a href="#" data-activates="slide-out" class="button-collapse right hide-on-large-only"><i class="material-icons" style="font-size: 3rem; color: white; float: right; position: absolute; top: .5rem; right: .5rem;">menu</i></a>
		<!--Voltar para serviços -->
		<a href="#" class="hide-on-large-only" id="voltar" onclick="servicos()"><i class="material-icons" style="color: white; float:left; position: absolute; top: .5rem; left:.5rem; font-size: 3rem;">chevron_left</i></a>
		<!--Import jQuery before materialize.js-->

		<section id="index">
			<div class="container">
				<div class="row" id="cartoes">
					<!--Preloader-->
					<div id="preloader">
						<div class="preloader-wrapper big active">
							<div class="spinner-layer spinner-blue">
								<div class="circle-clipper left">
									<div class="circle"></div>
								</div>
								<div class="gap-patch">
									<div class="circle"></div>
								</div>
								<div class="circle-clipper right">
									<div class="circle"></div>
								</div>
							</div>

							<div class="spinner-layer spinner-red">
								<div class="circle-clipper left">
									<div class="circle"></div>
								</div>
								<div class="gap-patch">
									<div class="circle"></div>
								</div>
								<div class="circle-clipper right">
									<div class="circle"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Carrinho de serviços-->
		<section id="carrinhoDeCompra" style="display: none;">
			<div class="container">
				<div class="row" id="conteudoCarrinho">
					<h3 style="text-align: center; margin-top: 20%; margin-bottom: 25%;" class="animated rubberBand">Nenhum item adicionado ao carrinho ainda :(</h3>
				</div>
			</div>
		</section>
		<section id="carros" style="display: none; margin-bottom: 20rem;">
			<div class="container">
				<div class="row">
					<ul class="collapsible" data-collapsible="accordion">
						<li>
							<div class="collapsible-header active"><i class="material-icons">filter_drama</i>Meus Carros</div>
							<div class="collapsible-body">
								<span>
                <table class="highlight" style="margin-top: -1rem; margin-bottom: -1rem">
                  <thead>
                    <tr>
                        <th>Nome do Carro</th>
                        <th>Modelo</th>
                        <th>Cor</th>
                        <th>Placa</th>
                        <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Meu Carro</td>
                      <td>Gol</td>
                      <td>Preto</td>
                      <td>PLE 9289</td>
                      <td><i class="material-icons">create</i></td>
                    </tr>
                    <tr>
                      <td>Carro da Patroa</td>
                      <td>Civic</td>
                      <td>Prata</td>
                      <td>GFS 2845</td>
                      <td><i class="material-icons">create</i></td>
                    </tr>
                    <tr>
                      <td>Carro do Filhão</td>
                      <td>Fusca</td>
                      <td>Azul</td>
                      <td>SFR 9210</td>
                      <td><i class="material-icons">create</i></td>
                    </tr>
                  </tbody>
                </table> 
              </span>
							</div>
						</li>
						<li>
							<div class="collapsible-header"><i class="material-icons">place</i>Cadastrar Novo Carro</div>
							<div class="collapsible-body">
								<span>
                <div class="row">
                  <form class="col s12">
                    <div class="row">
                      <div class="input-field col s12 m6">
                        <input id="nomeCarro" type="text" class="validate">
                        <label for="nomeCarro">Nome do Carro</label>
                      </div>
                      <div class="input-field col s12 m6">
                        <input id="modelo" type="text" class="validate">
                        <label for="modelo">Modelo</label>
                      </div>
                      <div class="input-field col s12 m4">
                        <input id="cor" type="text" class="validate">
                        <label for="cor">Cor</label>
                      </div>
                      <div class="input-field col s12 m4">
						  <select id="tipo">
							<option value="" disabled selected>Tipo do Carro</option>
							<option value="1">Hatch</option>
							<option value="2">Sedan</option>
							<option value="3">SUV</option>
							<option value="4">Esportivo</option>
							<option value="5">Picape</option>
							<option value="6">Van</option>
							<option value="7">Outro</option>
						  </select>
						  <label>Tipo do Carro</label>
					  </div>
                      <div class="input-field col s12 m4">
                        <input id="placa" type="text" class="validate">
                        <label for="placa">Placa</label>
                      </div>
                      <button class="btn btn-flat waves-effect waves-light col s6 btn-large">Cancelar</button>
                      <button class="btn blue waves-effect waves-light col s6 btn-large "  >Salvar</button>
                    </div>
                  </form>
                </div>
              </span>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</section>
		<section id="enderecos" style="display: none; margin-bottom: 20rem;">
			<div class="container">
				<div class="row">
					<ul class="collapsible" data-collapsible="accordion">
						<li>
							<div class="collapsible-header active"><i class="material-icons">filter_drama</i>Meus Endereços</div>
							<div class="collapsible-body">
								<span>
                <table class="highlight" style="margin-top: -1rem; margin-bottom: -1rem">
                  <thead>
                    <tr>
                        <th>Nome do Endereço</th>
                        <th>Rua</th>
                        <th>Nº</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>UF</th>
                        <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Minha Casa</td>
                      <td>Coronel Antonio Alves Pereira</td>
                      <td>1690</td>
                      <td>Belo Horizonte</td>
                      <td>Uberlândia</td>
                      <td>MG</td>
                      <td><i class="material-icons">create</i></td>
                    </tr>
                    <tr>
                      <td>Minha Casa</td>
                      <td>Coronel Antonio Alves Pereira</td>
                      <td>1690</td>
                      <td>Belo Horizonte</td>
                      <td>Uberlândia</td>
                      <td>MG</td>
                      <td><i class="material-icons">create</i></td>
                    </tr>
                    <tr>
                      <td>Minha Casa</td>
                      <td>Coronel Antonio Alves Pereira</td>
                      <td>1690</td>
                      <td>Belo Horizonte</td>
                      <td>Uberlândia</td>
                      <td>MG</td>
                      <td><i class="material-icons">create</i></td>
                    </tr>
                  </tbody>
                </table> 
              </span>
							</div>
						</li>
						<li>
							<div class="collapsible-header"><i class="material-icons">place</i>Cadastrar Novo Endereço</div>
							<div class="collapsible-body">
								<span>
                <div class="row">
                  <form class="col s12">
                    <div class="row">
                      <div class="input-field col s12 m6">
                        <input id="nomeEndereco" type="text" class="validate">
                        <label for="nomeEndereco">Nome do Endereço</label>
                      </div>
                      <div class="input-field col s12 m6">
                        <input id="rua" type="text" class="validate">
                        <label for="rua">Rua</label>
                      </div>
                      <div class="input-field col s12 m6">
                        <input id="numeroEnd" type="text" class="validate">
                        <label for="numeroEnd">Número</label>
                      </div>
                      <div class="input-field col s12 m6">
                        <input id="bairro" type="text" class="validate">
                        <label for="bairro">Bairro</label>
                      </div>
                      <div class="input-field col s12 m6">
                        <input id="cidade" type="text" class="validate">
                        <label for="cidade">Cidade</label>
                      </div>
                      <div class="input-field col s12 m6">
                        <input id="uf" type="text" class="validate">
                        <label for="uf">UF</label>
                      </div>
                      <button class="btn btn-flat waves-effect waves-light col s6 btn-large">Cancelar</button>
                      <button class="btn blue waves-effect waves-light col s6 btn-large "  >Salvar</button>
                    </div>
                  </form>
                </div>
              </span>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</section>
		<!-- Modal Structure -->
		<div id="modalConfirma" class="modal container">
			<div class="modal-content row">
				<span class="grey-text text-darken-4 center modal-action modal-close" style="position: absolute;top: 1rem; right: 1rem;"><span></span><i class="material-icons right">close</i></span>
				<h4 class="center align-center">Seu pedido está quase concluído!</h4>
				<br>
				<form action="#" method="post">
					<div class="input-field col s12 m4 offset-m2">
						<select multiple>
            <option value="" disabled selected>Escolha o Carro</option>
            <option value="1">Meu Carro</option>
            <option value="2">Carro da Patroa</option>
            <option value="3">Carro do Filhão</option>
          </select>
						<label>Meus Carros</label>
					</div>
					<div class="input-field col s12 m4">
						<select>
            <option value="" disabled selected>Escolha o Local</option>
            <option value="1">Minha Casa</option>
            <option value="2">Trabalho</option>
            <option value="3">Faculdade</option>
          </select>
						<label>Meus Locais</label>
					</div>
					<div class="input-field col s12 m4 offset-m2">
						<select multiple id="adicionais">
            <option value="" disabled selected>Selecione os Adicionais</option>
            <option value="1">Hidratação de Couro</option>
            <option value="2">Cristalização da Pintura</option>
            <option value="3">Proteção da Pintura</option>
            <option value="4">Hidratação Painel Plástico</option>
            <option value="5">Limpeza de Teto</option>
            <option value="6">Enceramento Profissional</option>
          </select>
						<label>Qualquer adicional R$ 9,90</label>
					</div>
					<!-- Seleciona a data -->
					<input type="text" class="datepicker col s12 m4" style="margin-top: 1rem;" placeholder="Selecione o dia" />
					<div class="row">
						<div class="input-field col s12 m4">
							<!-- Seleciona o horário -->
							<input id="timepicker_ampm_dark" class="timepicker" type="text" placeholder="Selecione o horário" style="margin-top: -1rem;" />
						</div>
					</div>
					<div class="container">
						<div class "row">
							<!-- <h5 class="left col s12 m8">Tempo estimado de serviço:  <span id="tempoEstimado"></span></h5> -->
							<h5 class="center col s12 m8 offset-m2">Total: R$ <span id="valorEstimado"></span> </h5>
						</div>
					</div>
				</form>
				<!-- Falta inserir o Horário  -->
				<p></p>
			</div>
			<div class="modal-footer" style="margin-top: -3rem;">
				<div class="container">
					<div class="row">
						<!-- adicionais(); -->
						<div class="col s12 m6 offset-m3">
							<a href="#!" onclick=" Materialize.toast('Pedido Realizado com Sucesso!', 4000)" class="btn-large center modal-action modal-close waves-effect waves-blue btn-flat blue" style="color: white; width: 100%; margin-bottom: 4rem;">Concluir</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="center" id="finalizaCompra">
			<button class="waves-effect waves-light  blue darken-4 btnFinaliza" onclick="carrinho();">
      FINALIZAR PEDIDO
    </button>
		</div>

		<div class="center" id="confirmaPedido">
			<button class="waves-effect waves-light btn blue darken-4 btnConfirma modal-trigger pulse" onclick="valorTotal()" href="#modalConfirma"> 
      <!-- onclick="Materialize.toast('Pedido Realizado com Sucesso!', 4000)" -->
      Confirmar Pedido
    </button>
		</div>
		<div id="rodape">
			<h5 class="center grey-text text-darken-2" id="precoOferecido">*Preço oferecido para carros modelo hatch</h5>
			<footer class="page-footer blue lighten-2">
				<div class="container">
					<div class="row">
						<div class="col l6 s12">
							<h5 class="white-text center">
								Estamos presentes em Uberlândia e Uberaba
							</h5>
							<h6 class="white-text center" style="font-size: 1.2rem;">
								Atendimento 24 horas
							</h6>
						</div>
						<div class="col l4 offset-l2 s12">
							<h5 class="white-text center">Entre em contato</h5>
							<p class="grey-text text-lighten-4 center" style="margin-top: -7px;">
								<button class="btnWhats btnFooter">
                      <a href="https://api.whatsapp.com/send?phone=5534997721545&text=Quero%20lavar%20meu%20carro" target="_blanck">
                          <i class="fa fa-whatsapp fa-2x " aria-hidden="true" style="color: white;"></i>
                      </a>
                  </button>
								<button class="btnFace btnFooter">
                      <a href="https://www.facebook.com/concardelivery/" target="_blanck">
                          <i class="fa fa-facebook-official fa-2x " aria-hidden="true" style="color: white;"></i> 
                      </a>
                  </button>
								<br/>
								<span style="font-size: 1.5rem; margin-top: 7px;" class="center">       (34) 99772-1545
                  </span>
							</p>
						</div>
					</div>
				</div>
				<div class="footer-copyright blue lighten-1">
					<div class="container center">
						© 2017 Concar
					</div>
				</div>
			</footer>
		</div>

		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript">
			$(".button-collapse").sideNav(); //Mostra menu lateral
			$("#servicosMenu").on("click", function() { //Esconde menu lateral ao clickar em serviços 
				$("#servicosMenu").sideNav("hide");
			});
			$("#meusPedidos").on("click", function() { //Esconde menu lateral ao clickar em meus pedidos
				$("#meusPedidos").sideNav("hide");
			});
			$("#meusVeiculos").on("click", function() {
				$("#meusVeiculos").sideNav("hide");
			});
			$("#meusEnderecos").on("click", function() {
				$("#meusEnderecos").sideNav("hide");
			});
			$(document).ready(function() {
				// the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
				$('.modal').modal();
			});

			$("#continuarComprando").on("click", function() {
				Materialize.toast('Serviço adicionado ao carrinho com sucesso!', 4000)
			});
			$(document).ready(function() { //Campo para selecionar varios valores
				$('select').material_select();
			});
			$('.datepicker').pickadate({ //Para o cliente selecionar o dia do pedido
				selectMonths: true, // Creates a dropdown to control month
				selectYears: 2, // Creates a dropdown of 15 years to control year,
				today: 'Hoje',
				clear: 'Limpar',
				close: 'OK',
				closeOnSelect: false // Close upon selecting a date,
			});
			//Time Picker:
			//var timepicker = $( ".timepicker" ).pickatime().set('select',2);

			var timepicker = $(".timepicker").pickatime({ //Relogio
				default: 'now', // Set default time: 'now', '1:30AM', '16:30'
				fromnow: 0, // set default time to * milliseconds from now (using with default = 'now')
				twelvehour: false, // Use AM/PM or 24-hour format
				donetext: 'OK', // text for done-button
				cleartext: 'Limpar', // text for clear-button
				canceltext: 'Voltar', // Text for cancel-button
				autoclose: false, // automatic close timepicker
				ampmclickable: true, // make AM PM clickable
				aftershow: function() {} //Function for after opening timepicker
			});

		</script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
		<script src="js/scriptDash.js"></script>
	</body>

	</html>
