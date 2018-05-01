<?php
		$server="localhost";
		$user="Admin";
		$password="charly95";
		$dbname="escuela";
		$conexion = mysqli_connect ($server,$user,$password,$dbname);


	if(!$conexion) {
		
		die("Error".mysqli_connect_error());
	}

	else {
	     
	     	/*echo "Conexion exitosa<br/>";*/
	     	session_start();
			
			$usuario =    $_POST['usuario'];
			$contraseña = $_POST['contrasena'];

		 	$consulta ="SELECT * FROM usuarios WHERE usuario ='$usuario' AND contrasena = '$contraseña'";
		 	$resultado=mysqli_query($conexion,$consulta)or die(mysqli_error());
		 	$num_row =mysqli_num_rows($resultado);
		 	$row=mysqli_fetch_array($resultado);
		 	if($num_row ==1){
		 		$_SESSION['usuario']=$row['usuario'];
		 		  echo "El usuario " .$_SESSION["usuario"] .' Esta logeado en este momento';

		 		 echo '<a href="logout.php"><span>Logout</span></a></li>';
		 	}
		 	else{
		 		echo"El usuario no existe";
		 	}
	}
		/*header("Location:sesiones.php");*/
?>