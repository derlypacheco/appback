<?php
session_start();
include('inc/block/cnn.php');
include('inc/functions/login.php');
?>
<!DOCTYPE html>
<html><!--<![endif]-->
<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Derly Pacheco">
    <link rel="shortcut icon" href="favicon.png">

	<title>System Tecnical Control</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/login.css" rel="stylesheet">
    <link href="bootstrap/css/animate-custom.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
     <script src="js/custom.modernizr.js" type="text/javascript"></script>
  </head>
    <body>
    	<!-- start Login box -->
    	<div class="container" id="login-block">
    		<div class="row">
			    <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
<!-- 			    	<h3 class="animated bounceInDown">Acceso a Aplicaci&oacute;n</h3>
 -->			       <div class="login-box clearfix animated flipInY">
			        	<div class="login-logo">
			        		<a href="#">
			        		<img src="img/lion.png" alt="Municipio de Anahuac, N.L.">
			        		</a>
			        	</div>
			        	<hr>
			        	<div class="login-form">
			        		<?php
                    if(isset($mensaje)!=''){ echo $mensaje; }
			        		?>
							<form action="#<?php echo md5(rand()).sha1(rand()); ?>#<?php echo md5(rand()).sha1(rand()); ?>" method="post">
						   		 <input type="text" placeholder="Usuario" name="user" autofocus="" required>
						   		 <input type="hidden" name="ler" value="<?php echo "http://".$_SERVER['HTTP_HOST'].'/'.$_SERVER['REQUEST_URI']; ?>">
						   		 <input type="password" placeholder="Password" name="pass" required>
						   		 <input type="hidden" name="tk" value="<?php echo md5(rand()); ?>">
						   		 <button type="submit" class="btn btn-red">Login</button>
							</form>
							<div class="login-links">
					            <!-- <a href="forgot-password.html">
					          	   restablecer password?
					            </a>
					            <br>
					            <a href="#">
					              Politicas
					            </a> -->
							</div>
			        	</div>
			       </div>


			    </div>
			</div>
    	</div>

      	<!-- End Login box -->
     	<footer class="container">
     		<p id="footer-text"><small>Copyright © Lion Sistemas <?php echo date("Y"); ?> <a href="#"></a></small></p>
     	</footer>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/placeholder-shim.min.js"></script>
        <script src="js/custom.js"></script>


</body>
</html>
