<html>
    <?php
        session_start();
        define( 'DS', DIRECTORY_SEPARATOR );
        define( 'BASE_DIR', dirname(dirname( __FILE__ )) . DS );
        require_once BASE_DIR . 'sd_app' . DS . 'config' . DS . 'logarController.php';
        require_once BASE_DIR . 'sd_app' . DS . 'controller' . DS . 'dashboardController.php';
        $login = new loginController();
        $login->verificar();
    ?>
    <head>
        <meta charset="utf-8">
        <title>DASHBOARD</title>
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/css/c3.css" rel="stylesheet">
        <link href="assets/css/sd.css" rel="stylesheet">
        <link href="assets/css/fullcalendar.css" rel="stylesheet">
    </head>

    <body ng-app="moduloDashboard" ng-controller="controllerDashboard">

        <!-- MENU DASHBOARD -->

        <section class="menu">

            <!-- MENU TOP -->

            <nav class="navbar navbar-default navbar-fixed-top menu-top" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">SisDiv</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Busca">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                                    </span>
                                </div><!-- /input-group -->
                            </div>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <span class="badge">42</span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href ng-click="buscaSolicitacao(<?=$_SESSION['id']?>)" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <span class="badge">{{numSolicitacao}}</span></a>
                                <ul class="solicitacoes dropdown-menu" role="menu">
                                    <li class="titulo"><h6>Solicitações ({{numSolicitacao}})</h6></li>
                                    <li class="solicitacao" ng-repeat="solicitacao in solicitacoes">
                                        <img class="pull-left" src="<?php echo($_SESSION['img']) ?>">
                                        <div class="texto">
                                            {{solicitacao.nome}}
                                            <button class="pull-right btn-recusar">
                                                Recusar
                                            </button>
                                            <button class="pull-right btn-aceitar">
                                                Aceitar
                                            </button>
                                        </div>
                                    </li>

                                    <li class="rodape"></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>

            <!-- FIM MENU TOP -->

            <!-- MENU LATERAL -->

            <div class="menu-lateral">
                <div class="background-rounded" align="center">
                    <img src="<?php echo($_SESSION['img']) ?>" class="img-circle">
                    <br/><br/>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?php echo($_SESSION['nome']) ?> &nbsp;<span class="caret"></span></button>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Configurações de usuário</a></li>
                            <li class="divider"></li>
                            <li><a href="login.php?logout=1">Logout</a></li>
                        </ul>
                    </div>
                    <hr>
                    <ul>
                        <li><a href="#"><i class="fa fa-line-chart"></i> &nbsp;Mensagem</a></li>
                        <li><a href="#"><i class="fa fa-group"></i> &nbsp;Estatísticas</a></li>
                        <li><a href="#"><i class="fa fa-meh-o"></i> &nbsp;Configurações</a></li>
                    </ul>
                </div>
                <ul class="background-rounded-menu">
                    <li><a href="index.php"><i class="fa fa-line-chart"></i> &nbsp;Dashboard</a></li>
                    <li><a href="grupos.php"><i class="fa fa-group"></i> &nbsp;Grupos</a></li>
                    <li><a href="amigos.php"><i class="fa fa-meh-o"></i> &nbsp;Amigos</a></li>
                </ul>
            </div>

            <!-- FIM MENU LATERAL -->

        </section>

        <!-- FIM MENU DASHBOARD -->

        <!-- CONTEUDO DASHBOARD -->

        <section class="conteudo">
            <div class="dashboard">
                <h3> Dashboard </h3>
                <div class="content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="dividendos background-opacity">
                                <h5>GRUPOS QUE VOCÊ DEVE</h5>
                                <div class="dividendos-content">
                                    <ul>
                                        <li>Lorem ipsum lorem ipsum</li>
                                        <li>Lorem ipsum lorem ipsum</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="devedores background-opacity">
                                <h5>GRUPOS QUE DEVEM PRA VOCÊ</h5>
                                <div class="devedores-content">
                                    <ul>
                                        <li>Lorem ipsum lorem ipsum</li>
                                        <li>Lorem ipsum lorem ipsum</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row l2">
                        <div class="col-md-3">
                            <div class="saldo background-opacity">
                                <h5>SALDO</h5>
                                <div class="saldo-content">
                                    <p class="saldo-valor">R$ 380,00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                           <div class="informacoes background-opacity">
                                <h5>INFORMAÇÕES</h5>
                                <div class="info-content">
                                    <ul>
                                        <li>Lorem ipsum lorem ipsum</li>
                                        <li>Lorem ipsum lorem ipsum</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row l3">
                        <div class="col-md-6">
                            <div class="calendario background-opacity">
                                <h5>CALENDÁRIO</h5>
                                <div id='calendar'></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="grafico background-opacity">
                                <h5>GRÁFICO</h5>
                                <div class="grafico-content">
                                    <div id="chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FIM CONTEUDO DASHBOARD -->

        <script type="text/javascript" src="assets/js/c3.min.js"></script>
        <script src="assets/js/d3.min.js" charset="utf-8"></script>
        <script src="assets/js/jquery-2.1.1.min.js"></script>
        <script src="assets/js/angular.min.js"></script>
        <script src="assets/js/ui-bootstrap.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src='assets/js/moment.js'></script>
        <script src='assets/js/fullcalendar.js'></script>
        <script src='assets/js/lang-all.js'></script>
        <script src="controller/dashboardController.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                var chart = c3.generate({
                    bindto: '#chart',
                    data: {
                      columns: [
                        ['data1', 30, 200, 100, 400, 150, 250],
                        ['data2', 50, 20, 10, 40, 15, 25]
                      ]
                    }
                });
                $('.dropdown-menu').click(function(event){
                    event.stopPropagation();
                });

                $('#calendar').fullCalendar({
                    lang: 'pt-br',
                    events: [
                        {
                            title: 'Event1',
                            start: '2014-12-09'
                        },
                        {
                            title: 'Event2',
                            start: '2014-12-24'
                        }
                        // etc...
                    ],
                    color: 'yellow',   // an option!
                    textColor: 'black' // an option!

                })
            });
        </script>

    </body>
</html>
