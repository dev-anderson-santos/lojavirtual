<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Dó Ré Mi artigos musicais" />
<meta name="description" content="Site de compra de artigos musicias" />
<title>Dó Ré Mi - Artigos musicais</title>

<link rel="stylesheet" type="text/css" href="/res/site/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/res/site/css/site.css">

</head>

<body>
<div id="pagina">
  <div id="topo">
  	<h1 class="logo">
    	<img src="/res/site/img/logo4.png" title="Dó Ré Mi" alt="Dó Ré Mi" width="300" height="200"/>
    </h1>
  	<div class="contaPedidos">
    	<a href="#">Minha conta | </a> 
    	<a href="#">Meus Pedidos | </a> 
    	<a href="#">Meu carrinho (0)</a>

      <div id="login">
      	<form method="post" action="">
	        <h3>Efetue o seu login</h3>
	        <label for="usuario">Usuário</label>
	        <input type="text" name="usuario" align="left" width="30" height="10"  />
	        <br />
	        <label for="senha">Senha</label>
	        <input type="password" name="senha" align="left" width="30" height="10"  />
	        <div class="botao">
	            <input type="submit" value="Acessar">
	        </div><!-- fim do botao -->          
   		</form>
        <a href="/res/site/cadastro.html" title="Cadastre-se"> Cadastre-se</a>
      </div><!-- fim do login -->

    </div><!-- fim do contaPedidos -->
  </div><!-- fim do menu -->
  
  <div id="menu">
  	<img src="/res/site/img/lupa.png" title="Buscar" alt="Buscar" />
    <input type="text" placeholder="Buscar por" />
    
  </div><!-- fim do menu -->