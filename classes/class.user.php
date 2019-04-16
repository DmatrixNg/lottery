<?php

include('class.password.php');

class User extends Password{

    private $db;

	function __construct($db){
		parent::__construct();

		$this->_db = $db;
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}
  public function is_admin(){
		if(isset($_SESSION['privilages']) && $_SESSION['privilages'] == 1){
			return true;
		}
	}

	private function get_user_hash($email, $password){

		try {

			$stmt = $this->_db->prepare('SELECT * FROM clients WHERE email = :email and password = :pass');
			$stmt->execute(array(':email' => $email, ':pass' => $password));

			return $stmt->fetch();

		} catch(PDOException $e) {
		    echo '<p class="error">'.$e->getMessage().'</p>';
		}
	}


	public function login($email,$password){

		$user = $this->get_user_hash($email, $password);

        $_SESSION['id'] = $user['id'];
        $_SESSION['status'] = $user['app_status'];

        return true;


	}


	public function logout(){

		session_destroy();
    // We also unset the cookie
    if( isset($_COOKIE['culconnect']) )
    {
        setcookie('lottery', '', time() - 3600, '/', '', false, true);
    }
	}

}


?>
