<?php 

require_once("vendor/autoload.php");

use \Slim\Slim;
use Codes\PageAdmin;
use Codes\Page;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {
	
	$page = new Page();

	$page->setTpl("index");

});

$app->get('/epipabaquigrafo', function() {
	
	$page = new PageAdmin();
	
	$page->setTpl("index");

});

$app->run();

 ?>