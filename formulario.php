<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Contacta con nosotros</title>

<!-- CSS -->
<link rel="stylesheet"
	href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet"
	href="assets/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/form-elements.css">
<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
	<!-- Top content -->
	<div class="top-content">
		<div class="inner-bg">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2 text">
						<h1>
							<strong>Trabaja con nosotros</strong>
						</h1>
						<div class="description">
							<p>Env&iacuteanos tus datos y contactaremos contigo en breve.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3 form-box">
						<div class="form-top">
							<div class="form-top-left">
								<h3>Cont&aacutectanos</h3>
							</div>
							<div class="form-top-right">
								<i class="fa fa-envelope"></i>
							</div>
						</div>
						<!-- Aquí tenemos el formulario de contacto -->
						<div class="form-bottom contact-form">
							<form role="form" action="webhook.php" method="post">
								
								<div class="form-group">
									<label class="sr-only" for="nombre">Nombre</label> 
									<p class="texto">Nombre</p><input type="text" name="nombre" class="contact-name form-control" id="contact-name">
								</div>
								
								<div class="form-group">
									<label class="sr-only" for="contact-asunto">Asunto</label> 
									<p class="texto">Asunto</p><input type="text" name="asunto" class="contact-asunto form-control" id="contact-asunto">
								</div>
								
								<div class="form-group">
									<label class="sr-only" for="contact-mnsaje">Mensaje</label>
									<p class="texto">Mensaje</p><textarea name="mensaje" class="contact-mensaje form-control" id="contact-mensaje"></textarea>
								</div>
								
								<div class="form-group">
									<label class="sr-only" for="contact-adjuntos">Adjuntos</label>
									<p class="texto">Adjuntos</p><input type="file" name="adjuntos" class="adjuntos" id="contact-adjuntos">
								</div>
								
								<div class="form-group">
									<label class="sr-only" for="contact-categoria">Categoria</label>
									<p class="texto">Categor&iacutea</p><input type="text" name="categoria" class="contact-categoria form-control" id="contact-categoria">
								</div>
								
								
								<button type="submit" id="submit" name="submit" class="btn">Enviar</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Javascript -->
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.backstretch.min.js"></script>
	<script src="assets/js/retina-1.1.0.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	<!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

</body>
</html>

