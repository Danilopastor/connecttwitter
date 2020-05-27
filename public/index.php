<?php 
require '../logic/verifySession.php';
$stateAuth = false;
$httpstatus = '';
if(!isset($_GET['token'])){
    $reply = $cb->oauth_requestToken([
        'oauth_callback' => $data->callbackLink
      ]);
      $httpstatus = $reply->httpstatus;
      if($reply->httpstatus == 200) {

        $cb->setToken($reply->oauth_token, $reply->oauth_token_secret);
        $_SESSION['oauth_token'] = $reply->oauth_token;
        $_SESSION['oauth_token_secret'] = $reply->oauth_token_secret;
        $_SESSION['oauth_verify'] = true;
        $auth_url = $cb->oauth_authorize();
        $stateAuth = $auth_url;

      }else{


      }
}
?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Autorize Twitter Deviante</title>
    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/floating-labels.css" rel="stylesheet">
  </head>

  <body>
    <form class="form-signin" id="submit">
      <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">
          <?php
            if($stateAuth){
              echo "Conectar ao Twitter";
            }else{
              
              if($httpstatus == 403){
                echo "Ops!";
              }else{
                echo "Muito Bem";
              }
            }
          ?>
        </h1>
        <?php 
        if($stateAuth){
          echo '<p>Clique no botão pra continuar e autorizar o aplicativo a publicar no seu twitter</p></div>
                <button class="btn btn-lg btn-primary btn-block">Autorizar Aplicativo</button>';
        }else{

          if($httpstatus == 403){
            echo "<p>Ocorreu um erro, verifique os dados de configuração!</p></div>";
          }else{
            echo "<p>Aplicativo autorizado com sucesso, obrigado!</br>".
                 "Copie seu token para próximas requisições na api</br>".
                 "<code>".$_GET['token']."</code>".
                 "</div>";
          }

        }
        ?>
      <p class="mt-5 mb-3 text-muted text-center">&copy; Por Danilo Pastor</p>
    </form>
    <script type="text/javascript">
      const form = document.getElementById('submit')
      form.addEventListener('submit',function(e){
          e.preventDefault();
          window.location.href = '<?php echo $stateAuth;  ?>'
      })
    </script>
  </body>
</html>