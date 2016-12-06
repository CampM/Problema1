<!--Plantilla basica para las vistas -->
<html>
    <head>
        <title>JobYesterday - <?=$title?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../Assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../Assets/css/style.css">
    </head>    
<body class="container-fluid">

    <header>
        <span class="companyName">JobYesterday</span> - <?=$title?>
    </header>

    <!--
    <div class="row" style="height: 50px;">
        <div cloass="col-md-12" style="background: #ccffff; text-align: center; font-size: 2em">
            <span class="companyName">JobYesterday</span> - <?=$title?>
        </div>
    </div>
    -->

    <div class="row">
        <div class="col-md-2" style="height: calc(100% - 100px);">
            <div id="menu">
            <?php
                if ($_SESSION['UserInfo']->IsAdmin())
                {
                    include VIEW_TEMPLATE_PATH.'menuAdm.php';
                }
                else
                {
                    include VIEW_TEMPLATE_PATH.'menuPsico.php';
                }
            ?>
            </div>
        </div>

        <div class="col-md-10" id="cuerpo" style="height: calc(100% - 100px); overflow-y: auto; overflow-x: hidden;">
            <?=$body?>
        </div>
    </div>


    <footer>
        Moises Campon Garcia (c)
    </footer>

    <!--
    <div class="row" style="height: 50px;background: #ccffcc; ">
        <div cloass="col-md-12" style="clear: both;">
            Moises Campon Garcia (c)
        </div>
    </div>
    -->
</body>
</html>