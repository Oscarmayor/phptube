<?php 
	$mysqli= mysqli_connect("localhost","root","","phptube");

	if ($mysqli==false) {
		echo "hubo un error al conecta la bd";
		die();

	}

	function graba_video($archivo){
			$mysqli= $GLOBALS['mysqli'];

			$msg="";

			$target_dir="videos/";
			$target_file=$target_dir . basename($archivo['archivo']['name']);
			$uploadOK=1;
			$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			//utilizando getimagesize puedo saber si es una imagen real o falsa

			if (isset($_POST['submit'])) {
				$check=getimagesize($archivo['archivo']['tmp_name']);
				if ($check !== false) {
					$uploadOK=1;
				}else{
					$msg.= "el archivo no es un video ";
					$uploadOK=0;
				}
			}

			//ya hay un archivo que existe con ese nombre

			if (file_exists($target_file)) {
				$msg.="El video ya existe <br>";
				$uploadOK=1;
			}

			//tamañano maximo de la img
			if ($archivo['archivo']['size'] >5000000) {
				$msg."el archivo es muy grande trata con uno mas pequeño";
				$uploadOK=0;
			}

			//formatos autorizados
			if ($imageFileType != 'mp4') {
				$msg.="solo se permite archivos con extension mp4";# code...
				$uploadOK=0;
			}

			//si uploadOK es igual a 0 hubo un error

			if ($uploadOK==0) {
				$msg.="lo siento el video no pudo subirse <br>";
				//si todo va bien guardamnos la img
			}else{
				if (move_uploaded_file($archivo['archivo']['tmp_name'],$target_file)) {
					$msg.="El video ". basename($archivo['archivo']['name']). "ha sido subido";
					$mysqli->query("INSERT INTO `videos` (`videos_url`, `videos_usuario_id`) VALUES ('".$target_file."', '".$_SESSION['usuarios_id']."');");
				}else{
					$msg."lo siento hubo un error";
				}
			}

			 return $msg;

	}

	function graba_imagen($archivo){
			$mysqli= $GLOBALS['mysqli'];

			$msg="";

			$target_dir="archivos/";
			$target_file=$target_dir . basename($archivo['archivo']['name']);
			$uploadOK=1;
			$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			//utilizando getimagesize puedo saber si es una imagen real o falsa

			if (isset($_POST['submit'])) {
				$check=getimagesize($archivo['archivo']['tmp_name']);
				if ($check !== false) {
					$uploadOK=1;
				}else{
					$msg.= "el archivo no es una img ";
					$uploadOK=0;
				}
			}

			//ya hay un archivo que existe con ese nombre

			if (file_exists($target_file)) {
				$msg.="La imagen ya existe <br>";
				$uploadOK=1;
			}

			//tamañano maximo de la img
			if ($archivo['archivo']['size'] >500000) {
				$msg."el archivo es muy grande trata con uno mas pequeño";
				$uploadOK=0;
			}

			//formatos autorizados
			if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
				$msg.="solo se permite archivos con extension jpg,png,jepg,gif";# code...
				$uploadOK=0;
			}

			//si uploadOK es igual a 0 hubo un error

			if ($uploadOK==0) {
				$msg.="lo siento la imagen no pudo subirse <br>";
				//si todo va bien guardamnos la img
			}else{
				if (move_uploaded_file($archivo['archivo']['tmp_name'],$target_file)) {
					$msg.="la imagen ha subido". basename($archivo['archivo']['name']). "subida";
					$mysqli->query("UPDATE usuarios  SET  usuarios_img = '$target_file' WHERE usuarios_id= '".$_SESSION['usuarios_id']."'");
				}else{
					$msg."lo siento hubo un error";
				}
			}

			 return $msg;

	}

		
				function obtener_imagen_usuario(){
				  //traemos la conexión (global) a un ambito local (dentro de la función);
				  $mysqli = $GLOBALS['mysqli'];

				  // consulta para traer los promedios peso maximo y la cuenta
				  $consulta = "SELECT `usuarios_img` FROM `usuarios` WHERE `usuarios_id` = '".$_SESSION['usuarios_id']."'";
				  $resultado = $mysqli->query($consulta);
				  $fila = $resultado->fetch_assoc();

				  $ruta = $fila['usuarios_img'];
				  return $ruta;
				}


 ?>