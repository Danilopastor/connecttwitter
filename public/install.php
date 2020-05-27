<?php
require '../logic/initialApplication.php';
$install = new initialApplication();
$initial = $install->run();
?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Primeira Excecução</title>
    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/floating-labels.css" rel="stylesheet">
  </head>

  <body>
    <form class="form-signin" method="post" id="submit">
      <div class="text-center mb-4">
      <?php if($initial){ ?>
        <h1 class="h3 mb-3 font-weight-normal">Precisamos de Algumas Informações</h1>
        <p>Para começar as funcionalidades da aplicação preencha os dados abaixo</p>
        <label for="application_uri" class="sr-only">Email address</label>
        <input type="text" id="application_uri" name="application_uri" class="form-control" placeholder="URL da Aplicação" required autofocus>
        <label for="apiKey" class="sr-only">APIKEY Twitter</label>
        <input type="text" id="apiKey" name="apiKey" class="form-control" placeholder="APIKEY Twitter" required>
        <label for="secretKey" class="sr-only">SECRETKEY Twitter</label>
        <input type="text" id="secretKey" name="secretKey" class="form-control" placeholder="SECRETKEY Twitter" required>
        <label for="callbackLink" class="sr-only">URL de retorno - Twitter</label>
        <input type="text" id="callbackLink" name="callbackLink" class="form-control" placeholder="URL de retorno Twitter" required>
        <label for="token_bitly" class="sr-only">Token Bitly</label>
        <input type="text" id="token_bitly" name="token_bitly" class="form-control" placeholder="Token Bitly">
     <?php }else{ ?>
        <h1 class="h3 mb-3 font-weight-normal">Instalação ja Completada</h1>
        <p>Ja temos todos os dados, pra reinstalar é nescessário apagar o aquivo de configuração</p>
     <?php } ?>
      </div>
      <?php if($initial){ ?>
            <button class="btn btn-lg btn-primary btn-block">Instalar</button>
      <?php } ?>
      <p class="mt-5 mb-3 text-muted text-center">&copy; Por Danilo Pastor</p>
    </form>
    <script type="text/javascript">
    </script>
  </body>
</html>