        <?php
            session_start();
			include 'conexion.php';
			if(isset($_POST['login'])){
				$usuario = htmlspecialchars($_POST['usuario']);
				$pw =htmlspecialchars($_POST['pass']);
				$log = mysqli_query($con, "SELECT * FROM administrador WHERE Username='$usuario' AND Pass='$pw' and estado='Activo'");
				if (mysqli_num_rows($log)>0) {
					$row = mysqli_fetch_array($log);
					$_SESSION["Username"] = $row['Username'];
				  	echo '<script> alert("Bienvenidos al Sistema.");</script>';
					echo '<script> window.location="../principal.php"; </script>';
				}
				else{
					echo '<script> alert("Usuario o contraseña incorrectos.");</script>';
					//echo '<script> window.location="../index.php"; </script>';
				}
			}
		?>