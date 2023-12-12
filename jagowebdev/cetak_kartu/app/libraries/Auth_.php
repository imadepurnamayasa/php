<?php
class Auth 
{
	private $isloggedin = false;
	private $form_token = '';
	
	public function __construct() {
		// $this->checkLogin();
	}
	
	public function checkLogin() 
	{
		global $db;
		
		if (@$_SESSION['logged_in']) 
		{ 
			$this->isloggedin = true;
		} else {
			$cookie_login = @$_COOKIE['remember'];
			if ($cookie_login) 
			{
				list($selector, $cookie_token) = explode(':', $_COOKIE['remember']);
				$sql = 'SELECT * FROM user_token WHERE selector = ?';
				$data = $db->query($sql, $selector)->getRowArray();
				if ($this->validateToken($cookie_token, @$data['token'])) {
				
					if ($data['expires'] > date('Y-m-d H:i:s')) 
					{
						$user_detail = $db->query('SELECT * FROM user 
												WHERE id_user = ?', $data['id_user']
											)->row();

						$_SESSION ['user'] = $user_detail;
						$_SESSION['logged_in'] = true;
						
						$this->isloggedin = true;
						
					}
				}
		
				/* list($selector, $cookie_token) = explode(':', $cookie_login);
				helper('login');
				$data = db_check_cookie($selector);
				if ($data && $data[0]['expires'] >= date('Y-m-d H:i:s')) {
					if (!$this->validate_token_form($cookie_token, $data[0]['token'] )) {
						$result = db_check_user($data->email);
						$_SESSION = array_merge($_SESSION, $result);
						$_SESSION['logged_in'] = true;
						
						$this->isloggedin = true;
					}
				} */
			}
		}
	}
	
	public function isLoggedIn() 
	{
		return $this->isloggedin;
	}

	public function generateToken($n) 
	{
		// PHP 7
		if (function_exists('random_bytes')) {
			return random_bytes($n);
		
		// Fallback to PHP 5
		} else {
			require_once BASEPATH . "app/libraries/vendors/paragonie/random-compat/lib/random.php";
			try {
				$string = random_bytes($n);
			} catch (TypeError $e) {
				// Well, it's an integer, so this IS unexpected.
				// die("An unexpected error has occurred"); 
				$string = null;
			} catch (Error $e) {
				// This is also unexpected because 32 is a reasonable integer.
				// die("An unexpected error has occurred");
				$string = null;
			} catch (Exception $e) {
				// If you get this message, the CSPRNG failed hard.
				// die("Could not generate a random string. Is our OS secure?");
				$string = null;
			}
			return $string;
		}
	}

	public function generateSelector($n) {
		return $this->generateToken($n);
	}

	public function generateFormToken() 
	{
		$random_bytes = $this->generateToken(33);
		$this->form_token = bin2hex($random_bytes);
		
		/* echo $_SESSION['form_token'];
		echo '<br/>';
		echo $form_token;
		echo '<br/>';
		echo @hash('sha256', hex2bin($form_token)); */
		return $this->form_token;
	}
	
	public function generateSessionToken() {
		$_SESSION['form_token'] = hash('sha256', hex2bin($this->form_token));
	}

	public function generateDbToken() 
	{
		$random_bytes = $this->generateToken(33);
		$selector  = $this->generateSelector(9);
		
		$token['selector'] = bin2hex($selector);
		$token['external'] = bin2hex($random_bytes);
		$token['db'] =hash('sha256', $random_bytes);
		
		return $token;
	}

	public function validateFormToken($session_name = 'form_token', $post_name = 'form_token') {
		return $this->validateToken($_SESSION[$session_name], $_POST[$post_name]);
	}

	public function validateToken($provided_string, $hashed_token) 
	{
		$hash = @hash('sha256', hex2bin($provided_string));
		// echo $hashed_token;
		/* echo '<br/>';
		echo $provided_string; */
		// echo '<br/>';
		// echo $hash; 

		return hash_equals($hashed_token, $hash);
	}
}