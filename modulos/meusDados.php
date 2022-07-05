<?php

if($_POST['botao'] == 'editar'){
    User::meusDados($_POST['idUsuario'], $_POST['senha'], $_POST['novaSenha'], $_POST['email']);
}

?>
            <!-- MAIN CONTENT-->
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div class="card">
                                <div class="card-header">Meus Dados</div>
                                <div class="card-body card-block">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>

                                                <input type="text" id="username" name="path" placeholder="Patch" value="<?=$dadosUsuarioLogado['path']?>" class="form-control" disabled>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                </div>

                                                <input type="email" id="email" name="email" placeholder="Email" value="<?=$dadosUsuarioLogado['email']?>" class="form-control" required>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-asterisk"></i>
                                                </div>

                                                <input type="hidden"  name="senha" value="<?=$dadosUsuarioLogado['senha']?>" class="form-control">
                                                <input type="hidden"  name="idUsuario" value="<?=$dadosUsuarioLogado['id']?>" class="form-control">

                                                <input type="password" id="password" name="novaSenha" placeholder="Senha" class="form-control">

                                            </div>
                                        </div>
                                        <div class="form-actions form-group">
                                            <button type="submit" class="btn btn-success btn-sm" name="botao" value="editar">Editar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>