<html>
	<head>
		<title>Send Notification</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
		<meta name="viewport" content="width=device-width,initial-scale=1" />


	</head>
	<body style="width: 100%;">
		<div id="divContainer" class="container" style="width: 100%;">
			<form method="post" action="sendNotification.php" style="width: 90%; margin: 0 auto; margin-top: 30px">
				<div style="margin-top: 10px; text-align: center; font-size: 20px" class="alert alert-primary" role="alert">
					Enviar notificação para o Desafio Mobfiq
				</div>
				<div style="margin-top: 10px">
					<input type="text" class="form-control" name="key" placeholder="PHONE KEY" value="<?php echo $_GET["key"]?>">
				</div>
				<div style="margin-top: 10px">
					<input type="text" class="form-control" name="title" placeholder="TITLE">
				</div>
				<div style="margin-top: 10px">
					<textarea name="message" class="form-control" rows="10" placeholder="MENSAGEM"></textarea>
				</div>
				<div style="margin-top: 10px; width: 100%">
					<button type="submit" class="btn btn-primary" style="width: 100%">Enviar</button>
				</div>
			</form>
		</div>
	</body>
</html>