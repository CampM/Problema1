
<html>
    <head>
        <title><?=$title?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>    
<body>
    <header>
        <div style="background: #ccffff; text-align: center; font-size: 2em">
            <?=$title?>
        </div>
    </header>

    <div id="menu">
        <ul>
            <li><?= AddButton($_SESSION['UserInfo']->IsAdmin(), '?'.CTRL_VAR.'='.CTRL_ADD.''); ?></li>
            <li>Listado de ofertas</li>
            <li>Listado de usuarios</li>
            <li>Cerrar sesión</li><!--//session_destroy()-->
        </ul>
    </div>

    <div id="cuerpo">
        <?=$body?>
    </div>

    <footer style="background: #ccffcc; clear: both;">
        Moises Campon Garcia (c)
    </footer>
</body>
</html>