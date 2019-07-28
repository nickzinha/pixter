<?php

ini_set('allow_url_fopen', '1'); // ou assim

date_default_timezone_set('America/Sao_Paulo');
require('environment.php');

if ( ENVIRONMENT == 'development' ):
	// CONFIGRAÇÕES DO BANCO ####################
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASS', '');
	define('DBSA', 'pixter');

	// DEFINE A BASE DO SITE ####################
	define('URL_BASE', 'http://localhost:8080/pixter');
else:
	// CONFIGRAÇÕES DO BANCO ####################
	define('HOST', 'localhost');
	define('USER', 'pixter');
	define('PASS', 'pixter!1234');
	define('DBSA', 'pixter');

	// DEFINE A BASE DO SITE ####################
	define('URL_BASE', 'http://pixter.teste.com.br');
endif;

// DEFINE SERVIDOR DE E-MAIL ################
define('MAILUSER', 'nicollydoo@gmail.com');
define('MAILPASS', 'senha');
define('MAILPORT', 993);
define('MAILHOST', 'imap.gmail.com');


// DEFINE IDENTIDADE DO SITE ################
define('SITENAME', 'Pixter');
define('SITEDESC', '');
define('SITEKEYS', '');

define('DS', DIRECTORY_SEPARATOR);

// AUTO LOAD DE CLASSES ####################
function __autoload($Class) {
	$cDir = array('Conn', 'Helpers', 'Models');
	$iDir = null;

	foreach ($cDir as $dirName):
		if (!$iDir && file_exists(dirname(__FILE__) . DS . $dirName . DS . $Class . '.class.php') && !is_dir(dirname(__FILE__) . DS . $dirName . DS . $Class . '.class.php')):
			include_once (dirname(__FILE__) . DS . $dirName . DS . $Class . '.class.php');
			$iDir = true;
		endif;
	endforeach;

	if (!$iDir):
		PHPErro("Não foi possível incluir {$Class}.class.php", DANGER);
		die;
	endif;
}

// TRATAMENTO DE ERROS #####################
//CSS constantes :: Mensagens de Erro
define('SUCCESS', 'success');
define('INFO', 'info');
define('WARNING', 'warning');
define('DANGER', 'danger');

//Alerta :: Exibe erros lançados :: Front
function Alerta($ErrMsg, $ErrNo, $ErrDie = null) {

	$msg =  "<div class=\"alert alert-{$ErrNo} alert-dismissible text-left\" role=\"alert\">";
    $msg .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
    $msg .= "{$ErrMsg}";
	$msg .= "</div>";

	if ($ErrDie):
		die;
	endif;

	echo $msg;
}

//PHPErro :: personaliza o gatilho do PHP
function PHPErro($ErrNo, $ErrMsg, $ErrFile, $ErrLine) {
	echo "<div class=\"alert alert-{$ErrNo} alert-dismissible text-left\" role=\"alert\">";
		echo "<strong>Erro na Linha: #{$ErrLine} ::</strong> {$ErrMsg}.<br />";
		echo "<small>{$ErrFile}</small>";
	echo "</div>";

	if ($ErrNo == E_USER_ERROR):
		die;
	endif;
}

set_error_handler('PHPErro');