<html>
    <?php
        session_start();
        // require_once('controller/cadastroController.php');
        define( 'DS', DIRECTORY_SEPARATOR );
        define( 'BASE_DIR', dirname(dirname( __FILE__ )) . DS );
        require_once BASE_DIR . 'sd_app' . DS . 'config' . DS . 'logarController.php';
        require_once BASE_DIR . 'sd_app' . DS . 'controller' . DS . 'cadastroController.php';
        $login = new loginController();
        $usuarioD = new cadastroController();
        $usuarioD->buscarDados();
        $login->verificarLogin();
        $usuarioD->verificarCadastro();
    ?>
    <head>
        <meta charset="utf-8">
        <title>DASHBOARD</title>
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/css/sd.css" rel="stylesheet">
        <link href="assets/css/bootstrap-social.css" rel="stylesheet">
    </head>

    <body class="cadastro">

        <!-- LOGIN -->

        <div class="panel panel-default">
            <div class="panel-body">

                <h4>SD - Cadastro</h4>
                <?=$usuarioD->msg;?>
                <img class="img-circle" src="<?=$_SESSION['img']?>"/>
                <form action="cadastro.php" method="post">
                    <div class="form-group">
                        <label class="pull-left">Nome: </label>
                        <input name="nome" type="text" value="<?=$_SESSION['nome']?>" readonly placeholder="E-mail"/>
                    </div>
                    <div class="form-group">
                        <label class="pull-left">E-mail:</label>
                        <input name="email" type="text" value="<?=$_SESSION['email']?>" readonly placeholder="E-mail"/>
                    </div>
                    <div class="form-group">
                        <label class="pull-left">Senha:</label>
                        <input name="senha" type="password" placeholder="*********"/>
                    </div>
                    <div class="form-group">
                        <label class="pull-left">Confirmar Senha:</label>
                        <input name="confirmarSenha" type="password" placeholder="*********"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Cadastrar">
                    </div>
                </form>

            </div>
        </div>




        <!-- FIM LOGIN -->

        <script>
          window.fbAsyncInit = function() {
            FB.init({
              appId      : '1597162270524261',
              xfbml      : true,
              version    : 'v2.3'
            });
          };

          (function(d, s, id){
             var js, fjs = d.getElementsByTagName(s)[0];
             if (d.getElementById(id)) {return;}
             js = d.createElement(s); js.id = id;
             js.src = "//connect.facebook.net/en_US/sdk.js";
             fjs.parentNode.insertBefore(js, fjs);
           }(document, 'script', 'facebook-jssdk'));
        </script>

        <script src="assets/js/jquery-2.1.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/angular.min.js"></script>
        <script src="assets/js/ui-bootstrap.min.js"></script>




    </body>
</html>
