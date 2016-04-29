<?php
//Nos conectamos al servidor
$conn=mysqli_connect("lldk227.servidoresdns.net","qvo799","Arteria123","qvo799");
$query="SELECT * FROM candidatos";
$result=mysqli_query($conn, $query);
mysqli_set_charset($conn,"utf8");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Listar Candidatos</title>

    <!-- Bootstrap Core CSS -->
    <link href="business/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="business/css/business-casual.css" rel="stylesheet">
	<link href="business/css/accordion.css" rel="stylesheet">
	
    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="brand">Lista de Candidatos</div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="listar.php">Todos</a>
                    </li>
                    <li>
                        <a href="">Categoria</a>
	                    <ul class="categoria">
		                    <li><a href="sinCategoria.php">Sin categoria</a></li>
		                    <li><a href="disenoGrafico.php">Diseño</a></li>
		                    <li><a href="programacion.php">Programacion</a></li>
		                    <li><a href="otros.php">Otros</a></li>
                       	</ul>
                    </li>
                    <li>
                        <a href="nuevos.php">Nuevos</a>
                    </li>
                    <li>
                        <a href="aceptados.php">Aceptados</a>
                    </li>
                    <li>
                        <a href="rechazados.php">Cementerio</a>
                    </li>                     
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>