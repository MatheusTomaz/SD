<?php
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['code'])){

      // Informe o seu App ID abaixo
      $appId = '1597162270524261';

      // Digite o App Secret do seu aplicativo abaixo:
      $appSecret = '3250f5bcea5359863d7a8cb8001747d5';

      // Url informada no campo "Site URL"
      $redirectUri = urlencode('http://192.168.0.108/SD/sd_app/login.php');

      // Obtém o código da query string
      $code = $_GET['code'];

      // Monta a url para obter o token de acesso e assim obter os dados do usuário
      $token_url = "https://graph.facebook.com/oauth/access_token?"
      . "client_id=" . $appId . "&redirect_uri=" . $redirectUri
      . "&client_secret=" . $appSecret . "&code=" . $code;

      echo ($token_url);
      //pega os dados
      $response = @file_get_contents($token_url);
      if($response){
        $params = null;
        parse_str($response, $params);
        if(isset($params['access_token']) && $params['access_token']){
          $graph_url = "https://graph.facebook.com/me?access_token="
          . $params['access_token'];
          $user = json_decode(file_get_contents($graph_url));

        // nesse IF verificamos se veio os dados corretamente
          if(isset($user->email) && $user->email){

        /*
        *Apartir daqui, você já tem acesso aos dados usuario, podendo armazená-los
        *em sessão, cookie ou já pode inserir em seu banco de dados para efetuar
        *autenticação.
        *No meu caso, solicitei todos os dados abaixo e guardei em sessões.
        */

            $_SESSION['email'] = $user->email;
            $_SESSION['nome'] = $user->name;
            $_SESSION['localizacao'] = $user->location->name;
            $_SESSION['uid_facebook'] = $user->id;
            $_SESSION['user_facebook'] = $user->username;
            $_SESSION['link_facebook'] = $user->link;
            $_SESSION['img'] = "https://graph.facebook.com/$user->id/picture?type=large";
          }

          $redirect = "http://192.168.0.108/SD/sd_app/cadastro.php";

          header("location:$redirect");
        }else{
          echo "Erro de conexão com Facebook";
          exit(0);
        }

      }else{
        echo "Erro de conexão com Facebook 2";
        exit(0);
      }
    }else if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['error'])){
      echo 'Permissão não concedida';
    }
?>
