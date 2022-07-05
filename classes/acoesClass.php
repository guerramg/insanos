<?php


    class Acoes{

        // INSERIR AÇÕES
        public function inserir($divisao, $data, $acao, $responsavel){

            include 'conexao.php';

            try{

                $queryAcao = $conector -> prepare("INSERT INTO acoes (data, realizada, responsavel, divisao, acao) VALUES (now(), '$data', '$responsavel', '$divisao', '$acao')");
                $queryAcao -> execute();
                
                print "<script>alert('inserido com sucesso')</script>";
                print "<script>location=('dashboard')</script>";

            }catch(PDOException $erro){
                print 'Erro'. $erro->getMessage();
            }


        }

// EDITAR AÇÕES

        public function editarHistorico($id, $dados){

            include 'conexao.php';

            try{

                $queryEdita = $conector -> prepare("UPDATE historico SET dados='$dados' WHERE id='$id'");
                $queryEdita -> execute();
                
                print "<script>alert('Editado com sucesso')</script>";
                print "<script>location=('dashboard')</script>";

            }catch(PDOException $erro){
                print 'Erro'. $erro->getMessage();
            }


        }

// EXCLUIR AÇÕES
public function excluirAcao($id){
print $id;

    include 'conexao.php';

    $query = $conector -> prepare("DELETE FROM acoes WHERE id='$id'");

    try{

        $query -> execute();

    print "<script>alert('Excluido com sucesso')</script>";
    print "<script>location=('dashboard')</script>";

    }catch(PDOException $erro){
        print 'Erro '.$erro->getMessage();
    }
}

// LISTAR AÇÕES
public function listaAcoes($divisao)
    {
        include 'conexao.php';

        $query = $conector->prepare("SELECT * FROM acoes WHERE divisao='$divisao' ORDER BY realizada DESC");

        try{
            $query->execute();

            while($dados = $query->fetch(PDO::FETCH_OBJ)){

                $id = $dados -> id;

                $queryTotalParticipantes = $conector -> prepare("SELECT COUNT(*) as 'total' FROM participantes WHERE acao='$id'");
                $queryTotalParticipantes -> execute();
                $dadosTotalParticipantes = $queryTotalParticipantes->fetch(PDO::FETCH_ASSOC);

                $queryTotalHistorico = $conector -> prepare("SELECT COUNT(*) as 'total', id, dados FROM historico WHERE acao='$id'");
                $queryTotalHistorico -> execute();
                $dadosTotalHistorico = $queryTotalHistorico->fetch(PDO::FETCH_ASSOC);

                if($dadosTotalParticipantes["total"] < 1){
                    $botaoIncluirParticipante = '<button class="item" data-placement="top"
                    title="Incluir Participantes" data-toggle="modal"
                    data-target="#formParticipantes" name="botao" value="participantes" onclick="incluirParticipantes(`'.$dados -> id.'`)">
                    <i class="zmdi zmdi-accounts-add"></i>
                </button>';
                }

                if($dadosTotalParticipantes["total"] > 0){
                    $botaoIncluirParticipante = '';
                }
                
                if($dadosTotalHistorico["total"] == 0){
                    $botaoIncluirHistorico = '<button class="item" data-placement="top"
                    title="Histórico" data-toggle="modal"
                    data-target="#formHistorico" name="botao" value="historico" onclick="incluirHistorico(`'.$dados -> id.'`)">
                    <i class="zmdi zmdi-file-text"></i>
                </button>';
                }

                if($dadosTotalHistorico["total"] == 1){
                    $botaoIncluirHistorico = '<button class="item" data-placement="top"
                    title="Histórico" data-toggle="modal"
                    data-target="#formEditaHistorico" name="botao" value="historico" onclick="editarHistorico(`'.$dadosTotalHistorico['id'].'-'.$dadosTotalHistorico['dados'].'`)">
                    <i class="zmdi zmdi-file-text text-success"></i>
                </button>';
                }
                print_r('

                                        <tr class="tr-shadow">

                                            <td>'

                                            .conversorDatas::dataBrasil($dados -> realizada).

                                            '</td>

                                            <td class="desc">
                                                '.$dados -> acao.'
                                            </td>

                                            <td>'.$dadosTotalParticipantes["total"].'</td>

                                            <td>
                                            <div class="table-data-feature">

                                                '.$botaoIncluirParticipante.'

                                                '.$botaoIncluirHistorico.'

                                                <button class="item" data-toggle="modal" data-target="#formExcluirAcao" data-placement="top" title="Excluir" name="botao" value="excluir" onclick="exclusao(`'.$dados -> id.'-'.$dados -> acao.'`)">
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
            print 'Erro '.$erro->getMessage();
        }
    }

    //INCLUIR HISTORICO NA AÇÃO

    public function incluirHistorico($acao, $historico){

        include 'conexao.php';

        $query = $conector -> prepare("INSERT INTO historico (acao, dados) VALUES ('$acao', '$historico')");

        try{

            $query -> execute();

            print "<script>alert('Histórico incluído com sucesso')</script>";
            print "<script>location=('dashboard')</script>";
            
        }catch(PDOException $erro){
            print 'Erro '. $erro->getMessage();
        }
    }

        //INCLUIR PARTICIPANTES NA AÇÃO

        public function incluirParticipantes($acao, $participante){

            include 'conexao.php';
    
            $query = $conector -> prepare("INSERT INTO participantes (acao, usuario) VALUES ('$acao', '$participante')");
    
            try{
    
               $query -> execute();
    
                print "<script>alert('Integrantes incluídos com sucesso')</script>";
                print "<script>location=('dashboard')</script>";
                
            }catch(PDOException $erro){
                print 'Erro '. $erro->getMessage();
            }
        }

        //CONTAGEM DE ACOES
        public function contaAcoes($divisao, $parametro){
     
            include 'conexao.php';

            switch($parametro){
                case 0;
                $periodo = date('m');
                $funcao = 'MONTH';
                break;

                case 1;
                $periodo = date('Y');
                $funcao = 'YEAR';
                break;
            }
        
            $query = $conector->prepare("SELECT * FROM acoes WHERE divisao = '$divisao' AND $funcao(realizada) = '$periodo'");
       
            try{
                $query->execute();
       
                print_r($dados = $query->rowCount());       
                
            }
            catch(PDOException $erro)
            {
            print 'erro '.$erro->getMessage();
            }
          }

        //MÉDIA DE ACOES
        public function mediaParticipantesAcoes($divisao){
     
            include 'conexao.php';

            $queryAcao = $conector -> prepare("SELECT id, realizada, divisao FROM acoes WHERE divisao = '$divisao' AND YEAR(realizada) = YEAR(CURRENT_DATE())"); //TOTAL DE AÇÕES
       
            try{

                $queryAcao->execute();

                while($dadosAcoes = $queryAcao -> fetch(PDO::FETCH_ASSOC)){

                    $queryParticipantes = $conector->prepare("SELECT acao, COUNT(usuario) as 'total' FROM participantes WHERE acao='$dadosAcoes[id]' GROUP BY acao");

                    $queryParticipantes -> execute();
                    $total = $queryParticipantes -> fetch(PDO::FETCH_ASSOC);

                    $totalGeral += $total['total'];

                }                    print_r(round($totalGeral/$queryAcao -> rowCount()));       
                
            }
            catch(PDOException $erro)
            {
            print 'Erro: '.$erro->getMessage();
            }
          }

        //INTEGRANTES EM ATENÇÃO   
        public function integrantesAtencao($divisao){
     
            include 'conexao.php';

            $queryAtencao = $conector -> prepare("

            SELECT COUNT(u.id) AS 'atencao' FROM usuarios u, acoes a WHERE u.divisao = '$divisao' AND YEAR(a.realizada) = YEAR(CURRENT_DATE()) AND u.id NOT IN (SELECT p.usuario FROM participantes p) GROUP BY u.path;

            ");
       
            try{

                $queryAtencao->execute();

                $dadosAtencao = $queryAtencao -> fetch(PDO::FETCH_ASSOC);

                    print_r($queryAtencao -> rowCount());
       
                //print_r($dados = $queryAcao->rowCount());       
                
            }
            catch(PDOException $erro)
            {
            print 'Erro: '.$erro->getMessage();
            }
          }
        
          //RANCKING AÇÕES

          public function ranking($divisao){
     
            include 'conexao.php';

            $queryRanking = $conector -> prepare("SELECT u.path AS path, u.id FROM participantes INNER JOIN participantes p, usuarios u, acoes a WHERE u.divisao='$divisao' AND YEAR(a.realizada) = YEAR(CURRENT_DATE()) AND p.usuario = u.id GROUP BY p.usuario ORDER BY u.path ASC");


       
            try{

                $queryRanking->execute();

                while($dadosRanking = $queryRanking -> fetch(PDO::FETCH_ASSOC)){

                    $queryParticipantes = $conector->prepare("SELECT id FROM participantes WHERE usuario = '$dadosRanking[id]'");

                    $queryParticipantes -> execute();

                    if($queryParticipantes -> rowCount() > 1){
                        $termo = ' Ações';
                    }
                    else{
                        $termo = ' Ação';
                    }
                    
                    print_r('

                        <tr>
                            <td class="text- text-success">'.$dadosRanking['path'].'</td>
                            <td class="text-primary"><b>'.$queryParticipantes -> rowCount().'</b><small> ' .$termo.'</small></td>
                        </tr>

                    ');

                }

                
            }
            catch(PDOException $erro)
            {
            print 'Erro: '.$erro->getMessage();
            }
          }

        //GRAFICO AÇÕES

              public function acoesGrafico($divisao, $mes){ //AÇÕES MÊS
     
                include 'conexao.php';
    
                $queryAcoesGrafico = $conector -> prepare("SELECT id FROM acoes WHERE divisao='$divisao' AND MONTH(realizada) = MONTH('$mes') AND YEAR(realizada) = YEAR(CURRENT_DATE())");
    
                try{
    
                    $queryAcoesGrafico->execute();
    
                    print_r($queryAcoesGrafico -> rowCount());
        
                    
                }
                catch(PDOException $erro)
                {
                print 'Erro: '.$erro->getMessage();
                }
              }

            public function integrantesGrafico($divisao, $mes){ //INTEGRANTES MÊS
     
                include 'conexao.php';
    
                $queryRanking = $conector -> prepare("SELECT * FROM acoes WHERE divisao='$divisao' AND MONTH(realizada) = MONTH('$mes') AND YEAR(realizada) = YEAR(CURRENT_DATE())");


       
                try{
    
                    $queryRanking->execute();
    
                    while($dadosRanking = $queryRanking -> fetch(PDO::FETCH_ASSOC)){
    
                        $queryParticipantes = $conector->prepare("SELECT id FROM participantes WHERE acao = '$dadosRanking[id]'");
    
                        $queryParticipantes -> execute();

                        $total = $queryParticipantes -> rowCount();

                        $total = $total + $total;

                        }

                    print_r($total);
    
                }
                catch(PDOException $erro)
                {
                print 'Erro: '.$erro->getMessage();
                }
              }


}

?>