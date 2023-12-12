<?php
class EmailConfig {
	
	public $provider = 'Standard';
	// public $provider = 'Google';
	// public $provider = 'AmazonSES';

	public $client = [	'standard' => [
										'host' => 'jagowebdev.com'
										, 'username' => 'test@jagowebdev.com'
										, 'password' => 'Password'
									]
						,'google' => ['client_id' => ''
										, 'client_secret' => ''
										, 'refresh_token' => ''
									]
						, 'ses' => ['username' => ''
										, 'password' => ''
									]
					];
	
	// Disesuaikan dengan konfigurasi username
	public $from = 'test@jagowebdev.com';
}