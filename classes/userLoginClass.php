<?php

class User{

    public function login($email, $pass){

        include 'conexao.php';

        $queryEmail = $conector -> prepare("SELECT * FROM usuarios WHERE email= :email");
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

                $_SESSION['usuario'] = $dadosEmail['id'];
                $_SESSION['email'] = $dadosEmail['email'];
                $_SESSION['senha'] = $dadosEmail['senha'];

                header('Location: dashboard');

            }

        }


    }

    public function policia($login, $pass){
        if(!isset($_SESSION['email']) or !isset($_SESSION['senha'])){

           //falta verificar se as sessoes abertas existem no bd.
            header('Location: login.php?erro=0');

        }
    }

}

?>