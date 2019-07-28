<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/pixter/_app/Library/PHPMailer/class.phpmailer.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/pixter/_app/config.inc.php');

/**
* Send Email class
*/
class Email
{
	public $Template;
	public $Subject = '';
	public $FromName = '';
	public $Address = array();
	public $Bcc = array();

	function loadTemplate($filepath) {
		$this->Template = file_get_contents($filepath);
	}
	function replace($replaces) {
		foreach ($replaces as $key => $value) {
			$this->Template = str_replace("#$key#", $value, $this->Template);
		}
	}

	function sendMailer() {
		$Mail = new PHPMailer();
		$Mail->CharSet = "utf-8";
		$Mail->IsHTML(true);
		$Mail->IsSMTP();
		$Mail->SMTPAuth 	= true;
		$Mail->Port 		= MAILPORT;
		$Mail->Host 		= MAILHOST;
		$Mail->Username 	= MAILUSER;
		$Mail->Password 	= MAILPASS;
		$Mail->From 		= MAILUSER;
		$Mail->FromName 	= utf8_decode($this->FromName);
		$Mail->Subject 		= $this->Subject;
		foreach ($this->Address as $to) {
			$Mail->AddAddress($to);
		}
		if(isset($this->Bcc)){
			foreach ($this->Bcc as $toBcc) {
				$Mail->AddBCC($toBcc);
			}
		}
		$Mail->MsgHTML($this->Template);

		if(!$Mail->Send()) {
			return "Erro: " . $Mail->ErrorInfo;
		} else {
			return true;
		}
	}
}