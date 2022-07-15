<?php


    class Acoes extends conversorDatas{

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

            //REGIONAL

            if($divisao == 1){
                $complementoSql = "";
            }
            else{
                $complementoSql = "divisao = '$divisao' AND";
            }
        
            $query = $conector->prepare("SELECT * FROM acoes WHERE $complementoSql $funcao(realizada) = '$periodo'");
       
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

            //REGIONAL

            if($divisao == 1){
                $complementoSql = "";
            }
            else{
                $complementoSql = "divisao = '$divisao' AND";
            }

            $queryAcao = $conector -> prepare("SELECT id, realizada, divisao FROM acoes WHERE  $complementoSql  YEAR(realizada) = YEAR(CURRENT_DATE())"); //TOTAL DE AÇÕES
       
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

            //REGIONAL

            if($divisao == 1){
                $complementoSql = "";
            }
            else{
                $complementoSql = "u.divisao = '$divisao' AND";
            }

            $queryAtencao = $conector -> prepare("

            SELECT COUNT(u.id) AS 'atencao' FROM usuarios u, acoes a WHERE $complementoSql YEAR(a.realizada) = YEAR(CURRENT_DATE()) AND u.id NOT IN (SELECT p.usuario FROM participantes p) GROUP BY u.path;

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
    
                $queryRanking = $conector -> prepare("SELECT p.usuario, a.id FROM participantes p INNER JOIN acoes a ON a.id = p.acao WHERE a.divisao='$divisao' AND MONTH(a.realizada) = MONTH('$mes') AND YEAR(a.realizada) = YEAR(CURRENT_DATE())");

                try{
    
                    $queryRanking->execute();
                    
                    print_r ($queryRanking -> rowCount());
    
                }
                catch(PDOException $erro)
                {
                print 'Erro: '.$erro->getMessage();
                }
              }


              /* METODOS ADM */

              //AÇÕES

              public function acoesAdm($mes){

                include 'conexao.php';

                        $queryAcoes = $conector -> prepare("SELECT * FROM acoes  WHERE MONTH(realizada) = MONTH('$mes') AND YEAR(realizada) = YEAR(CURRENT_DATE()) ORDER BY realizada DESC");

                try{

                    $queryAcoes -> execute();
                    $totalAções = $queryAcoes -> rowCount();

                    while($dadosAcoes = $queryAcoes -> fetch(PDO::FETCH_OBJ)){

                        $divisao = $dadosAcoes -> divisao;
                        $acao = $dadosAcoes -> id;

                        $queryDivisao = $conector -> prepare("SELECT id, divisao FROM divisoes WHERE id='$divisao'");
                        $queryDivisao -> execute();
                        $dadosDivisao = $queryDivisao -> fetch(PDO::FETCH_OBJ);

                        $queryParticipantes = $conector -> prepare("SELECT acao, usuario FROM participantes WHERE acao='$acao'");
                        $queryParticipantes -> execute();
                        $totalParticipantes = $queryParticipantes -> rowCount();
                        
                        $queryHistorico = $conector -> prepare("SELECT acao, dados FROM historico WHERE acao='$acao'");
                        $queryHistorico -> execute();
                        $dadosHistorico = $queryHistorico -> fetch(PDO::FETCH_OBJ);

                        print_r('
                        <tr>
                        <td>
                            <div class="table-data__info">
                                    <h6>'.conversorDatas::dataBrasil($dadosAcoes -> realizada).'</h6>
                                </div>
                            </td>

                            <td>
                            <div class="table-data__info">
                                    <h6>'.$dadosAcoes -> acao.'</h6>
                                </div>
                            </td>
                            <td>
                                    <h6>'.$dadosDivisao -> divisao.'</h6>
                                
                            </td>

                            <td>
                                <a href="#" data-toggle="modal" data-target="#formIntegrantes" data-placement="top" onclick="verParticipantes('.$dadosAcoes -> id.')">
                                <span class="role member">'.$totalParticipantes.'</span>
                                </a>
                            </td>

                            <td>
                                <span class="more">
                                    <i class="zmdi zmdi-more" data-toggle="modal" data-target="#formHistorico" data-placement="top" onclick="verHistorico(`'.$dadosHistorico -> dados.'`)"></i>
                                </span>
                            </td>
                        </tr>
                        ');

                    }
                }catch(PDOException $erro){
                    print $erro->getMessage();
                }

              }

              //INTEGRANTES EM ATENÇÃO

              public function atencaoAdm(){
                include 'conexao.php';

                $queryAtencao = $conector -> prepare("SELECT u.id, u.path, u.divisao, d.divisao FROM usuarios u, acoes a, divisoes d WHERE u.divisao = d.id AND YEAR(a.realizada) = YEAR(CURRENT_DATE()) AND u.id NOT IN (SELECT p.usuario FROM participantes p) GROUP BY u.path ORDER BY d.divisao ASC");

                try{
                    $queryAtencao -> execute();
                    while($dadosAtencao = $queryAtencao -> fetch(PDO::FETCH_ASSOC)){
                        print_r('<tr>
                        <td>
                                    <h6>'.$dadosAtencao["divisao"].'</h6>
                            </td>

                            <td>
                            <div class="table-data__info">
                                    <h6>'.$dadosAtencao["path"].'</h6>
                                </div>
                            </td>
                        </tr>');
                    }

                }catch(PDOException $erro){
                    print $erro->getMessage();
                }

              }


}

?>