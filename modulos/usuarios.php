<?php
if($_SESSION['acesso'] != 0){
    print '<script>alert("Você não tem permição para acessar esta área.")</script>';
    print '<script>location=("'.$caminho.'/dashboard")</script>';

}
        //$conversorData = new conversorDatas;
        $usuarios = new Usuarios;
        $divisoes = new Divisoes;


    if($_POST['botao'] == 'incluir'){
        $acesso = $_POST['acesso'];
        $divisao = $_POST['divisao'];
        $path = $_POST['path'];
        $email = $_POST['email'];
        $grau  = $_POST['grau'];

        $usuarios -> inserir($acesso, $divisao, $path , $email, $grau);
    }
    if($_POST['botao'] == 'editar'){
        $acesso = $_POST['acessoEdicao'];
        $path = $_POST['pathEdicao'];
        $email = $_POST['emailEdicao'];
        $grau  = $_POST['grauEdicao'];
        $id  = $_POST['id'];
        $status  = $_POST['status'];
        
        $usuarios -> editar($acesso, $path , $email, $grau, $id, $status);
    }
    if($_POST['botao'] == 'excluir'){
       
        $usuarios -> excluir($_POST['idUsuario']);
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
                    <div class="card-header">Novo Usuário</div>
                    <div class="card-body">
                        <hr>
                        <form enctype="application/x-www-form-urlencoded" action="" method="post">

                            <div class="form-group">
                                <label for="divisao" class="control-label mb-1">Divisão</label>
                                <select name="divisao" id="" class="form-control" required>
                                    <option></option>
                                    <?php
                                    $divisoes -> selectDivisoes();
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

        </div>
    </div>
</div>

<!-- FIM FORM -->

<!-- EDIÇÃO USUARIO -->

<div class="modal fade" id="formEditarUsuarios" tabindex="-1" role="dialog" aria-labelledby="formEditarUsuariosTitle"
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
                    <div class="card-header">Edição de Usuário</div>
                    <div class="card-body">
                        
                        <form action="" method="post">

                        <div id="statusDados" class="text-center">
                    Ativo <input type="radio" name="status" id="statusEdicao" value="0" class="mr-2">
                    Inativo <input type="radio" name="status" id="statusEdicao" value="1">
</div>
<hr>

                            <div class="form-group">
                                <label for="divisao" class="control-label mb-1">Divisão</label>
                                <select name="divisaoEdicao" id="" class="form-control" disabled>
                                    <option></option>
                                    <?php
                                    $divisoes -> selectDivisoes();
                                    ?>
                                </select>
                                <small class="text-danger" id="divisaoUsuario"></small>
                            </div>

                            <div class="form-group">
                                <label for="grau" class="control-label mb-1">Grau</label>
                                <select name="grauEdicao" class="form-control" id="grau">
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
                                <small class="text-danger" id="grauUsuario"></small>

                            </div>

                            <div class="form-group">
                                <label for="acesso" class="control-label mb-1">Acesso</label>
                                <select name="acessoEdicao" class="form-control" id="acesso">
                                    <option></option>
                                    <option value="0">Administrador</option>
                                    <option value="1">Social</option>
                                    <option value="2">Integrante</option>
                                </select>
                                <small class="text-danger" id="acessoUsuario"></small>

                            </div>

                            <div class="form-group">
                                <label for="path" class="control-label mb-1">Patch</label>
                                <input id="pathUsuario" name="pathEdicao" type="text" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="email" class="control-label mb-1">Email</label>
                                <input id="emailUsuario" name="emailEdicao" type="email" class="form-control" required>
                                <input type="hidden" name="id" id="idEdicao">

                            </div>

                    <div>

                                <button type="submit" class="btn btn-lg btn-info btn-block" name="botao" value="editar">
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

<!-- FIM EDIÇÃO -->

<!-- FORM EXCLUIR MODAL -->

<div class="modal fade" id="formExcluirUsuarios" tabindex="-1" role="dialog" aria-labelledby="formExcluirUsuariosTitle"
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
                                <input id="idExcluirUsuario" name="idUsuario" type="text" class="form-control" aria-required="true"
                                    aria-invalid="false" hidden>
                                    <h1 id="nomeExcluirUsuario" class="text-center text-uppercase text-danger"></h1>
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
                <h3 class="title-5 m-b-35">USUÁRIOS</h3>
                <div class="table-data__tool">
                    <div class="table-data__tool-left">

                        <div class="rs-select2--light rs-select2--sm">

                        </div>

                    </div>
                    <div class="table-data__tool-right">


                        <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal"
                            data-target="#formDivisao">
                            <i class="zmdi zmdi-plus"></i>
                            Incluir usuário
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
                                <th>patch</th>
                                <th>email</th>
                                <th>grau</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                $usuarios -> listaUsuarios();

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
        let divisao = document.querySelector('#divisaoUsuario')
        let grau = document.querySelector('#grauUsuario')
        let acesso = document.querySelector('#acessoUsuario')
        let pai = document.querySelector('#statusDados')
        let email = document.querySelector('#emailUsuario')
        let path = document.querySelector('#pathUsuario')


        id.value = dadosBanco[1]
        divisao.innerHTML = dadosBanco[6]
        grau.innerHTML = dadosBanco[3]
        acesso.innerHTML = dadosBanco[4]
        email.value = dadosBanco[5]
        path.value = dadosBanco[2]


       if(dadosBanco[0] == 0){
        pai.innerHTML = 'Ativo <input type="radio" name="status" id="statusEdicao" value="0" class="mr-2" checked>Inativo <input type="radio" name="status" id="statusEdicao" value="1">'
        }
        else{
        pai.innerHTML = 'Ativo <input type="radio" name="status" id="statusEdicao" value="0" class="mr-2">Inativo <input type="radio" name="status" id="statusEdicao" value="1" checked>'
        }
console.log(valor)
        //divisao.value = dadosBanco[2]

    }

    //EXCLUIR
        function exclusao(valor){
            let dadosBanco = valor.split('-')

            let usuarioid = document.querySelector('#idExcluirUsuario')
            let usuarioPath = document.querySelector('#nomeExcluirUsuario')

            usuarioid.value = dadosBanco[0]
            usuarioPath.textContent = dadosBanco[1]

        }
</script>