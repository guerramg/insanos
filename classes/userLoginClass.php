<?php

class User{

    public function login($email, $pass){

        include 'conexao.php';

        $queryEmail = $conector -> prepare("SELECT * FROM usuarios WHERE email= :email AND status='0' AND grau IN(0,1,2,3)");
        $queryEmail -> execute(array('email' => $email));
        $dadosEmail = $queryEmail->fetch(PDO::FETCH_ASSOC);

        if($email != $dadosEmail['email'] or $dadosEmail['email'] == ''){

            header('Location: login.php?erro=1');

        }
        else{

            if($pass != $dadosEmail['senha'] or $dadosEmail['senha'] == ''){

                header('Location: login.php?erro=2');

            }
            else{

                session_start();

                $_SESSION['acesso'] = $dadosEmail['acesso'];
                $_SESSION['usuario'] = $dadosEmail['id'];
                $_SESSION['email'] = $dadosEmail['email'];
                $_SESSION['senha'] = $dadosEmail['senha'];

                header('Location: dashboard');

            }

        }


    }

    public function policia($login, $pass){
        if(!isset($_SESSION['email']) or !isset($_SESSION['senha'])){

            header('Location: login.php?erro=0');
        }

            include 'conexao.php';

            $queryEmail = $conector -> prepare("SELECT * FROM usuarios WHERE email= :email AND status='0' AND grau IN(0,1,2,3)");
            $queryEmail -> execute(array('email' => $_SESSION['email']));
            $dadosEmail = $queryEmail->fetch(PDO::FETCH_ASSOC);

            if($_SESSION['email'] != $dadosEmail['email']){

                header('Location: login.php?erro=1');
    
            }
            else{

                if($_SESSION['senha'] != $dadosEmail['senha']){

                    header('Location: login.php?erro=2');


                }
                else{

                    //header('Location: index.php');

                }

            }

    }

    public function usuarioLogado($id){

        include 'conexao.php';

        try{

            $queryUsuario = $conector -> prepare("SELECT * FROM usuarios WHERE id='$id'");
            $queryUsuario->execute();
            $dadosUsuario = $queryUsuario -> fetch(PDO::FETCH_ASSOC);

            return $dadosUsuario;

        }catch(PDOException $erro){

            print 'erro '.$erro->getMessage();
        }

    }

    public function meusDados($idUsuario, $senhaUsuario, $novaSenha, $email){

        include 'conexao.php';

        if($novaSenha == ''){
            $senhaAtual = $senhaUsuario;
        }
        else{
            $senhaAtual = md5($novaSenha);
        }

        try{

            $queryMeusDados = $conector -> prepare("UPDATE usuarios SET email='$email', senha='$senhaAtual' WHERE id='$idUsuario'");
            $queryMeusDados->execute();

            print "<script>alert('Dados atualizados com sucesso')</script>";
            print "<script>location=('meusDados')</script>";  


        }catch(PDOException $erro){

            print 'erro '.$erro->getMessage();
        }

    }

    //GERAR NOVA SENHA (RELEMBRAR)
    public function novaSenha($email){
        
        include 'conexao.php';

        try{
            $queryEmail = $conector -> prepare("SELECT email FROM usuarios WHERE email='$email'");
            $queryEmail -> execute();
            $totalRegistros = $queryEmail ->rowCount();

                if($totalRegistros == 0){
                    header('Location: login.php?erro=10');
                }
                else{
                        $CaracteresAceitos = 'abcdefghijklmnopqrstuvxzwykABCDEFGHIJKLMNOPQRSTUVXZYWK'; 
                        $max = strlen($CaracteresAceitos)-1;
                        $password = null;
                        for($i=0; $i < 4; $i++) { 
                        $password .= $CaracteresAceitos{mt_rand(0, $max)}; 

                        }
                        $CaracteresAceitos2 = '0123456789'; 
                        $max2 = strlen($CaracteresAceitos2)-1;
                        $password2 = null;
                        for($i=0; $i < 4; $i++) { 
                        $password2 .= $CaracteresAceitos2{mt_rand(0, $max2)}; 

                        }  

                        $senha	=	$password.$password2;
                        $novaSenha = md5($senha);

                        //ENVIO DA SENHA PARA O EMAIL

                        $arquivo = "Esta é sua nova senha:\n".$senha."";

                        $emailenviar = "$email";
                        $destino = $emailenviar;
                        $assunto = "Nova senha gerada - Insanos MC Regional BH";


                        $headers = "MIME-Version: 1.1";
                        $headers .= "Content-type: text/HTML; charset=utf-8";
                        $headers .= "from: regionalbh.insanosmc@gmail.com";
                        $headers .= "Return-Path: regionalbh.insanosmc@gmail.com"; 
                        $headers .= "Reply-To: $email"; 

                        mail($destino, $assunto, $arquivo, $headers);

                        $querySenha = $conector -> prepare("UPDATE usuarios SET senha='$novaSenha' WHERE email='$email'");
                        $querySenha -> execute();

                        //RETORNA AO LOGIN INFORMANDO SUCESSO

                        header('Location: login.php?erro=11');

                    }

        }catch(PDOException $erro){
            print 'Erro: '. $erro -> getMessage();
        }
    }

}

?>