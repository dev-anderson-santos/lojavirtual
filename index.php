<?php 

session_start();

require_once("vendor/autoload.php");

use \Slim\Slim;
use Codes\Page;
use Codes\PageAdmin;
use Codes\Model\User;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {
	
	$page = new Page();

	$page->setTpl("index");

});

$app->get('/epipabaquigrafo', function() {
	
	User::login_verify();

	$page = new PageAdmin();
	
	$page->setTpl("index");

});

$app->get('/epipabaquigrafo/login', function() {
	
	$page = new PageAdmin([
		"header" => false,
		"footer" => false
	]);
	
	$page->setTpl("login");

});

// O método post envia os dados informados no 
// formulário para a função login da classe User
// e depois redireciona para a página principal 
// de administração
$app->post('/admin/login', function() {
	
	User::login($_POST["login"], $_POST["password"]);

	header("Location: /epipabaquigrafo");
	exit;

});

$app->get("/epipabaquigrafo/logout", function() {

	User::logout();

	header("Location: /epipabaquigrafo/login");
	exit;
});

$app->run();

 ?>