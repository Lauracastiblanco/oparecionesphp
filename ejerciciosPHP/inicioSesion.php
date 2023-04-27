<!DOCTYPE html>
<html>
<html>
<head>
	<title>Iniciar sesión</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}
		h2 {
			text-align: center;
			color: #333;
		}
		form {
			background-color: #fff;
			padding: 20px;
			max-width: 400px;
			margin: 0 auto;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
		}
		label {
			display: block;
			font-weight: bold;
			margin-bottom: 10px;
			color: #333;
		}
		input[type="text"],
		input[type="password"] {
			display: block;
			width: 100%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 3px;
			margin-bottom: 20px;
			font-size: 16px;
			color: #333;
			box-sizing: border-box;
		}
		input[type="submit"] {
			background-color: #333;
			color: #fff;
			padding: 10px 20px;
			border: none;
			border-radius: 3px;
			font-size: 16px;
			cursor: pointer;
		}
		input[type="submit"]:hover {
			background-color: #555;
		}
		.error {
			color: red;
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<h2>Iniciar sesión</h2>
	<form method="POST" action="inicioSesion.php">
		<label for="username">Nombre de usuario:</label>
		<input type="text" id="username" name="username" required>
		<label for="password">Contraseña:</label>
		<input type="password" id="password" name="password" required>
		<input type="submit" value="Iniciar sesión">
		<?php if(isset($_POST) && ($username !== $valid_username || $password !== $valid_password)) { ?>
			<p class="error">Nombre de usuario o contraseña incorrectos.</p>
		<?php } ?>
	</form>
</body>
</html>
<?php	
session_start();
$valid_username = "lau";
$valid_password = "123";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['username'] = $username;
        header("Location: login.php");
        exit();
    } else {
        echo "Nombre de usuario o contraseña incorrectos.";
    }
}

