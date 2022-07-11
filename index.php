<?php
error_reporting(0);
require 'classes/load.php';

session_start();
$acao = new Acoes;
$divisao = new Divisoes;

User::policia($_SESSION['email'], $_SESSION['senha']);
$dadosUsuarioLogado = User::usuarioLogado($_SESSION['usuario']);

/********************************************* FUNÇÕES PARA URL AMIGAVEL *********************/
$inicio = 'dashboard';
$atual		=		(isset($_GET['pg'])) ? $_GET['pg'] : $inicio;
$pasta		=		'modulos';
$permissao	=		array(
    '404',
    'dashboard',
    'divisoes',
    'usuarios',
    'meusDados',
    'sair'
);

if(substr_count($atual, '/') > 0){
$atual		=	explode('/', $atual);
$pagina		=	(file_exists("{$pasta}/".$atual[0].'.php') && in_array($atual[0], $permissao)) ? $atual[0] : '404';
$id		=		intval($atual[1]);
}
else{
$pagina		=	(file_exists("{$pasta}/".$atual.'.php') && in_array($atual, $permissao)) ? $atual : '404';
$id = 0;
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Social Regional BH">
    <meta name="author" content="Raphael Guerra">
    <meta name="keywords"
        content="Raphael Guerra, ti, insanos mc, insanos, moto clube, desenvolvimento de sites, desenvolvimento de softwares">

    <title>Insanos MC - Regional BH</title>

    <!-- Fonts CSS-->
    <link href="<?= $caminho ?>/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?= $caminho ?>/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?= $caminho ?>/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?= $caminho ?>/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo:ital@1&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS-->
    <link href="<?= $caminho ?>/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?= $caminho ?>/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?= $caminho ?>/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?= $caminho ?>/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?= $caminho ?>/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?= $caminho ?>/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?= $caminho ?>/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?= $caminho ?>/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?= $caminho ?>/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo" style="margin: 60px 0 0 100px;">
                        <a href="#">
                            <img src="<?= $caminho ?>/images/icon/logo-white.png" alt="Insanos" width="100" height="50" />
                        </a>
                    </div>
                    <div class="header__navbar" style="margin-top: 4rem;">
                        <ul class="list-unstyled">
                            <li>
                                <a href="<?= $caminho ?>/dashboard">
                                    <i class="fas fa-tachometer-alt"></i>
                                    <span class="bot-line"></span>Dashboard</a>
                            </li>

                            <li>
                                <a href="<?= $caminho ?>/divisoes">
                                    <i class="fa fa-sitemap" aria-hidden="true"></i>
                                    <span class="bot-line"></span>Divisões</a>
                            </li>
<?php
if($_SESSION['acesso'] == 0){
?>
                            <li>
                                <a href="<?= $caminho ?>/usuarios">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    <span class="bot-line"></span>Usuários</a>
                            </li>

                            <li class="has-sub">
                                <a href="#">
                                    <i class="fa fa-handshake-o" aria-hidden="true"></i>
                                    <span class="bot-line"></span>Ações</a>
                                <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="<?= $caminho ?>/acoes">Ação Social</a>
                                    </li>
                                    <li>
                                        <a href="#">Participantes</a>
                                    </li>

                                </ul>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="header__tool">
                        <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix js-item-menu">
                                <div class="image">
                                    <img src="<?= $caminho ?>/images/icon/insano.png" alt="<?= $dadosUsuarioLogado['path'] ?>" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#"><?= $dadosUsuarioLogado['path'] ?></a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="<?= $caminho ?>/images/icon/insano.png" alt="<?= $dadosUsuarioLogado['path'] ?>" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#"><?= $dadosUsuarioLogado['path'] ?></a>
                                            </h5>
                                            <span class="email"><?= $dadosUsuarioLogado['email'] ?></span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                        <a href="<?=$caminho?>/meusDados">
                                                <i class="zmdi zmdi-account"></i>Meus Dados</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="<?= $caminho ?>/sair">
                                            <i class="zmdi zmdi-power"></i>Sair</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- FIM HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        <header class="header-mobile header-mobile-2 d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="<?= $caminho ?>/images/icon/logo-white.png" alt="Insanos" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="<?= $caminho ?>/dashboard">
                                <i class="fas fa-tachometer-alt"></i>
                                <span class="bot-line"></span>Dashboard</a>
                        </li>

                        <li>
                            <a href="<?= $caminho ?>/divisoes">
                                <i class="fa fa-sitemap" aria-hidden="true"></i>
                                <span class="bot-line"></span>Divisões</a>
                        </li>
                        <?php
if($_SESSION['acesso'] == 0){
?>
                        <li>
                            <a href="<?= $caminho ?>/usuarios">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span class="bot-line"></span>Usuários</a>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-handshake-o" aria-hidden="true"></i>
                                Ações</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="<?= $caminho ?>/acoes">Ação Social</a>
                                </li>
                                <li>
                                    <a href="#">Participantes</a>
                                </li>

                            </ul>
                        </li>
                        <?php } ?>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="sub-header-mobile-2 d-block d-lg-none">
            <div class="header__tool">
                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu">
                        <div class="image">
                            <img src="<?= $caminho ?>/images/icon/insano.png" alt="<?= $dadosUsuarioLogado['path'] ?>" />
                        </div>
                        <div class="content">
                            <a class="js-acc-btn" href="#"><?= $dadosUsuarioLogado['path'] ?></a>
                        </div>
                        <div class="account-dropdown js-dropdown">
                            <div class="info clearfix">
                                <div class="image">
                                    <a href="#">
                                        <img src="<?= $caminho ?>/images/icon/insano.png" alt="<?= $dadosUsuarioLogado['path'] ?>" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h5 class="name">
                                        <a href="#"><?= $dadosUsuarioLogado['path'] ?></a>
                                    </h5>
                                    <span class="email"><?= $dadosUsuarioLogado['email'] ?></span>
                                </div>
                            </div>
                            <div class="account-dropdown__body">
                                <div class="account-dropdown__item">
                                    <a href="<?=$caminho?>/meusDados">
                                        <i class="zmdi zmdi-account"></i>Meus Dados</a>
                                </div>
                            </div>
                            <div class="account-dropdown__footer">
                                <a href="<?= $caminho ?>/sair">
                                    <i class="zmdi zmdi-power"></i>Sair</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIM HEADER MOBILE -->

        <!-- CONTENT CONTAINER-->
        <div class="page-content--bgf7">

            <!-- APRESENTAÇÃO-->
            <section class="welcome p-t-10" >
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <h3 class="title-4 text-center title--sbold">Sistema de Gestão Social Insanos MC
                            </h3>
                            <h5 class="text-center">Divisão
                                 <?php

                                    $dadosDivisao = $divisao -> dadosDivisao($dadosUsuarioLogado['divisao']);
                                    print $dadosDivisao['divisao'];

                                  ?>
                            </h5>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>
            <!-- FIM APRESENTAÇÃO-->


            <!-- CONTEÚDO -->

            <?php
                require("{$pasta}/{$pagina}.php");
            ?>

            <!-- FIM CONTEÚDO -->

            </div>
            <!-- COPYRIGHT-->
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center mt-5">
                                <p class="h6">Copyright © <?=date("Y")?>. Todos direitos reservados. <a
                                        href="https://dev.guerra.app.br" target="_blank">Guerra Dev</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- FIM COPYRIGHT-->
    </div>

    <!-- Jquery JS-->
    <script src="<?= $caminho ?>/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?= $caminho ?>/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?= $caminho ?>/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?= $caminho ?>/vendor/slick/slick.min.js">
    </script>
    <script src="<?= $caminho ?>/vendor/wow/wow.min.js"></script>
    <script src="<?= $caminho ?>/vendor/animsition/animsition.min.js"></script>
    <script src="<?= $caminho ?>/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?= $caminho ?>/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?= $caminho ?>/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?= $caminho ?>/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?= $caminho ?>/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?= $caminho ?>/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?= $caminho ?>/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="<?= $caminho ?>/js/main.js"></script>

    <script>
        (function ($) {
  // USE STRICT
  "use strict";

  try {
    //bar chart
    var ctx = document.getElementById("barChart");
    if (ctx) {
      //ctx.height = 200;
      var myChart = new Chart(ctx, {
        type: 'bar',
        defaultFontFamily: 'Poppins',
        data: {
          labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
          datasets: [
            {
              label: "Ações Realizadas",
              data:
                [
                    <?php $acao -> acoesGrafico($dadosUsuarioLogado['divisao'], date('Y-1-1'))?>, 
                    <?php $acao -> acoesGrafico($dadosUsuarioLogado['divisao'], date('Y-2-1'))?>,
                    <?php $acao -> acoesGrafico($dadosUsuarioLogado['divisao'], date('Y-3-1'))?>,
                    <?php $acao -> acoesGrafico($dadosUsuarioLogado['divisao'], date('Y-4-1'))?>,
                    <?php $acao -> acoesGrafico($dadosUsuarioLogado['divisao'], date('Y-5-1'))?>,
                    <?php $acao -> acoesGrafico($dadosUsuarioLogado['divisao'], date('Y-6-1'))?>,
                    <?php $acao -> acoesGrafico($dadosUsuarioLogado['divisao'], date('Y-7-1'))?>,
                    <?php $acao -> acoesGrafico($dadosUsuarioLogado['divisao'], date('Y-8-1'))?>,
                    <?php $acao -> acoesGrafico($dadosUsuarioLogado['divisao'], date('Y-9-1'))?>,
                    <?php $acao -> acoesGrafico($dadosUsuarioLogado['divisao'], date('Y-10-1'))?>,
                    <?php $acao -> acoesGrafico($dadosUsuarioLogado['divisao'], date('Y-11-1'))?>,
                    <?php $acao -> acoesGrafico($dadosUsuarioLogado['divisao'], date('Y-12-1'))?>
                ],
              borderColor: "rgba(0, 123, 255, 0.9)",
              borderWidth: "0",
              backgroundColor: "rgba(0, 123, 255, 0.5)",
              fontFamily: "Poppins"
            },
            {
              label: "Integrantes Presentes",
              data:
                [
                    <?php $acao -> integrantesGrafico($dadosUsuarioLogado['divisao'], date('Y-1-1'))?>,
                    <?php $acao -> integrantesGrafico($dadosUsuarioLogado['divisao'], date('Y-2-1'))?>, 
                    <?php $acao -> integrantesGrafico($dadosUsuarioLogado['divisao'], date('Y-3-1'))?>, 
                    <?php $acao -> integrantesGrafico($dadosUsuarioLogado['divisao'], date('Y-4-1'))?>, 
                    <?php $acao -> integrantesGrafico($dadosUsuarioLogado['divisao'], date('Y-5-1'))?>, 
                    <?php $acao -> integrantesGrafico($dadosUsuarioLogado['divisao'], date('Y-6-1'))?>, 
                    <?php $acao -> integrantesGrafico($dadosUsuarioLogado['divisao'], date('Y-7-1'))?>,
                    <?php $acao -> integrantesGrafico($dadosUsuarioLogado['divisao'], date('Y-8-1'))?>,
                    <?php $acao -> integrantesGrafico($dadosUsuarioLogado['divisao'], date('Y-9-1'))?>,
                    <?php $acao -> integrantesGrafico($dadosUsuarioLogado['divisao'], date('Y-10-1'))?>,
                    <?php $acao -> integrantesGrafico($dadosUsuarioLogado['divisao'], date('Y-11-1'))?>,
                    <?php $acao -> integrantesGrafico($dadosUsuarioLogado['divisao'], date('Y-12-1'))?>

                ],
              borderColor: "rgba(0,0,0,0.09)",
              borderWidth: "0",
              backgroundColor: "rgba(0,0,0,0.07)",
              fontFamily: "Poppins"
            }
          ]
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          scales: {
            xAxes: [{
              ticks: {
                fontFamily: "Poppins"

              }
            }],
            yAxes: [{
              ticks: {
                beginAtZero: true,
                fontFamily: "Poppins",
                stepSize: 1
              }
            }]
          }
        }
      });
    }


  } catch (error) {
    console.log(error);
  }

})(jQuery);

    </script>

</body>

</html>