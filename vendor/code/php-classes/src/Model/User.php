<?php 

namespace Codes\Model;

use \Codes\DB\Sql;
use \Codes\Model;

class User extends Model {

	const SESSION = "User";

	public static function login($login, $password) {

		$sql = new Sql();

		$result = $sql->select("SELECT * FROM tb_users WHERE deslogin = :LOGIN", [
			":LOGIN" => $login
		]);

		if(count($result) === 0) {
			throw new \Exception("Usuário inexistente ou senha inválida");			
		}

		$data = $result[0];

		if(password_verify($password, $data["despassword"])) {
			
			$user = new User();
			$user->setData($data);

			$_SESSION[User::SESSION] = $user->getValues();

			return $user;

		} else {
			throw new \Exception("Usuário inexistente ou senha inválida");			
		}
	}

	public static function login_verify($in_admin = true) {

		if(
			!isset($_SESSION[User::SESSION]) 
			||
			!$_SESSION[User::SESSION] 
			||
			!(int)$_SESSION[User::SESSION]["iduser"] > 0 
			||
			(bool)$_SESSION[User::SESSION]["inadmin"] !== $in_admin
		) {
			header("Location: /epipabaquigrafo/login");
			exit;
		}
	}

	public static function logout() {

		$_SESSION[User::SESSION] = NULL;
	}

	public static function listAll() {

		$sql = new Sql();

		$result = $sql->select("SELECT * FROM tb_users u 
								INNER JOIN tb_persons p
								USING(idperson)
								ORDER BY p.desperson");
		return $result;
	}
	
}

