<?php
require('../_app/config.inc.php');

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($data)):
    $Email 		= (string) strip_tags(trim($data['email']));

    if  (!Check::Email($Email)):
        Alerta('<b>Erro</b> Informe um e-mail válido.', DANGER);

    else:
        $pessoa = new Create();
        $contactArr = array(
            "email" => $Email);

        $pessoa->ExeCreate('email', $contactArr);

        $SendEmail = new Email;
        $SendEmail->replace(array(
            'urlbase' => URL_BASE,
            'email' => $Email
        ));
        $SendEmail->Subject = utf8_decode("E-mail enviado pelo site");
        $SendEmail->FromName = "{$Email}";
        $SendEmail->Address = array("nicollydoo@gmail.com");

        if( !$SendEmail->sendMailer() ):
            Alerta( $SendEmail->sendMailer(), DANGER);
        else:
            Alerta('<b>Sucesso</b> seus dados foram enviado com sucesso.', SUCCESS);
            header('Location: ../index.php');
        endif;
    endif;
else:
    Alerta("<b>Erro</b> Não foi feito o Post dos dados.", DANGER);
endif;