<?php

class Divisoes
{
    public function inserir($arrayDivisao)
    {
        include 'conexao.php';


        $query = $conector->prepare("INSERT INTO divisoes (data, status, divisao) VALUES (now(), :status, :divisao )");
        
        try{
            for($d=0; $d <= count($arrayDivisao); $d ++){

            $query->bindValue(':status', '0');
            $query->bindValue(':divisao', $arrayDivisao[$d]);

            $query -> execute();

            }
            print "<script>alert('inserido com sucesso')</script>";
            print "<script>location=('divisoes')</script>";  
        }
        catch(PDOException $erro){
            print 'erro '.$erro->getMessage();
        }
    }

    public function listaDivisoes()
    {
        include 'conexao.php';

        $query = $conector->prepare("SELECT * FROM divisoes ORDER BY divisao ASC");

        try{
            $query->execute();
            while($dados = $query->fetch(PDO::FETCH_OBJ)){

                if($dados -> status == 0){
                    $status = 'Ativa';
                    $classe = 'status--process';
                }
                else{
                    $status = 'Inativa';
                    $classe = 'status--denied';
                }

                print_r('
                                        <tr class="tr-shadow">

                                            <td>'.$dados -> data.'</td>

                                            <td>
                                                <span class="'.$classe.'">'.$status.'</span>
                                            </td>

                                            <td class="desc">'.$dados -> divisao.'</td>

                                            <td>'.$dados -> status.'</td>

                                            <td>'.$dados -> status.'</td>

                                            <td>
                                                <div class="table-data-feature">

                                <button id="botaoEditar" class="item" data-placement="top" title="Editar" data-toggle="modal" data-target="#formEditarDivisao" value="'.$dados -> id.'" onclick="edicao('.$dados -> id.')">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>

                                                    <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="Deletar">
                                                        <i class="zmdi zmdi-delete text-danger"></i>
                                                    </button>

                                                </div>
                                            </td>
                                        </tr>
                                    <tr class="spacer"></tr>
                    ');
            }
        }
        catch(PDOException $erro){
            print 'erro '.$erro->getMessage();
        }
    }
} 

?>