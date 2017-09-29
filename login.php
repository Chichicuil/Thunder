<?php
	session_start();
	$_SESSION['message']='';
	$server = "localhost";		
	$usuario = "root";
	$contraseña = "";
	$bd = "Thunder";
	//Conexion 
	$mysqli = new mysqli($server, $usuario, $contraseña, $bd)
		or die ("Error en la conexion");
	
    //Buscar si el usuario exite


	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		//Las dos contraseñas son identicas
		if ($_POST['password'] == $_POST['confirmpassword']){

			$username = $mysqli->real_escape_string($_POST['username']);
			$password = md5($_POST['password']); //md5 ES PARA PROTEGER
			
			//Pendiente Hacer un query para que busque el username con el nicknames
			$_SESSION['username'] = $username;


			//Pendiente hacer un cuery para buscar el usuario
                $sql = "INSERT INTO users (username, email, password, sexo, apellido, nick) "."VALUES ('$username', '$email', '$password','$sexo', '$apellido', $nick)";

			//check if mysql query is successful
                if ($mysqli->query($sql) === true){
                    $_SESSION['message'] = "Registration successful!"
                    . "Added $username to the database!";
                    //redirect the user to welcome.php
                    header("location: welcome.php");
                }
		}
    	else {
        $_SESSION['message'] = 'Two passwords do not match!';
    	}
 	}
?>

<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content">
    <div class="module">
        <h1>Iniciar Sesion</h1>

    <form class="form" action="login.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="alert alert-error"><?= $_SESSION['message']?></div>
        <input type="text" placeholder="username" name="nick" required />
        <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />

        <input type="submit" value="Login" name="Login" class="btn btn-block btn-primary" />
    </form>

    <h4><br/>si todavia no tienes cuenta crea una!!</h4>
        <form class="form" action="registerform.php">
        <input type="submit" value="¡Crear cuenta!" name="Register" class="btn btn-block btn-secundary" />
    </form>

  </div>
</div>