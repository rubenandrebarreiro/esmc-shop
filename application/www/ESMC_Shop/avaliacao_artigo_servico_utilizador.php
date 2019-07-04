<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta name="description" content="ESMC Shop">
		<meta name="keywords" content="ESMC Shop">
		<title>ESMC Shop - Aqui s&oacute n&atildeo encontra o que n&atildeo quer!</title>
		<link href="http://fonts.googleapis.com/css?family=Coda+Caption" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Jura" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<script language="javascript">
		function test_avaliacao_artigo_servico()
		{
			if (avaliacao_artigo_servico.avaliacao_artigo.selectedIndex == 0)
			{
				alert ("Tem que seleccionar uma AVALIACAO PARA O ARTIGO");
				return false;
			}
			if (avaliacao_artigo_servico.avaliacao_servico.selectedIndex == 0)
			{
				alert ("Tem que seleccionar uma AVALIACAO DO SERVI�O");
				return false;
			}
			return true;
		}
	</script>
	<body>
		<?php
			if (!isset($_SESSION))
			{
				Session_start();
			}
			$lig=mysql_connect("localhost","root","") or die("Erro na conex�o");
			mysql_select_db("esmc_shop",$lig) or die("Erro na escolha da Base de Dados (ESMC Shop)");
			$query1 = "SELECT * from utilizadores where nome_utilizador='" . $_SESSION["nome_utilizador"] . "'";
			$res1=mysql_query($query1);
			$row1 = mysql_fetch_array($res1);
			$id_artigo = $id_artigo_avaliacao;
		?>
		<div id="outer">
			<div id="header">
				<div id="logo">
					<a href="index_utilizador.php"><img src="images/logo.png" alt="ESMC Shop"></a>
				</div>
				<div id="nav">
					<ul>
						<li class="first">
							<a href="index_utilizador.php">In&iacutecio</a>
						</li>
						<li>
							<a href="pesquisa_avancada_artigos_utilizador.php">Pesquisa Avan&ccedilada</a>
						</li>
						<li>
							<a href="sobre_nos_utilizador.php">Sobre N&oacutes</a>
						</li>
						<li class="last">
							<a href="contactos_utilizador.php">Contactos e Links</a>
						</li>
					</ul>
				</div>
			</div>
			<div id="banner">
				<img src="images/pic01.jpg" width="1180" height="305" alt="Escola Secund&aacuteria do Monte da Caparica">
			</div>
			<div id="main">
				<div id="content">
					<div id="box1">
						<div class="blogpost primary_wide2">
							<h2>Pesquisa R&aacute;pida</h2>
							<form name="pesquisa_rapida" method="POST" action="resultados_pesquisa_rapida_utilizador.php">
								<input type="text" maxlength="100" size="" class="inputBox_search" name="pesquisa_rapida_artigo_texto">
								&nbsp;
								<select name="pesquisa_rapida_categorias_escolha" class="inputBox_search" id="select_category">
									<option value="none" selected="selected">Todas as Categorias</option>
									<option value="Animais">Animais</option>
									<option value="Antiguidades">Antiguidades</option>
									<option value="Calcado">Cal&ccedil;ado</option>
									<option value="Computadores e Materiais Informaticos">Computadores e Materiais Inform&aacute;ticos</option>
									<option value="Consolas e Jogos">Consolas e Jogos</option>
									<option value="Fotografia e Video">Fotografia e V&iacute;deo</option>
									<option value="Livros de Literatura">Livros de Literatura</option>
									<option value="Livros Escolares">Livros Escolares</option>
									<option value="Musica">M&uacute;sica</option>
									<option value="Produtos Artisticos">Produtos Art&iacute;sticos</option>
									<option value="Telemoveis">Telem&oacute;veis</option>
									<option value="Vestuario">Vestu&aacute;rio</option>
								</select>
								<?php
									echo "<input type='hidden' name='nome_utilizador' value='" . $row1['nome_utilizador'] . "'>";
								?>
								&nbsp;
								<input name="Submit" type="submit" value="Pesquisar" class="inputButton_search">
							</form>
							<br>
						</div>
					</div>
					<div id="box4">
						<h3>Acabou de fazer uma licita&ccedil;&atilde;o</h3>
						<ul class="sectionList">
							<li>
								Agora que acabou de fazer uma licita&ccedil;&atilde;o pode avaliar o artigo e o nosso servi&ccedil;o.
								<br>
								<br>
								<form name='avaliacao_artigo_servico' method='post' action='processar_avaliacao_artigo_servico_utilizador.php' onSubmit='return test_avaliacao_artigo_servico();'>
									<?php
									echo "<input type='hidden' class='inputBox2' name='id_artigo' value='" . $id_artigo . "'>";
									?>
									<p>
										<label for="avaliacao_artigo" class="signup">Avalia&ccedil;&atilde;o do Artigo</label>
										<select name="avaliacao_artigo" class="inputBox2">
											<option value="none">Escolha uma Avalia&ccedil;&atilde;o</option>
											<option value="01">1</option>
											<option value="02">2</option>
											<option value="03">3</option>
											<option value="04">4</option>
											<option value="05">5</option>
										</select>
									</p>
									<p>
										<label for="avaliacao_servico" class="signup">Avalia&ccedil;&atilde;o do Servi&ccedil;o</label>
										<select name="avaliacao_servico" class="inputBox2">
											<option value="none">Escolha uma Avalia&ccedil;&atilde;o</option>
											<option value="01">1</option>
											<option value="02">2</option>
											<option value="03">3</option>
											<option value="04">4</option>
											<option value="05">5</option>
										</select>
									</p>
									<br>
									<input name='Submit' type='submit' value='Fazer Avalia&ccedil;&atilde;o' class='inputButton3'>
									&nbsp;&nbsp;&nbsp;&nbsp;
									<input name='Reset' type='reset' value='Limpar' class='inputButton3'>
								</form>
                       	    </li>
						</ul>
					</div>
				</div>
				<div id="sidebar">
					<?php
					echo "<h3>Bem-vindo, <i>" . $_SESSION["nome_utilizador"] . "</i></h3>";
					echo "<h3> O meu menu </h3>";
					?>
					<div class="form">
						<?php
							echo "<p>";
							echo "<li type=square><a href='registo_artigos_utilizador.php'>Adicionar artigos</a></li>";
							echo "</p>";
							echo "<p>";
							echo "<li type=square><a href='consultar_artigos_utilizador.php?nome_utilizador=" . $row1['nome_utilizador'] . "'>Consultar os meus artigos</a></li>";
							echo "</p>";
							echo "<p>";
							echo "<li type=square><a href='pesquisa_avancada_artigos_utilizador.php'>Pesquisa Avan&ccedil;ada de Artigos</a></li>";
							echo "</p>";
							echo "<p>";
							echo "<li type=square><a href='actualiza_registo_utilizador.php?nome_utilizador=" . $row1['nome_utilizador'] . "'>Alterar os meus dados</a></li>";
							echo "</p>";
							echo "<p>";
							echo "<li type=square><a href='cancelar_conta.php'>Cancelar conta</a></li>";
							echo "</p>";
							echo "<p>";
							echo "<li type=square><a href='processar_logout.php'>Sair</a></li>";
							echo "</p>";
						?>
					</div>
				</div>
				<br class="clear">
			</div>
		</div>
		<div id="copyright">
			ESMC Shop by <i>R&uacuteben Barreiro</i> for <a href="http://www.esec-monte-caparica.com/esec/">Escola Secund&aacuteria do Monte de Caparica</a>
		</div>	
</body>
</html>
