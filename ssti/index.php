<?php
if(isset($_GET['hl'])) {
	highlight_file("index.php");
	die();
}
require_once('smarty/libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->setTemplateDir('./')->setCompileDir('/tmp/templates_c')->setCacheDir('/tmp/templates_cache');

if(!isset($_GET['template'])) {
	$template = "
		<p>Received message : {$message}</p>
	";
}
else {
	$template = $_GET['template'];
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Exercices</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../bootstrap/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../bootstrap/js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <?php include('../menu.php'); ?>
      </div>
    </div>

    <div class="container">

      <div class="starter-template">
        <h1>Server-Side Template Injection</h1>
        <p class="lead">Execute arbitrary PHP code</p>

        <p>Send Message: <form action="" method="GET"><input type="text" name="message"/><input type="submit" value="Send"/></form></p>

        Hint: <a href="?hl=1">View Source</a>
        <?php
			$smarty->assign('message', htmlentities($_GET['message']));
			$smarty->display("eval:$template");

        ?>
      </div>

    </div><!-- /.container -->




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../bootstrap/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
