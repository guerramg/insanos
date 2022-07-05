         <?php

        $novaAcao = new Acoes;
        $usuarios = new Usuarios;

         if($_POST['botao'] == 'incluir'){

            $novaAcao -> inserir($_POST['divisao'], $_POST['data'], $_POST['acao'], $_POST['responsavel']);

         }

         if($_POST['botao'] == 'excluir'){

            $novaAcao -> excluirAcao($_POST['idAcao']);

         }

         if($_POST['botao'] == 'historico'){

            $novaAcao -> incluirHistorico($_POST['idAcaoHistorico'], $_POST['historico']);

         }

         if($_POST['botao'] == 'editaHistorico'){

            $novaAcao -> editarHistorico($_POST['idAcaoHistoricoEdita'], $_POST['editaDadosHistorico']);

         }

         if($_POST['botao'] == 'participantes'){


            foreach ($_REQUEST['participantes'] as $participante){

                $novaAcao -> incluirParticipantes($_POST['idAcaoParticipantes'], $participante);

            }

         }


         ?>

         <!-- MODAL ACOES -->
         <div class="modal fade" id="formAcoes" tabindex="-1" role="dialog" aria-labelledby="formAcoesTitle"
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
                             <div class="card-header">Cadastrar Nova Ação Social</div>
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

                                     <div>

                                         <button id="add-button" type="submit" class="btn btn-lg btn-info btn-block"
                                             name="botao" value="incluir">
                                             <i class="fa fa-plus-square"></i>&nbsp; Incluir
                                         </button>
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

                                     <div>

                                         <button id="add-button" type="submit" class="btn btn-lg btn-info btn-block"
                                             name="botao" value="participantes">
                                             <i class="fa fa-plus-square"></i>&nbsp; Incluir
                                         </button>
                                     </div>
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
                             <div class="card-header">Cadastrar Histórico da Ação Social</div>
                             <div class="card-body">
                                 <hr>
                                 <form enctype="application/x-www-form-urlencoded" action="" method="post">


                                     <div class="form-group">
                                         <textarea name="historico" cols="30" rows="5" class="form-control" placeholder="Insira aqui os nomes dos integrantes que não participaram e o motivo, além de informações detalhadas sobre a ação."
                                             required></textarea>
                                     </div>

                                     <input type="hidden" name="idAcaoHistorico" id="idAcaoHistorico">

                                     <div>

                                         <button id="add-button" type="submit" class="btn btn-lg btn-info btn-block"
                                             name="botao" value="historico">
                                             <i class="fa fa-plus-square"></i>&nbsp; Incluir
                                         </button>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- FIM MODAL HISTORICO -->

         <!-- MODAL EDITA HISTORICO -->
            <div class="modal fade" id="formEditaHistorico" tabindex="-1" role="dialog" aria-labelledby="formEditaHistoricoTitle"
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
                             <div class="card-header">Editar Histórico da Ação Social</div>
                             <div class="card-body">
                                 <hr>
                                 <form enctype="application/x-www-form-urlencoded" action="" method="post">


                                     <div class="form-group">
                                         <textarea name="editaDadosHistorico" cols="30" rows="5" class="form-control" placeholder="Insira aqui os nomes dos integrantes que não participaram e o motivo, além de informações detalhadas sobre a ação." id="editaHistorico" required></textarea>
                                     </div>

                                     <input type="hidden" name="idAcaoHistoricoEdita" id="idAcaoHistoricoEdita">

                                     <div>

                                         <button id="add-button" type="submit" class="btn btn-lg btn-info btn-block"
                                             name="botao" value="editaHistorico">
                                             <i class="fa fa-plus-square"></i>&nbsp; Editar
                                         </button>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- FIM MODAL EDITA HISTORICO -->

         <!-- FORM EXCLUIR MODAL -->

         <div class="modal fade" id="formExcluirAcao" tabindex="-1" role="dialog" aria-labelledby="formExcluirAcaoTitle"
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
                             <div class="card-header">Tem certeza que deseja excluir?</div>
                             <div class="card-body">
                                 <hr>
                                 <form enctype="application/x-www-form-urlencoded" action="" method="post">
                                     <div class="form-group">
                                         <input id="idExcluirAcao" name="idAcao" type="text" class="form-control"
                                             aria-required="true" aria-invalid="false" hidden>
                                         <h1 id="nomeExcluirAcao" class="text-center text-uppercase text-danger"></h1>
                                     </div>
                                     <div>
                                         <button id="add-button" type="submit" class="btn btn-lg btn-danger btn-block"
                                             name="botao" value="excluir">
                                             <i class="fas fa-exclamation-triangle"></i>&nbsp; Excluir
                                         </button>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- FIM FORM -->

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
                                 <i class="fa fa-user-times" aria-hidden="true""></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->

            <!-- STATISTIC CHART-->
            <section class=" statistic-chart">
                                     <div class="container">
                                         <div class="row">
                                             <div class="col-md-12">
                                                 <h3 class="title-5 m-b-35">Prévia</h3>
                                             </div>
                                         </div>
                                         <div class="row">
                                             <div class="col-md-12 col-lg-8">
                                                 <!-- CHART-->
                                                 <div class="statistic-chart-1">
                                                     <h3 class="title-3 m-b-30">Ações / Integrantes Participantes</h3>
                                                     <div class="chart-wrap">
                                                         <canvas id="barChart"></canvas>
                                                     </div>
                                                 </div>
                                                 <!-- END CHART-->
                                             </div>
                                             <div class="col-md-6 col-lg-4">
                                                 <!-- RANKING AÇÕES-->
                                                 <div class="top-campaign">
                                                     <h3 class="title-3 m-b-30 mt-2 text-dark">Participação Integrantes</h3>
                                                     <div class="table-responsive">
                                                         <table class="table table-top-campaign">
                                                             <tbody>
                                                                    <?php

                                                                    $novaAcao -> ranking($dadosUsuarioLogado['divisao']);

                                                                    ?>
                                                            </tbody>
                                                         </table>
                                                     </div>
                                                 </div>
                                                 <!-- END RANKING AÇÕES-->
                                             </div>
                                         </div>
                                     </div>
         </section>
         <!-- END STATISTIC CHART-->

         <!-- DATA TABLE-->
         <section class="p-t-20">
             <div class="container">
                 <div class="row">
                     <div class="col-md-12 mb-5">
                         <h3 class="title-5 m-b-35">Ações Sociais</h3>
                         <div class="table-data__tool">
                             <div class="table-data__tool-left">
