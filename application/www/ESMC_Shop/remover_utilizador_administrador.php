<html>
	<head>
		<title>ESMC Shop - Aqui s&oacute n&atildeo encontra o que n&atildeo quer!</title>
	</head>
	<body>
		<?php
			if (!isset($_SESSION))
			{
				Session_start();
				$nome_utilizador=$_GET["nome_utilizador"];
				$lig=mysql_connect("localhost","root","") or die ("Erro na conex�o");
				mysql_select_db("esmc_shop",$lig) or die ("Erro na escolha da Base de Dados (ESMC Shop)");
				$query1="delete from utilizadores where nome_utilizador='$nome_utilizador'";
				$res1=mysql_query($query1);
				$query2="delete from artigos where nome_utilizador='$nome_utilizador'";
				$res2=mysql_query($query2);
				$query3="delete from licitacoes where nome_utilizador='$nome_utilizador'";
				$res3=mysql_query($query3);
				$query4="delete from avaliacoes where nome_utilizador='$nome_utilizador'";
				$res4=mysql_query($query4);
				include("main_remover_utilizador_administrador.php");
			}
			else
			{
				$nome_utilizador=$_GET["nome_utilizador"];
				$lig=mysql_connect("localhost","root","") or die ("Erro na conex�o");
				mysql_select_db("esmc_shop",$lig) or die ("Erro na escolha da Base de Dados (ESMC Shop)");
				$query1="delete from utilizadores where nome_utilizador='$nome_utilizador'";
				$res1=mysql_query($query1);
				$query2="delete from artigos where nome_utilizador='$nome_utilizador'";
				$res2=mysql_query($query2);
				$query3="delete from licitacoes where nome_utilizador='$nome_utilizador'";
				$res3=mysql_query($query3);
				$query4="delete from avaliacoes where nome_utilizador='$nome_utilizador'";
				$res4=mysql_query($query4);
				include("main_remover_utilizador_administrador.php");
			}
		?>
	</body>
</html>