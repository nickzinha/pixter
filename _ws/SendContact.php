<?php
require('../_app/config.inc.php');

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($data)):
    $Nome 		= (string) strip_tags(trim($data['nome']));
    $Email 		= (string) strip_tags(trim($data['email']));
    $Mensagem 	= (string) strip_tags(trim($data['mensagem']));

    if (!$Nome):
        Alerta('<b>Erro</b> Informe o seu nome.', DANGER);
    elseif (!Check::Email($Email)):
        Alerta('<b>Erro</b> Informe um e-mail válido.', DANGER);
    elseif (!$Mensagem):
        Alerta('<b>Erro</b> Informe sua mensagem.', DANGER);

    else:
        $pessoa = new Create();
        $contactArr = array("nome" => $Nome,
            "email" => $Email,
            "mensagem" => $Mensagem);

        $pessoa->ExeCreate('newsletter', $contactArr);

        $SendEmail = new Email;
        $SendEmail->loadTemplate(URL_BASE."/_app/Models/templates/newsletter.html");
        $SendEmail->replace(array(
            'urlbase' => URL_BASE,
            'nome' => $Nome,
            'email' => $Email,
            'mensagem' => $Mensagem
        ));
        $SendEmail->Subject = utf8_decode("Contato enviado pelo site");
        $SendEmail->FromName = "{$Nome}";
        $SendEmail->Address = array("nicollydoo@gmail.com");

        if( !$SendEmail->sendMailer() ):
            Alerta( $SendEmail->sendMailer(), DANGER);
        else:
            Alerta('<b>Sucesso</b> seus dados foram enviado com sucesso.', SUCCESS);
        endif;
    endif;
else:
    Alerta("<b>Erro</b> Não foi feito o Post dos dados.", DANGER);
endif;