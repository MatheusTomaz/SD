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

    <body ng-app="moduloItemGrupo" ng-controller="controllerItemGrupo">

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
            <div class="itemGrupo">
                <h3> Grupo: Casa <div class="pull-right"><button onclick="location.href='grupos.php'">Voltar</button></div></h3>
                <div class="atalhos">
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="saldoGrupo background-opacity">
                                <h5>SALDO</h5>
                                <div class="saldoGrupo-content pull-right">
                                    <p class="saldo-positivo">R$ 380,00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="btnGrupo background-opacity">
                                <button ng-click="abaPrincipal()">
                                    CASA
                                </button>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="btnGrupo background-opacity">
                                <button ng-click="abaCompras()">
                                    <i class="fa fa-plus"></i> COMPRAS
                                </button>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="btnGrupo background-opacity">
                                <button ng-click="abaContas()">
                                    <i class="fa fa-plus"></i> CONTAS
                                </button>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="btnGrupo background-opacity">
                                <button ng-click="abaDividas()">
                                    <i class="fa fa-plus"></i> DÍVIDAS
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="principal">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button ng-click="abrirModalAddMembro()" class="btnAddAbas"><i class="fa fa-plus"></i> Adicionar Membro</button>
                                    </div>
                                </div>
                                <accordion close-others="true">
                                    <accordion-group is-open="membro1.open">
                                        <accordion-heading>
                                            Carlos <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': membro1.open, 'glyphicon-chevron-right': !membro1.open}"></i>
                                        </accordion-heading>
                                        This is just some content to illustrate fancy headings.
                                    </accordion-group>
                                    <accordion-group is-open="membro2.open">
                                        <accordion-heading>
                                            Gabriel <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': membro2.open, 'glyphicon-chevron-right': !membro2.open}"></i>
                                        </accordion-heading>
                                        This is just some content to illustrate fancy headings.
                                    </accordion-group>
                                    <accordion-group is-open="membro3.open">
                                        <accordion-heading>
                                            Gustavo <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': membro3.open, 'glyphicon-chevron-right': !membro3.open}"></i>
                                        </accordion-heading>
                                        This is just some content to illustrate fancy headings.
                                    </accordion-group>
                                </accordion>
                            </div>
                            <div id="contas" style="display:none;">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button ng-click="abrirModalAddConta()" class="btnAddAbas"><i class="fa fa-plus"></i> Adicionar Conta</button>
                                    </div>
                                </div>
                                <accordion close-others="true">
                                    <accordion-group is-open="contas1.open">
                                        <accordion-heading>
                                            Conta 1 <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': contas1.open, 'glyphicon-chevron-right': !contas1.open}"></i>
                                        </accordion-heading>
                                        This is just some content to illustrate fancy headings.
                                    </accordion-group>
                                    <accordion-group is-open="contas2.open">
                                        <accordion-heading>
                                            Conta 2 <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': contas2.open, 'glyphicon-chevron-right': !contas2.open}"></i>
                                        </accordion-heading>
                                        This is just some content to illustrate fancy headings.
                                    </accordion-group>
                                    <accordion-group is-open="contas3.open">
                                        <accordion-heading>
                                            Conta 3 <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': contas3.open, 'glyphicon-chevron-right': !contas3.open}"></i>
                                        </accordion-heading>
                                        This is just some content to illustrate fancy headings.
                                    </accordion-group>
                                </accordion>
                            </div>
                            <div id="compras" style="display:none;">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button ng-click="abrirModalAddCompra()" class="btnAddAbas"><i class="fa fa-plus"></i> Adicionar Compra</button>
                                    </div>
                                </div>
                                <accordion close-others="true">
                                    <accordion-group is-open="status1.open">
                                        <accordion-heading>
                                            Compra 1 <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': status1.open, 'glyphicon-chevron-right': !status1.open}"></i>
                                        </accordion-heading>
                                        This is just some content to illustrate fancy headings.
                                    </accordion-group>
                                    <accordion-group is-open="status2.open">
                                        <accordion-heading>
                                            Compra 2 <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': status2.open, 'glyphicon-chevron-right': !status2.open}"></i>
                                        </accordion-heading>
                                        This is just some content to illustrate fancy headings.
                                    </accordion-group>
                                    <accordion-group is-open="status3.open">
                                        <accordion-heading>
                                            Compra 3 <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': status3.open, 'glyphicon-chevron-right': !status3.open}"></i>
                                        </accordion-heading>
                                        This is just some content to illustrate fancy headings.
                                    </accordion-group>
                                </accordion>
                            </div>
                            <div id="dividas" style="display:none;">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button ng-click="abrirModalAddDivida()" class="btnAddAbas"><i class="fa fa-plus"></i> Adicionar Dívida</button>
                                    </div>
                                </div>
                                <accordion close-others="true">
                                    <accordion-group is-open="divida1.open">
                                        <accordion-heading>
                                            Dívida 1 <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': divida1.open, 'glyphicon-chevron-right': !divida1.open}"></i>
                                        </accordion-heading>
                                        This is just some content to illustrate fancy headings.
                                    </accordion-group>
                                    <accordion-group is-open="divida2.open">
                                        <accordion-heading>
                                            Dívida 2 <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': divida2.open, 'glyphicon-chevron-right': !divida2.open}"></i>
                                        </accordion-heading>
                                        This is just some content to illustrate fancy headings.
                                    </accordion-group>
                                    <accordion-group is-open="divida3.open">
                                        <accordion-heading>
                                            Dívida 3 <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': divida3.open, 'glyphicon-chevron-right': !divida3.open}"></i>
                                        </accordion-heading>
                                        This is just some content to illustrate fancy headings.
                                    </accordion-group>
                                </accordion>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div>
            <script type="text/ng-template" id="idModalAddMembro">
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

        <div>
            <script type="text/ng-template" id="idModalAddCompra">
                <div class="modal-header">
                    <button type="button" ng-click="fechar()" class="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4>Adicionar Compra</h4>
                </div>
                <div class="modal-body" align="center">
                    <form id="inputFormModal" role="search">
                        <div class="form-group">
                            Título: <input type="text" name="tituloCompra"/>
                            Valor: <input type="text" name="valorCompra"/>
                            Descricão: <textarea></textarea>
                            Membros:
                            <div class="input-group">
                                <input type="text" id="inputSearchModal" autofocus autocomplete="off" ng-keyup="pesquisar(search)" ng-model="search" class="form-control">
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
                    <button class="btn btn-default">Adicionar Compra</button>
                    <button class="btn btn-default" ng-click="fechar()">fechar</button>
                </div>
            </script>
        </div>

        <div>
            <script type="text/ng-template" id="idModalAddConta">
                <div class="modal-header">
                    <button type="button" ng-click="fechar()" class="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4>Adicionar Conta</h4>
                </div>
                <div class="modal-body" align="center">
                    <form id="inputFormModal" role="search">
                        <div class="form-group">
                            Título: <input type="text" name="tituloConta"/>
                            Valor: <input type="text" name="valorConta"/>
                            Descricão: <textarea></textarea>
                            Membros:
                            <div class="input-group">
                                <input type="text" id="inputSearchModal" autofocus autocomplete="off" ng-keyup="pesquisar(search)" ng-model="search" class="form-control">
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
                    <button class="btn btn-default">Adicionar Conta</button>
                    <button class="btn btn-default" ng-click="fechar()">fechar</button>
                </div>
            </script>
        </div>

        <div>
            <script type="text/ng-template" id="idModalAddDivida">
                <div class="modal-header">
                    <button type="button" ng-click="fechar()" class="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4>Adicionar Dívida</h4>
                </div>
                <div class="modal-body" align="center">
                    <form id="inputFormModal" role="search">
                        <div class="form-group">
                            Título: <input type="text" name="tituloDivida"/>
                            Valor: <input type="text" name="valorDivida"/>
                            Descricão: <textarea></textarea>
                            Membro:
                            <div class="input-group">
                                <input type="text" id="inputSearchModal" autofocus autocomplete="off" ng-keyup="pesquisar(search)" ng-model="search" class="form-control">
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
                    <button class="btn btn-default">Adicionar Dívida</button>
                    <button class="btn btn-default" ng-click="fechar()">fechar</button>
                </div>
            </script>
        </div>

        <!-- FIM CONTEUDO DASHBOARD -->

        <script src="assets/js/jquery-2.1.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/angular.min.js"></script>
        <script src="assets/js/ui-bootstrap.min.js"></script>
        <script src="controller/itemGrupoController.js"></script>




    </body>
</html>
