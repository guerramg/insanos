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
                                <label for="path" class="control-label mb-1">Ação</label>
                                <textarea name="acao" id="acao" cols="30" rows="5" class="form-control" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="divisao" class="control-label mb-1">Divisão</label>
                                <select name="divisao" id="" class="form-control" required>
                                    <option></option>
                                    <?php
                                    Divisoes::selectDivisoes();
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="grau" class="control-label mb-1">Grau</label>
                                <select name="grau" class="form-control" id="grau" required>
                                    <option></option>
                                    <option value="0">Diretor</option>
                                    <option value="1">Sub Diretor</option>
                                    <option value="2">Social</option>
                                    <option value="3">ADM</option>
                                    <option value="10">Sargento</option>
                                    <option value="11">Full</option>
                                    <option value="12">Meio</option>
                                    <option value="13">PP</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="acesso" class="control-label mb-1">Acesso</label>
                                <select name="acesso" class="form-control" id="acesso" required>
                                    <option></option>
                                    <option value="0">Administrador</option>
                                    <option value="1">Social</option>
                                    <option value="2">Integrante</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="path" class="control-label mb-1">Patch</label>
                                <input id="path" name="path" type="text" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="email" class="control-label mb-1">Email</label>
                                <input id="email" name="email" type="email" class="form-control" required>
                            </div>

                    <div>

                                <button id="add-button" type="submit" class="btn btn-lg btn-info btn-block" name="botao"
                                    value="incluir">
                                    <i class="fa fa-plus-square"></i>&nbsp; Incluir
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

          <!-- FIM MODAL ACOES -->
          
          <!-- STATISTIC-->
            <section class="statistic statistic2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3 text-center">
                            <div class="statistic__item statistic__item--green">
                                <h2 class="number mb-5">55</h2>
                                <span class="desc">Ações Realizado no ano</span>
                                <div class="icon">
                                    <i class="fa fa-handshake-o"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 text-center">
                            <div class="statistic__item statistic__item--orange">
                                <h2 class="number mb-5">6</h2>
                                <span class="desc">Ações Realizadas no mês</span>
                                <div class="icon">
                                    <i class="fa fa-handshake-o"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 text-center">
                            <div class="statistic__item statistic__item--blue">
                                <h2 class="number mb-5">7</h2>
                                <span class="desc">Média de Participantes</span>
                                <div class="icon">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 text-center">
                            <div class="statistic__item statistic__item--red">
                                <h2 class="number mb-5">5</h2>
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
            <section class="statistic-chart">
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
                                <div class="statistic-chart-1-note">
                                    <span class="big">Total de Integrantes</span>
                                    <span>/ 16220 items sold</span>
                                </div>
                            </div>
                            <!-- END CHART-->
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <!-- TOP CAMPAIGN-->
                            <div class="top-campaign">
                                <h3 class="title-3 m-b-30 text-danger">Requer Atenção</h3>
                                <div class="table-responsive">
                                    <table class="table table-top-campaign">
                                        <tbody>
                                            <tr>
                                                <td class="text-danger">Fulano</td>
                                                <td class="text-danger">2</td>
                                            </tr>
                                            <tr>
                                                <td class="text-danger">Beltrano</td>
                                                <td class="text-danger">1</td>
                                            </tr>
                                            <tr>
                                                <td class="text-danger">Siclano</td>
                                                <td class="text-danger">0</td>
                                            </tr>
 
                                        </tbody>
                                    </table>
                                </div>
                                <h3 class="title-3 m-b-30 mt-4 text-primary">Em Destaque</h3>
                                <div class="table-responsive">
                                    <table class="table table-top-campaign">
                                        <tbody>
                                            <tr>
                                                <td class="text-primary">Fulano 2</td>
                                                <td class="text-primary">20</td>
                                            </tr>
                                            <tr>
                                                <td class="text-primary">Beltrano 2</td>
                                                <td class="text-primary">19</td>
                                            </tr>
                                            <tr>
                                                <td class="text-primary">Siclano 2</td>
                                                <td class="text-primary">19</td>
                                            </tr> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END TOP CAMPAIGN-->
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

                                </div>
                                <div class="table-data__tool-right">
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal"
                            data-target="#formAcoes">
                                        <i class="zmdi zmdi-plus"></i>Incluir Ação</button>
                                    <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                        <select class="js-select2" name="type">
                                            <option selected="selected">Relatórios</option>
                                            <option value="">Option 1</option>
                                            <option value="">Option 2</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>data</th>
                                            <th>status</th>
                                            <th>responsável</th>
                                            <th>ação</th>
                                            <th>participantes</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="tr-shadow">

                                        <td>27/05/2022</td>

                                            <td>
                                                <span class="status--process">Executada</span>
                                            </td>

                                            <td>Motoqueiro</td>

                                            <td class="desc">Apoio e contenção médicos do mundo</td>
                                            

                                            <td>5</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    
                                                    <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="Editar">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button>

                                                    <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="Incluir Participantes">
                                                        <i class="zmdi zmdi-accounts-add"></i>
                                                    </button>

                                                    <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="Histórico">
                                                        <i class="zmdi zmdi-file-text"></i>
                                                    </button>

                                                    <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="Deletar">
                                                        <i class="zmdi zmdi-delete text-danger"></i>
                                                    </button>

                                                </div>
                                            </td>
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