<!--
                                 <div class="rs-select2--light rs-select2--sm">
                                     <select class="js-select2" name="time">
                                         <option selected="selected"><?= date("m/Y") ?></option>
                                         <option value="">
                                             <?=date_create_from_format('m/Y', date('m/Y'))
                                                ->modify('-1 month')
                                                ->format('m/Y');
                                                 ?>
                                         </option>
                                         <option value="">
                                             <?=date_create_from_format('m/Y', date('m/Y'))
                                                ->modify('-2 month')
                                                ->format('m/Y');
                                                 ?>
                                         </option>
                                     </select>
                                     <div class="dropDownSelect2"></div>
                                 </div>
-->
                             </div>
                             <div class="table-data__tool-right">
                                 <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal"
                                     data-target="#formAcoes">
                                     <i class="zmdi zmdi-plus"></i>Incluir Ação</button>
<!--
                                 <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                     <select class="js-select2" name="type">
                                         <option selected="selected">Relatórios</option>
                                         <option value="">Option 1</option>
                                         <option value="">Option 2</option>
                                     </select>
                                     <div class="dropDownSelect2"></div>
                                 </div>
-->
                             </div>
                         </div>
                         <div class="table-responsive table-responsive-data2">
                             <table class="table table-data2">
                                 <thead>
                                     <tr>
                                         <th>data</th>
                                         <th>ação</th>
                                         <th>participantes</th>
                                         <th></th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <tr class="tr-shadow">

                                         <?php

                                                                    Acoes::listaAcoes($dadosUsuarioLogado['divisao'])
                                            ?>

                                     </tr>
                                     <tr class="spacer"></tr>

                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </section>
         <!-- END DATA TABLE-->
         <script>
//EXCLUIR
function exclusao(valor) {
    let dadosBanco = valor.split('-')

    let acaoId = document.querySelector('#idExcluirAcao')
    let acaoNome = document.querySelector('#nomeExcluirAcao')

    acaoId.value = dadosBanco[0]
    acaoNome.textContent = dadosBanco[1]

}

function incluirHistorico(valor) {

    let acaoId = document.querySelector('#idAcaoHistorico')

    acaoId.value = valor

}

function editarHistorico(valor) {

let dadosBanco = valor.split('-')

let historicoId = document.querySelector('#idAcaoHistoricoEdita')
let historicoDados = document.querySelector('#editaHistorico')

historicoId.value = dadosBanco[0]
historicoDados.value = dadosBanco[1]

}

function incluirParticipantes(valor) {

    let acaoId = document.querySelector('#idAcaoParticipantes')

    acaoId.value = valor

}


         </script>