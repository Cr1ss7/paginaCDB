<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/vis.login.css?v=<?php echo time()?>">
	<script src="https://kit.fontawesome.com/2997da40e1.js" crossorigin="anonymous"></script>
	<title>Login</title>
</head>
<body>
	<section class="cont">
		<article class="log">
			<img src="../css/img/logo.png" alt="Gobierno Estudiantil 22">
		</article>
		<article class="formu">
			<h1>¡BIENVENIDO!</h1></br>
			<i class="fas fa-user"></i></br>
			<form action="../controlador/ctr.login.php" method="POST">
				<span class="icon">
					<i class="far fa-user"></i>
					<input type="text" name="carnet" placeholder="Carnet" class="write" required></br>
				</span>
				<span class="icon">
					<i class="fas fa-lock"></i>
					<input type="password" name="pass" placeholder="Contraseña" class="write" required></br>
				</span>
				<?php if(isset($errorLog)){
					echo "<p class='errorLog'>".$errorLog."</p>"; 
				}?>
				<input type="submit" value="Login" class="send">
			</form>
		</article>
	</section>	
</body>
</html>
