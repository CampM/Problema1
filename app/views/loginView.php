<html>
<!--Vista de login para los usuarios -->
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
      
	<body>
	    <header>
	        <div style="background: #ccffff; text-align: center; font-size: 2em">
	            Login
	        </div>
	    </header>

	    <div id="cuerpo">
	    	<?= $error ?>
	        <form action="" method="post">
				<label>
					Usuario:
						<input type="text" name="user" value=""/>
				</label>

				<label>
					Contraseña:
						<input type="password" name="pass" value=""/>
				</label>

				<input type="submit" value="Aceptar"/>
			</form>
	    </div>

	    <footer style="background: #ccffcc; clear: both;">
	        Moises Campon Garcia (c)
	    </footer>
	</body>
</html>