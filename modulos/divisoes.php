<?php
        $divisoes = new Divisoes;

    if($_POST['botao'] == 'incluir'){
        $divisoes -> inserir($_POST["divisao"]);
    }

    if($_POST['botao'] == 'editar'){
        $divisoes -> editar($_POST["id"], $_POST["status"], $_POST["divisao"]);
    }

    if($_POST['botao'] == 'excluir'){
        $divisoes -> excluir($_POST["idDivisao"]);
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
                    <form enctype="application/x-www-form-urlencoded" action="" method="post">

                        <div id="statusDados">
                    Ativo <input type="radio" name="status" id="statusEdicao" value="0" class="mr-2">
                    Inativo <input type="radio" name="status" id="statusEdicao" value="1">
</div>
                        <hr>
                            <div class="form-group">


                                <label for="divisao" class="control-label mb-1">Divisão</label>
                                <input id="divisaoEdicao" name="divisao" type="text" class="form-control" aria-required="true"
                                    aria-invalid="false">
                            
                                    <input type="hidden" name="id" id="idEdicao">
                            </div>
                            <div>
                                <button id="add-button" type="submit" class="btn btn-lg btn-info btn-block" name="botao"
                                    value="editar">
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

<!-- FIM FORM -->

<!-- FORM EXCLUIR MODAL -->

<div class="modal fade" id="formExcluirDivisao" tabindex="-1" role="dialog" aria-labelledby="formExcluirDivisaoTitle"
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
                                <input id="idExcluirDivisao" name="idDivisao" type="text" class="form-control" aria-required="true"
                                    aria-invalid="false" hidden>
                                    <h1 id="nomeExcluirDivisao" class="text-center text-uppercase text-danger"></h1>
                            </div>
                            <div>
                                <button id="add-button" type="submit" class="btn btn-lg btn-danger btn-block" name="botao"
                                    value="excluir">
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
                    <?php
if($_SESSION['acesso'] == 0){
?>

                        <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal"
                            data-target="#formDivisao">
                            <i class="zmdi zmdi-plus"></i>
                            Incluir divisão
                        </button>
<?php } ?>

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
    //EDIÇÃO

    function edicao(valor){
        let dadosBanco = valor.split('-')

        let id = document.querySelector('#idEdicao')
        let status = document.querySelector('#statusEdicao')
        let divisao = document.querySelector('#divisaoEdicao')
        let pai = document.querySelector('#statusDados')


        id.value = dadosBanco[1]

       if(dadosBanco[0] == 0){
        pai.innerHTML = 'Ativo <input type="radio" name="status" id="statusEdicao" value="0" class="mr-2" checked>Inativo <input type="radio" name="status" id="statusEdicao" value="1">'
        }
        else{
        pai.innerHTML = 'Ativo <input type="radio" name="status" id="statusEdicao" value="0" class="mr-2">Inativo <input type="radio" name="status" id="statusEdicao" value="1" checked>'
        }

        divisao.value = dadosBanco[2]

    }

    //EXCLUIR
        function exclusao(valor){
            let dadosBanco = valor.split('-')

            let divisaoid = document.querySelector('#idExcluirDivisao')
            let divisaoNome = document.querySelector('#nomeExcluirDivisao')

            divisaoid.value = dadosBanco[0]
            divisaoNome.textContent = dadosBanco[1]

        }
</script>