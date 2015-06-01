<html>
    <?php
        require_once('config/loginfacebook.php');
        session_start();
        print_r($_SESSION);
        define( 'DS', DIRECTORY_SEPARATOR );
        define( 'BASE_DIR', dirname(dirname( __FILE__ )) . DS );
        require_once BASE_DIR . 'sd_app' . DS . 'config' . DS . 'logarController.php';
        $login = new loginController();
        $login->verificarLogin();
    ?>
    <head>
        <meta charset="utf-8">
        <title>DASHBOARD</title>
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/css/sd.css" rel="stylesheet">
        <link href="assets/css/bootstrap-social.css" rel="stylesheet">
    </head>

    <body class="login">

        <!-- LOGIN -->

        <div class="panel panel-default">
            <div class="panel-body">

                <h4>SD - Sistema de Dívidas</h4>

                <?=$login->msg;?>

                <form action="login.php" method="post">
                    <div class="form-group">
                        <input name="email" type="text" placeholder="E-mail"/>
                    </div>
                    <div class="form-group">
                        <input name="senha" type="password" placeholder="Senha"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Entrar">
                    </div>
                    <div class="form-group">
                        <a class="btn btn-social btn-facebook" href="https://www.facebook.com/dialog/oauth?client_id=1597162270524261&redirect_uri=http://192.168.0.108/SD/sd_app/login.php&scope=email">
                            <i class="fa fa-facebook"></i> Entrar com Facebook
                        </a>
                        <input name="x" type="hidden" value="x"/>
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
