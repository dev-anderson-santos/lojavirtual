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

// Lista os usuários cadastrados
$app->get("/epipabaquigrafo/users", function() {

	User::login_verify();

	$users = User::listAll();

	$page = new PageAdmin();

	$page->setTpl("users", [
		"users" => $users
	]);

});

$app->get("/epipabaquigrafo/users-create", function() {

	User::login_verify();

	$page = new PageAdmin();

	$page->setTpl("users-create");

});

$app->get("/epipabaquigrafo/users/:iduser/delete", function($iduser) {

	User::login_verify();
});

$app->get("/epipabaquigrafo/:iduser", function($iduser) {

	User::login_verify();

	$page = new PageAdmin();

	$page->setTpl("users-update");

});

$app->post("/admin/users/create", function() {

	User::login_verify();
});

$app->post("/admin/users/:iduser", function($iduser) {

	User::login_verify();
});




$app->run();

 ?>