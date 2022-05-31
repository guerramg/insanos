<?php

class Usuarios {


    public function inserir($status,$divisao,$path,$email,$grau)

    {
        print $status.$divisao.$path.$email.$grau;
    }

    public function listaSelect()
   
   {
        include 'conexao.php';

        $query = $conector->prepare("SELECT * FROM divisoes WHERE status != '1' ORDER BY divisao ASC");

        try{
            $query->execute();

            while($dados = $query->fetch(PDO::FETCH_OBJ))
            
            {

                print_r('
                        <option value="'.$dados->id.'">

                        '.$dados->divisao.'

                        </option>
                    ');
            }
        }
        catch(PDOException $erro)
        {
        print 'erro '.$erro->getMessage();
        }
    }
}

?>