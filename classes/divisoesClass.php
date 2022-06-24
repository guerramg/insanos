<?php

class Divisoes
{
//INSERIR DIVISAO
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

//EDITA DIVISOES
    public function editar($id, $status, $divisao)
    {
        include 'conexao.php';


        $query = $conector->prepare("UPDATE divisoes SET status='$status', divisao='$divisao' WHERE id='$id'");
        
        try{

            $query -> execute();

            print "<script>alert('Editado com sucesso')</script>";
            print "<script>location=('divisoes')</script>";  
        }
        catch(PDOException $erro){
            print 'erro '.$erro->getMessage();
        }
    }

//CONTAGEM DE MEMBROS
         public function contaMembros($id){
     
          include 'conexao.php';
      
          $query = $conector->prepare("SELECT id, status, divisao FROM usuarios WHERE status != '1' AND divisao=$id");
     
          try{
              $query->execute();
     
              return $dados = $query->rowCount();       
              
          }
          catch(PDOException $erro)
          {
          print 'erro '.$erro->getMessage();
          }
        }

//SOCIAL RESPONSAVEL
public function social($id){
     
    include 'conexao.php';

    $query = $conector->prepare("SELECT id, status, divisao, path FROM usuarios WHERE status != '1' AND divisao=$id AND acesso='1'");

    try{
        $query->execute();

        $dadosSocial = $query->fetch(PDO::FETCH_ASSOC);   
        
        return $dadosSocial['path'];    
        
    }
    catch(PDOException $erro)
    {
    print 'erro '.$erro->getMessage();
    }
  }

//LISTA DAS DIVISOES
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

                                            <td>'

                                            .conversorDatas::dataBrasil($dados -> data).

                                            '</td>

                                            <td>
                                                <span class="'.$classe.'">'.$status.'</span>
                                            </td>

                                            <td class="desc">'.$dados -> divisao.'</td>

                                            <td>'

                                            .$this -> social($dados -> id).

                                            '</td>

                                            <td>'

                                            .$this -> contaMembros($dados -> id).
                                            
                                            '</td>

                                            <td>
                                                <div class="table-data-feature">

                                <button id="botaoEditar" class="item" data-placement="top" title="Editar" data-toggle="modal" data-target="#formEditarDivisao" onclick=edicao("'.$dados -> status.'-'.$dados -> id.'-'.$dados -> divisao.'")>
                                    <i class="zmdi zmdi-edit"></i>
                                </button>

                                <button class="item" data-toggle="modal" data-target="#formExcluirDivisao" data-placement="top" title="Excluir" name="botao" value="excluir" onclick=exclusao("'.$dados -> id.'-'.$dados -> divisao.'")>
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

//EXCLUIR DIVISÕES
    public function excluir($id)
    {
        include 'conexao.php';


        $query = $conector->prepare("DELETE FROM divisoes WHERE id='$id'");
        
        try{

            $query -> execute();

            print "<script>alert('Excluído com sucesso')</script>";
            print "<script>location=('divisoes')</script>";  
        }
        catch(PDOException $erro){
            print 'erro '.$erro->getMessage();
        }
    }

//SELECT DAS DIVISOES
    public function selectDivisoes()
   
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