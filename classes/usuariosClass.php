<?php

class Usuarios extends conversorDatas{

    // INSERIR DADOS DO USUARIO

    public function inserir($acesso, $divisao, $path , $email, $grau)

    {
        include 'conexao.php';

        $query = $conector -> prepare("INSERT INTO usuarios (data, acesso, status, divisao, path, email, grau, senha) VALUES (NOW(), :acesso, :status, :divisao, :path, :email, :grau, :senha)");

        try{

            $senha = md5('123456');
            $query->bindValue(':acesso', $acesso);
            $query->bindValue(':status', '0');
            $query->bindValue(':divisao', $divisao);
            $query->bindValue(':path', $path);
            $query->bindValue(':email', $email);
            $query->bindValue(':grau', $grau);
            $query->bindValue(':senha', $senha);

            $query -> execute();

            print "<script>alert('inserido com sucesso')</script>";
            print "<script>location=('usuarios')</script>";  
        }
        catch(PDOException $erro){
            print 'erro '.$erro->getMessage();
        }
    }

    //LISTAR DADOS DOS USUARIOS
    
    public function listaUsuarios()
    {
        include 'conexao.php';    

        $query = $conector->prepare("SELECT * FROM usuarios ORDER BY path, status ASC");

        try{

            $query->execute();

            while($dados = $query -> fetch(PDO::FETCH_OBJ)){

                //DADOS DA DIVISAO

                $divisao = $dados -> divisao;
                $queryDivisao = $conector -> prepare("SELECT id, divisao FROM divisoes WHERE id='$divisao'");
                $queryDivisao -> execute();
                $dadosDivisao = $queryDivisao -> fetch(PDO::FETCH_OBJ); 


                if($dados -> status == 0){
                    $status = 'Ativo';
                    $classe = 'status--process';
                }
                else{
                    $status = 'Inativo';
                    $classe = 'status--denied';
                }

                //SWITH DE GRAUS
                switch($dados -> grau){
                    case 0;
                    $grau = 'Diretor';
                    break;
                    case 1;
                    $grau = 'Sub Diretor';
                    break;
                    case 2;
                    $grau = 'Social';
                    break;
                    case 3;
                    $grau = 'ADM';
                    break;
                    case 10;
                    $grau = 'Sargento';
                    break;
                    case 11;
                    $grau = 'Full';
                    break;
                    case 12;
                    $grau = 'Meio';
                    break;
                    case 13;
                    $grau = 'PP';
                    break;

                }

                switch ($dados -> acesso){
                    case 0;
                    $acesso = 'ADM';
                    break;
                    case 1;
                    $acesso = 'Social';
                    break;
                    case 2;
                    $acesso = 'Integrante';
                    break;
                }

                //$conversorData = new conversorDatas;

                print_r('
                                        <tr class="tr-shadow">

                                            <td>'.conversorDatas::dataBrasil($dados -> data).'</td>

                                            <td>
                                                <span class="'.$classe.'">'.$status.'</span>
                                            </td>

                                            <td class="desc">'.$dadosDivisao -> divisao.'</td>

                                            <td>'.$dados -> path.'</td>

                                            <td>'.$dados -> email.'</td>

                                            <td>'.$grau.'</td>

                                            <td>
                                                <div class="table-data-feature">

                                <button id="botaoEditar" class="item" data-placement="top" title="Editar" data-toggle="modal" data-target="#formEditarUsuarios" onclick="edicao(`'.$dados -> status.'-'.$dados -> id.'-'.$dados -> path.'-'.$grau.'-'.$acesso.'-'.$dados -> email.'-'.$dadosDivisao -> divisao.'`)">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>

                                <button class="item" data-placement="top" title="Deletar" data-toggle="modal" data-target="#formExcluirUsuarios" onclick="exclusao(`'.$dados -> id.'-'.$dados -> path.'`)">
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

    // EDITAR DADOS DOS USUARIOS
    public function editar($acesso, $path , $email, $grau, $id, $status){
        
        include 'conexao.php';

        // TESTES
        if($grau == ''){
            $paramGrau = '';
        }else{
            $paramGrau = ", grau = '$grau'";
        }

        if($acesso == ''){
            $paramAcesso = '';
        }else{
            $paramAcesso = "acesso = '$acesso',";
        }

        try{
            $queryUsuario = $conector -> prepare("UPDATE usuarios SET $paramAcesso status='$status', path='$path', email='$email' $paramGrau WHERE id='$id'");
            $queryUsuario -> execute();

            print "<script>alert('Atualizado com sucesso')</script>";
            print "<script>location=('usuarios')</script>";  


        }catch(PDOException $erro){
            print 'Error: '.$erro -> getMessage();
        }
    }

//EXCLUIR USUARIO
public function excluir($id)
{
    include 'conexao.php';


    $query = $conector->prepare("DELETE FROM usuarios WHERE id='$id'");
    
    try{

        $query -> execute();

        print "<script>alert('Excluído com sucesso')</script>";
        print "<script>location=('usuarios')</script>";  
    }
    catch(PDOException $erro){
        print 'erro '.$erro->getMessage();
    }
}

    //SELECT DE USUARIOS
    public function selectUsuarios($divisao)
   
   {
    include 'conexao.php';

        try{
            $query = $conector->prepare("SELECT * FROM usuarios WHERE status != '1' AND divisao='$divisao' ORDER BY path ASC");
            $query->execute();

            while($dados = $query->fetch(PDO::FETCH_OBJ))
            
            {

                print_r('
                        <option value="'.$dados->id.'">

                        '.$dados->path.'

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