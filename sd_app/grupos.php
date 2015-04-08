<html>
    <head>
        <meta charset="utf-8">
        <title>DASHBOARD</title>
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/css/c3.css" rel="stylesheet">
        <link href="assets/css/sd.css" rel="stylesheet">
        <link href="assets/css/fullcalendar.css" rel="stylesheet">
    </head>

    <body ng-app="moduloGrupos" ng-controller="controllerGrupos">

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
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <span class="badge">42</span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
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
                    <img src="assets/img/user.jpg" class="img-circle">
                    <br/><br/>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Matheus Tomaz &nbsp;<span class="caret"></span></button>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Configurações de usuário</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Logout</a></li>
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
                    <li><a href="#"><i class="fa fa-group"></i> &nbsp;Grupos</a></li>
                    <li><a href="#"><i class="fa fa-meh-o"></i> &nbsp;Amigos</a></li>
                </ul>
            </div>

            <!-- FIM MENU LATERAL -->

        </section>

        <!-- FIM MENU DASHBOARD -->

        <!-- CONTEUDO DASHBOARD -->

        <section class="conteudo">
            <div class="grupos">
                <h3> Meus Grupos <div class="pull-right"><button ng-click="abrirModalModificarConta(conta)">Criar grupo +</button></div></h3>
                <div class="content">
                    <div class="row">
                        <div class="col-md-12">
                           <div class="convites background-opacity">
                                <h5>CONVITES</h5>
                                <div class="convites-content">
                                    <ul>
                                        <li>Lorem ipsum lorem ipsum</li>
                                        <li>Lorem ipsum lorem ipsum</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grupo">
                        <div class="row">
                            <div class="col-md-4">
                               <div class="background-opacity">
                                    <h5>Grupo 1</h5>
                                    <div class="grupo-content">
                                        <div class="row">
                                            <div class="col-md-7">Carlos Henrique</div>
                                            <div class="col-md-5">R$ 360,00</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-7">Gabriel Cardoso</div>
                                            <div class="col-md-5">R$ 360,00</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-7">Gustavo Gonçalves</div>
                                            <div class="col-md-5">R$ 360,00</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-7">Matheus Tomaz</div>
                                            <div class="col-md-5">R$ 360,00</div>
                                        </div>
                                        <hr>
                                        <div class="row saldo-grupo">
                                            <div class="col-md-12">
                                                Saldo: <span class="valor">R$ 360,00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                               <div class="background-opacity">
                                    <h5>Grupo 2</h5>
                                    <div class="grupo-content">
                                        <div class="row">
                                            <div class="col-md-7">Carlos Henrique</div>
                                            <div class="col-md-5">R$ 360,00</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-7">Gabriel Cardoso</div>
                                            <div class="col-md-5">R$ 360,00</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-7">Gustavo Gonçalves</div>
                                            <div class="col-md-5">R$ 360,00</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-7">Matheus Tomaz</div>
                                            <div class="col-md-5">R$ 360,00</div>
                                        </div>
                                        <hr>
                                        <div class="row saldo-grupo">
                                            <div class="col-md-12">
                                                Saldo: <span class="valor">R$ 360,00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                               <div class="background-opacity">
                                    <h5>Grupo 3</h5>
                                    <div class="grupo-content">
                                        <div class="row">
                                            <div class="col-md-7">Carlos Henrique</div>
                                            <div class="col-md-5">R$ 360,00</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-7">Gabriel Cardoso</div>
                                            <div class="col-md-5">R$ 360,00</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-7">Gustavo Gonçalves</div>
                                            <div class="col-md-5">R$ 360,00</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-7">Matheus Tomaz</div>
                                            <div class="col-md-5">R$ 360,00</div>
                                        </div>
                                        <hr>
                                        <div class="row saldo-grupo">
                                            <div class="col-md-12">
                                                Saldo: <span class="valor">R$ 360,00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div>
            <script type="text/ng-template" id="idModalGrupos">
                <div class="modal-header">
                    <button type="button" ng-click="fechar()" class="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body" align="center">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" ng-click="fechar()">fechar</button>
                </div>
            </script>
        </div>

        <!-- FIM CONTEUDO DASHBOARD -->

        <script src="assets/js/jquery-2.1.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/angular.min.js"></script>
        <script src="assets/js/ui-bootstrap.min.js"></script>
        <script src="controller/gruposController.js"></script>


    </body>
</html>
