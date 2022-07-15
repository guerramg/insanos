         <?php

        $novaAcao = new Acoes;
        $usuarios = new Usuarios;

        $data =  explode('=', $_SERVER['REQUEST_URI']);
        if($data[1] == ''){
            $periodo = date('Y-m-d');
        }
        else{
            $periodo = $data[1];
        };


         ?>
         <!-- MODAL ACOES -->
         <div class="modal fade" id="formIntegrantes" tabindex="-1" role="dialog" aria-labelledby="formIntegrantesTitle"
             aria-hidden="true">
             <div class="modal-dialog modal-dialog-centered" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">
                         <div class="card">
                             <div class="card-header">Integrantes Participantes</div>
                             <div class="card-body">
                                 <hr>
                                 <form enctype="application/x-www-form-urlencoded" action="" method="post">

                                     <div class="form-group">
                                         <label for="path" class="control-label mb-1">Realizada</label>
                                         <input id="realizada" name="data" type="date" class="form-control" required>
                                     </div>

                                     <div class="form-group">
                                         <label for="path" class="control-label mb-1">Responsável</label>
                                         <select name="responsavel" class="form-control">
                                             <option></option>
                                             <?php

                                   $usuarios->selectUsuarios($dadosUsuarioLogado['divisao']);
                                  
                                    ?>
                                         </select>
                                     </div>

                                     <div class="form-group">
                                         <label for="path" class="control-label mb-1">Ação</label>
                                         <textarea name="acao" id="acao" cols="30" rows="5" class="form-control"
                                             required></textarea>
                                     </div>

                                     <div class="form-group">
                                         <input type="hidden" name="divisao"
                                             value="<?= $dadosUsuarioLogado['divisao'] ?>">
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- FIM MODAL ACOES -->

         <!-- MODAL INCLUIR PARTICIPANTE -->
         <div class="modal fade" id="formParticipantes" tabindex="-1" role="dialog"
             aria-labelledby="formParticipantesTitle" aria-hidden="true">
             <div class="modal-dialog modal-dialog-centered" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">
                         <div class="card">
                             <div class="card-header">Cadastrar Participantes na Ação Social</div>
                             <div class="card-body">
                                 <hr>
                                 <form enctype="application/x-www-form-urlencoded" action="" method="post">


                                     <div class="form-group">
                                         <label for="path" class="control-label mb-1">Selecione 1 ou mais integrantes</label>
                                         <select name="participantes[]" id="participantes" class="form-control"
                                             multiple="multiple" required>

                                             <?php

                                                $usuarios -> selectUsuarios($dadosUsuarioLogado['divisao'])

                                            ?>

                                         </select>
                                     </div>

                                     <input type="hidden" name="idAcaoParticipantes" id="idAcaoParticipantes">

                                </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- FIM MODAL INCLUIR PARTICIPANTE -->

         <!-- MODAL HISTORICO -->
         <div class="modal fade" id="formHistorico" tabindex="-1" role="dialog" aria-labelledby="formHistoricoTitle"
             aria-hidden="true">
             <div class="modal-dialog modal-dialog-centered" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">
                         <div class="card">
                             <div class="card-header">Histórico da Ação Social</div>
                             <div class="card-body">
                                 <hr>
                                 <form enctype="application/x-www-form-urlencoded" action="" method="post">


                                     <div class="form-group">
                                         <textarea name="historico" cols="30" rows="5" class="form-control" id="dadosHistorico"></textarea>
                                     </div>

                                     <input type="hidden" name="idAcaoHistorico" id="idAcaoHistorico">
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- FIM MODAL HISTORICO -->


         <!-- STATISTIC-->
         <section class="statistic statistic2">
             <div class="container">
                 <div class="row">
                     <div class="col-md-6 col-lg-3 text-center">
                         <div class="statistic__item statistic__item--green">
                             <h2 class="number mb-5">

                                 <?php

                                $novaAcao -> contaAcoes($dadosUsuarioLogado['divisao'], '1');

                                ?>

                             </h2>
                             <span class="desc">Ações Realizado no ano</span>
                             <div class="icon">
                                 <i class="fa fa-handshake-o"></i>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-6 col-lg-3 text-center">
                         <div class="statistic__item statistic__item--orange">
                             <h2 class="number mb-5">

                                 <?php

                                $novaAcao -> contaAcoes($dadosUsuarioLogado['divisao'], '0');

                                ?>

                             </h2>
                             <span class="desc">Ações Realizadas no mês</span>
                             <div class="icon">
                                 <i class="fa fa-handshake-o"></i>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-6 col-lg-3 text-center">
                         <div class="statistic__item statistic__item--blue">
                             <h2 class="number mb-5">

                                 <?php

                            $novaAcao -> mediaParticipantesAcoes($dadosUsuarioLogado['divisao']);

                            ?>

                             </h2>

                             <span class="desc">Média de Participantes</span>
                             <div class="icon">
                                 <i class="fa fa-users" aria-hidden="true"></i>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-6 col-lg-3 text-center">
                         <div class="statistic__item statistic__item--red">
                             <h2 class="number mb-5">
                                
                                <?php

                                $novaAcao -> integrantesAtencao($dadosUsuarioLogado['divisao']);

                                ?>
                             </h2>
                             <span class="desc">Integrantes em Atenção</span>
                             <div class="icon">
                                 <i class="fa fa-user-times" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->

         <!-- DADOS AÇÕES-->
         <section class="p-t-20">
             <div class="container">
                 <div class="row">
                     <div class="user-data m-b-30 col-md-12 mb-5">
                     <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-account-calendar"></i>Ações Sociais</h3>

                                    <div class="filters m-b-45">
                                        <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
<form action="" method="get">
                                            <div class="d-inline">
                                            <input type="date" name="periodo" id="" class="form-control">
                                            </div>

                                            <div class="d-inline">
                                            <button type="submit"><i class="zmdi zmdi-account-calendar"></i></button>
                                            </div>
                                            

                                        </div>
</form>
                                    </div>

                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                <td>Data</td>
                                                    <td>Ação</td>
                                                    <td>Divisão</td>
                                                    <td>Participantes</td>
                                                    <td>Histórico</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php

                                                $novaAcao -> acoesAdm($periodo);

                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                 </div>
             </div>
         </section>
         <!-- FIM DADOS AÇÃO-->

         <!-- DADOS INTEGRANTES ATENÇÃO-->
         <section class="p-t-20">
             <div class="container">
                 <div class="row">
                     <div class="user-data m-b-30 col-md-12 mb-5">
                     <h3 class="title-3 m-b-30 text-danger">
                                        <i class="zmdi zmdi-alert-circle"></i>Integrantes em Atenção</h3><i class="fas fa-engine-warning"></i>

                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                <td>Divisão</td>
                                                    <td>Path</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            <?php

$novaAcao -> atencaoAdm();

?>

                                            </tbody>
                                        </table>
                                    </div>
                 </div>
             </div>
         </section>
         
         <!-- FIM DADOS INTEGRANTES ATENÇÃO-->
         
         
         <script>

function verParticipantes(valor) {
   /* let dadosBanco = valor.split('-')

    let acaoId = document.querySelector('#idExcluirAcao')
    let acaoNome = document.querySelector('#nomeExcluirAcao')

    acaoId.value = dadosBanco[0]
    acaoNome.textContent = dadosBanco[1]*/
    console.log(valor)

}

function verHistorico(valor) {

    let dadosHistorico = document.querySelector('#dadosHistorico')

    dadosHistorico.value = valor

}



         </script>