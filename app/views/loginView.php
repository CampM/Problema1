<html>
<!--Vista de login para los usuarios -->

    <head>
        <title>JobYesterday - Login></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../Assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../Assets/css/style.css">
    </head>
      
	<body class="container-fluid">
	    <header>
            <span class="companyName">JobYesterday</span> - Login
	    </header>

	    <div class="bodyLoginContainer">
	    	<div class="bodyLogin">

		    	<?= $error ?>
		        <form action="" method="post">
		        	<div class="form-group">
						<label for="user">Usuario:</label>
						<input class="form-control" type="text" name="user" id="user" value=""/>
		        	</div>

		        	<div class="form-group">
						<label for="pass">Contraseña:</label>
						<input class="form-control" type="password" name="pass" id="pass" value=""/>
		        	</div>

					<input class="btn btn-default" type="submit" value="Aceptar"/>
				</form>
	    	</div>
	    </div>

	    <footer>
	        Moises Campon Garcia (c)
	    </footer>
	</body>
</html>