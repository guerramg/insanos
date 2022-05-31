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
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
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