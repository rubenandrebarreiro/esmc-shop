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
	<body>
		<?php
			$id_artigo=$_GET["id_artigo"];
			$lig=mysql_connect("localhost","root","") or die("Erro na conex�o");
			mysql_select_db("esmc_shop",$lig) or die("Erro na escolha da Base de Dados (ESMC Shop)");
			$query2 = "SELECT * from artigos, utilizadores, categorias where artigos.id_artigo='$id_artigo' and artigos.nome_utilizador=utilizadores.nome_utilizador and categorias.id_categoria=artigos.id_categoria";
			$res2=mysql_query($query2);
			$num_rows2 = mysql_num_rows($res2);
		?>
		<div id="outer">
			<div id="header">
				<div id="logo">
					<a href="index.php"><img src="images/logo.png" alt="ESMC Shop"></a>
				</div>
				<div id="nav">
					<ul>
						<li class="first">
							<a href="index.php">In&iacutecio</a>
						</li>
						<li>
							<a href="pesquisa_avancada_artigos.html">Pesquisa Avan&ccedilada</a>
						</li>
						<li>
							<a href="sobre_nos.html">Sobre N&oacutes</a>
						</li>
						<li class="last">
							<a href="contactos.html">Contactos e Links</a>
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
							<form name="pesquisa_rapida" method="POST" action="resultados_pesquisa_rapida.php">
								<input type="text" maxlength="100" size="" class="inputBox_search" name="pesquisa_rapida_artigo_texto">
								&nbsp;
								<select name="pesquisa_rapida_categorias_escolha" class="inputBox_search" id="select_category">
									<option value="none" selected="selected">Todas as Categorias</option>
									<option value="Animais">Animais</option>
									<option value="Antiguidades">Antiguidades</option>
									<option value="Calcado">Cal&ccedilado</option>
									<option value="Computadores e Materiais Informaticos">Computadores e Materiais Inform&aacuteticos</option>
									<option value="Consolas e Jogos">Consolas e Jogos</option>
									<option value="Fotografia e Video">Fotografia e V&iacutedeo</option>
									<option value="Livros de Literatura">Livros de Literatura</option>
									<option value="Livros Escolares">Livros Escolares</option>
									<option value="Musica">M&uacutesica</option>
									<option value="Produtos Artisticos">Produtos Art&iacutesticos</option>
									<option value="Telemoveis">Telem&oacuteveis</option>
									<option value="Vestuario">Vestu&aacuterio</option>
								</select>
								&nbsp;
								<input name="Submit" type="submit" value="Pesquisar" class="inputButton_search">
							</form>
							<br>
						</div>
					</div>
					<div id="box4">
						<h3>Detalhes do Artigo</h3>
						<ul class="sectionList">
							<?php
								$hora_actual_hh=date("H");
								$hora_actual_mm=date("i");
								$hora_actual_ss=date("s");
								$hora_actual_comp=$hora_actual_hh . $hora_actual_mm . $hora_actual_ss;
								$data_actual_dd=date("d");
								$data_actual_mm=date("m");
								$data_actual_aaaa=date("Y");
								$data_actual_comp=$data_actual_aaaa . $data_actual_mm . $data_actual_dd;
								$data_hora_actual_comp=$data_actual_comp . $hora_actual_comp;
								$row2 = mysql_fetch_array ($res2);
								$hora_limite = explode (':', $row2["hora_limite"]);
								$hora_limite_hh =$hora_limite[0];
								$hora_limite_mm =$hora_limite[1];
								$hora_limite_ss =$hora_limite[2];
								$data_limite = explode ('-', $row2["data_limite"]);
								$data_limite_dd =$data_limite[2];
								$data_limite_mm =$data_limite[1];
								$data_limite_aaaa =$data_limite[0];
								$hora_limite_comp=$hora_limite_hh . $hora_limite_mm . $hora_limite_ss;
								$data_limite_comp=$data_limite_aaaa . $data_limite_mm . $data_limite_dd;									
								$data_hora_limite_comp=$data_limite_comp . $hora_limite_comp;
								echo "<li>";
									echo "<h4>" . $row2['nome_artigo'] . "</h4>";
									echo "<img class='left' src='./imgs_leilao/" . $row2['foto_artigo'] . "' width='75' height='75'>";
									echo "<b>Descri&ccedil;&atilde;o do Artigo:</b>&nbsp;<i>" . $row2['descricao_artigo'] . "</i>";
									echo "<br>";
									echo "<b>Condi&ccedil;&atilde;o do Artigo:</b>&nbsp;" . $row2['condicao_artigo'];
									echo "<br>";
									$licitacao_base = explode ('.', $row2["licitacao_base"]);
									$licitacao_base_ee = $licitacao_base[0];
									$licitacao_base_cc = $licitacao_base[1];
									$query3 = "SELECT * from licitacoes where id_artigo='" . $row2["id_artigo"] . "' and licitacoes.valor_licitacao=(select max(valor_licitacao) from licitacoes where id_artigo='" . $row2["id_artigo"] . "')";
									$res3=mysql_query($query3);
									$num_rows3 = mysql_num_rows($res3);
									$query4 = "SELECT avg(classificacao_artigo) as media_avaliacoes from avaliacoes where id_artigo='" . $row2["id_artigo"] . "'";
									$res4=mysql_query($query4);
									$num_rows4 = mysql_num_rows($res4);
									$preco_final = explode ('.', $row2["preco_final"]);
									$preco_final_ee = $preco_final[0];
									$preco_final_cc = $preco_final[1];
									$custos_envio = explode ('.', $row2["custos_envio"]);
									$custos_envio_ee = $custos_envio[0];
									$custos_envio_cc = $custos_envio[1];
									echo "<b>Hora Limite do Leil&atilde;o:</b>&nbsp;" . $hora_limite_hh . ":" . $hora_limite_mm;
									echo "<br>";
									echo "<b>Data Limite do Leil&atilde;o:</b>&nbsp;" . $data_limite_dd . "/" . $data_limite_mm . "/" . $data_limite_aaaa;
									echo "<br>";
									if (mysql_num_rows($res3) != 0)
									{
										$row3 = mysql_fetch_array ($res3);
										$licitacao_actual = explode ('.', $row3["valor_licitacao"]);
										$licitacao_actual_ee = $licitacao_actual[0];
										$licitacao_actual_cc = $licitacao_actual[1];
										echo "<b>Licita&ccedil;&atilde;o Actual:</b>&nbsp;" . $licitacao_actual_ee . "," . $licitacao_actual_cc . "&euro;";
									}
									if (mysql_num_rows($res3) == 0)
									{
										echo "<b>Licita&ccedil;&atilde;o Base:</b>&nbsp;" . $licitacao_base_ee . "," . $licitacao_base_cc . "&euro;";
									}
									echo "<br>";
									echo "<b>Pre&ccedil;o Final:</b>&nbsp;" . $preco_final_ee . "," . $preco_final_cc . "&euro;";
									echo "<br>";
									echo "<b>Custos de Envio:</b>&nbsp;" . $custos_envio_ee . "," . $custos_envio_cc . "&euro;";
									echo "<br>";
									echo "<b>Forma de Pagamento:</b>&nbsp;" . $row2['forma_pagamento'];
									echo "<br>";
									if (mysql_num_rows($res4) == 1)
									{
										$row4 = mysql_fetch_array($res4);
										$media_avaliacoes=number_format($row4['media_avaliacoes'], 1, '.', '');
										if ($media_avaliacoes == 0.0)
										{
											echo "<b>M&eacute;dia de Avalia&ccedil;&otilde;es:</b>&nbsp;Este artigo ainda n&atilde;o foi avaliado";
										}
										if ($media_avaliacoes != 0.0)
										{
											echo "<b>M&eacute;dia de Avalia&ccedil;&otilde;es:</b>&nbsp;" . $media_avaliacoes;
										}
									}
									echo "<br>";
									if ($row2['nome_categoria'] == 'Animais')
									{
										echo "<b>Categoria:</b>&nbsp;Animais";
									}
									if ($row2['nome_categoria'] == 'Antiguidades')
									{
										echo "<b>Categoria:</b>&nbsp;Antiguidades";
									}
									if ($row2['nome_categoria'] == 'Calcado')
									{
										echo "<b>Categoria:</b>&nbsp;Cal&ccedil;ado";
									}
									if ($row2['nome_categoria'] == 'Computadores e Materiais Informaticos')
									{
										echo "<b>Categoria:</b>&nbsp;Computadores e Materiais Inform&aacute;aticos";
									}
									if ($row2['nome_categoria'] == 'Consolas e Jogos')
									{
										echo "<b>Categoria:</b>&nbsp;Consolas e Jogos";
									}
									if ($row2['nome_categoria'] == 'Fotografia e Video')
									{
										echo "<b>Categoria:</b>&nbsp;Fotografia e V&iacute;deo";
									}
									if ($row2['nome_categoria'] == 'Livros de Literatura')
									{
										echo "<b>Categoria:</b>&nbsp;Livros de Literatura";
									}
									if ($row2['nome_categoria'] == 'Livros Escolares')
									{
										echo "<b>Categoria:</b>&nbsp;Livros Escolares";
									}
									if ($row2['nome_categoria'] == 'Musica')
									{
										echo "<b>Categoria:</b>&nbsp;M&uacute;sica";
									}
									if ($row2['nome_categoria'] == 'Produtos Artisticos')
									{
										echo "<b>Categoria:</b>&nbsp;Produtos Art&iacute;sticos";
									}
									if ($row2['nome_categoria'] == 'Telemoveis')
									{
										echo "<b>Categoria:</b>&nbsp;Telem&oacute;veis";
									}
									if ($row2['nome_categoria'] == 'Vestuario')
									{
										echo "<b>Categoria:</b>&nbsp;Vestu&aacute;rio";
									}
									echo "<br>";
									echo "<b>Nome de Utilizador:</b>&nbsp;" . $row2['nome_utilizador'];
									echo "<br>";
									echo "<br>";
									if ($data_hora_limite_comp > $data_hora_actual_comp)
									{	
										echo "<font id='sugestoes'><b>Este leil&atilde;o ainda est&aacute; a decorrer</b></font>";
										echo "<br>";
										echo "<br>";
										echo "<a href='historico_licitacoes_artigo.php?id_artigo=" . $row2['id_artigo'] . "'>&raquo;&nbsp;Ver o hist&oacute;rico de licita&ccedil;&otilde;es por este artigo</a>";
									}
									else
									{
										echo "<font id='sugestoes'><b>Este leil&atilde;o j&aacute; terminou</b></font>";
										echo "<br>";
										echo "<br>";
										echo "<a href='historico_licitacoes_artigo.php?id_artigo=" . $row2['id_artigo'] . "'>&raquo;&nbsp;Ver o hist&oacute;rico de licita&ccedil;&otilde;es por este artigo</a>";
									}
								echo "</li>";
							?>
						</ul>
					</div>
				</div>
				<div id="sidebar">
					<h3>Inicie Sess&atildeo</h3>
					<div class="form">
						<form name="inicio_sessao" method="post" action="processar_login.php" id="login">
						<p>
							<label for="nome_utilizador" class="login">Nome de Utilizador</label> <input type="text" name="nome_utilizador" id="nome_utilizador" value="Nome de Utilizador" class="inputBox">
						</p>
						<p>
							<label for="password" class="login">Palavra-Passe</label> <input type="password" name="password" id="password" value="Palavra-Passe" class="inputBox">
						</p>
						<p>
							<input type="submit" name="login" value="Entrar" class="inputButton">
						</p>
						<br>
						<br>
						<br>
						<br>
						<p>
							<a href="registo.html">Ainda n&atildeo est&aacute registado? Registe-se!</a>
						</p>
						</form>
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