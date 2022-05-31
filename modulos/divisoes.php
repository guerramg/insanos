<?php
        $divisoes = new Divisoes;

    if($_POST['botao'] == 'incluir'){
        $arrayDivisao = array($_POST["divisao"]);
        $divisoes -> inserir($arrayDivisao);
    }

?>


<!-- FORM CADASTRO MODAL -->

<div class="modal fade" id="formDivisao" tabindex="-1" role="dialog" aria-labelledby="formDivisaoTitle"
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
                    <div class="card-header">Nova Divisão</div>
                    <div class="card-body">
                        <hr>
                        <form enctype="application/x-www-form-urlencoded" action="" method="post">
                            <div class="form-group">
                                <label for="divisao" class="control-label mb-1">Divisão</label>
                                <input id="divisao" name="divisao" type="text" class="form-control" aria-required="true"
                                    aria-invalid="false" required>
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

<!-- FIM FORM -->

<!-- FORM EDITAR MODAL -->

<div class="modal fade" id="formEditarDivisao" tabindex="-1" role="dialog" aria-labelledby="formEditarDivisaoTitle"
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
                    <div class="card-header">Editar Divisão</div>
                    <div class="card-body">
                        <hr>
                        <form enctype="application/x-www-form-urlencoded" action="" method="post">
                            <div class="form-group">
                                <label for="divisao" class="control-label mb-1">Divisão</label>
                                <input id="divisao" name="divisao" type="text" class="form-control" aria-required="true"
                                    aria-invalid="false" required>
                            </div>
                            <div>
                                <button id="add-button" type="submit" class="btn btn-lg btn-info btn-block" name="botao"
                                    value="incluir">
                                    <i class="fa fa-plus-square"></i>&nbsp; Editar
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

<!-- FIM FORM -->


<!-- DIVISOES-->
<section class="p-t-20">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-5">
                <h3 class="title-5 m-b-35">DIVISÕES</h3>
                <div class="table-data__tool">
                    <div class="table-data__tool-left">

                        <div class="rs-select2--light rs-select2--sm">

                        </div>

                    </div>
                    <div class="table-data__tool-right">


                        <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal"
                            data-target="#formDivisao">
                            <i class="zmdi zmdi-plus"></i>
                            Incluir divisão
                        </button>


                    </div>
                </div>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>data</th>
                                <th>status</th>
                                <th>divisão</th>
                                <th>responsável Social</th>
                                <th>total de integrantes</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                
                                $divisoes -> listaDivisoes();

                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- END DIVISOES-->

<script>
    function edicao(valor){
    //let valueEditar = document.querySelector('#botaoEditar')
    console.log(valor)
    }
</script>