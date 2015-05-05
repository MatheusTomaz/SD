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

    <body ng-app="moduloAmigos" ng-controller="controllerAmigos">

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
                    <li><a href="grupos.php"><i class="fa fa-group"></i> &nbsp;Grupos</a></li>
                    <li><a href="amigos.php"><i class="fa fa-meh-o"></i> &nbsp;Amigos</a></li>
                </ul>
            </div>

            <!-- FIM MENU LATERAL -->

        </section>

        <!-- FIM MENU DASHBOARD -->

        <!-- CONTEUDO DASHBOARD -->

        <section class="conteudo">
            <div class="amigos">
                <div class="titulo-h3">
                    <div class="form-group">
                        <h3> Amigos <div class="pull-right"><button ng-click="abrirModalGrupos(conta)">Pesquisar Amigos +</button></div></h3>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <input type="text" id="inputSearchModal" autofocus autocomplete="off" ng-keyup="pesquisar(search)" ng-model="search" class="form-control" placeholder="Busca">
                                            <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="busca-amigos background-opacity">
                                <div class="busca-amigos-content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="amigo-item">
                                                <img class="pull-left" src="assets/img/user.jpg">
                                                <div class="texto">
                                                    <div class="col-xs-8">
                                                        <h5>Matheus Tomaz</h5>
                                                        Lavras - MG
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <button>
                                                            <i class="fa fa-check"></i> Amigos
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="amigo-item">
                                                <div class="pull-left">
                                                    <img src="assets/img/user.jpg">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="amigo-item">
                                                <div class="pull-left">
                                                    <img src="assets/img/user.jpg">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="amigo-item">
                                                <div class="pull-left">
                                                    <img src="assets/img/user.jpg">
                                                </div>
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
            <script type="text/ng-template" id="idModalPesquisarAmigos">
                <div class="modal-header">
                    <button type="button" ng-click="fechar()" class="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4>Criar Grupo</h4>
                </div>
                <div class="modal-body" align="center">
                    <form id="inputFormModal" role="search">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" id="inputSearchModal" autofocus autocomplete="off" ng-keyup="pesquisar(search)" ng-model="search" class="form-control" placeholder="Busca">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                                </span>
                            </div><!-- /input-group -->
                        </div>

                        <div id="autocomplete" class="autocomplete" style="display:none;">
                            <div id="item{{dica.id}}" class="linhas" ng-repeat="dica in dicas">
                                <button ng-click="selecionarPesquisa(dica.id)">
                                    <img src="assets/img/user.jpg" class="img-circle"><span id="nome{{dica.id}}" value="{{dica.nome}}"> &nbsp;{{dica.nome}}</span>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div id="bodyModal" class="body">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default">Criar Grupo</button>
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