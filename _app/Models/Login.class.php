<?php

/**
 * Login.class [ MODEL ]
 * Responável por autenticar, validar, e checar usuário do sistema de login!
 *
 * @copyright (c) 2014, Robson V. Leite UPINSIDE TECNOLOGIA
 */
class Login {

    private $Level;
    private $Email;
    private $Senha;
    private $Error;
    private $Result;

    /**
     * <b>Informar Level:</b> Informe o nível de acesso mínimo para a área a ser protegida.
     * @param INT $Level = Nível mínimo para acesso
     */
    function __construct($Level = null) {
        $this->Level = (int) $Level;
    }

    /**
     * <b>Efetuar Login:</b> Envelope um array atribuitivo com índices STRING user [email], STRING pass.
     * Ao passar este array na ExeLogin() os dados são verificados e o login é feito!
     * @param ARRAY $UserData = user [email], pass
     */
    public function ExeLogin(array $UserData) {
        $this->Email = (string) strip_tags(trim($UserData['strEmailLogin']));
        $this->Senha = (string) strip_tags(trim($UserData['strSenhaLogin']));
        $this->setLogin();
    }

    /**
     * <b>Verificar Login:</b> Executando um getResult é possível verificar se foi ou não efetuado
     * o acesso com os dados.
     * @return BOOL $Var = true para login e false para erro
     */
    public function getResult() {
        return $this->Result;
    }

    /**
     * <b>Obter Erro:</b> Retorna um array associativo com uma mensagem e um tipo de erro WS_.
     * @return ARRAY $Error = Array associatico com o erro
     */
    public function getError() {
        return $this->Error;
    }

    /**
     * <b>Checar Login:</b> Execute esse método para verificar a sessão USERLOGIN e revalidar o acesso
     * para proteger telas restritas.
     * @return BOLEAM $login = Retorna true ou mata a sessão e retorna false!
     */
    public function CheckLogin() {
        if (empty($_SESSION['userlogin']) || $_SESSION['userlogin']['user_level'] < $this->Level):
            unset($_SESSION['userlogin']);
            return false;
        else:
            return true;
        endif;
    }

    /*
     * ***************************************
     * **********  PRIVATE METHODS  **********
     * ***************************************
     */

    //Valida os dados e armazena os erros caso existam. Executa o login!
    private function setLogin() {
        if (!$this->Email || !$this->Senha):
            $this->Error = ['Informe seu e-mail e senha!', INFO];
            $this->Result = false;
        elseif (!Check::Email($this->Email)):
            $this->Error = ['E-mail inválido!', DANGER];
            $this->Result = false;
        elseif (!$this->getUser()):
            $this->Error = ['E-mail ou senha inválidos!', WARNING];
            $this->Result = false;
        else:
            $this->Execute();
        endif;
    }

    //Verifica usuário e senha no banco de dados!
    private function getUser() {
        // $this->Senha = md5($this->Senha);

        $read = new Read;
        $read->ExeRead("pessoa", "WHERE strEmailLogin = :e AND strSenhaLogin = :p", "e={$this->Email}&p={$this->Senha}");

        if ($read->getResult()):
            $this->Result = $read->getResult()[0];
            return true;
        else:
            return false;
        endif;
    }

    //Executa o login armazenando a sessão!
    private function Execute() {
        if (!session_id()):
            session_start();
        endif;

        $_SESSION['userlogin'] = $this->Result;

        $doacaoRead = new Read();
        $doacaoRead->FullRead('select * from vw_real_solidario_venda where intPessoa = :intPessoa', "intPessoa={$this->Result['id']}");

        if($doacaoRead->getRowCount() > 0){
            $doacoes = $doacaoRead->getResult();

            $_SESSION['doacoes'] = $doacoes;
        }


        $this->Error = ["Olá {$this->Result['strEmailLogin']}, seja bem vindo(a)!", SUCCESS];
        $this->Result = true;
    }

}
