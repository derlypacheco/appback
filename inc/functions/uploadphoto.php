<?php
if(isset($_POST['k'])){
  $namePhoto = $_FILES['photo']['name'];
  $typeIMg = $_FILES['photo']['type'];
  $destino = 'img/profile/avatar/'.substr(md5(rand()),0,6)."_".$_FILES["photo"]['name'];
   // if (move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)) {

      if (move_uploaded_file($_FILES['photo']['tmp_name'], $destino)) {
      // Compress imagen
      $ruta_imagen = $destino;

      $miniatura_ancho_maximo = 350;
      $miniatura_alto_maximo = 350;

      $info_imagen = getimagesize($ruta_imagen);
      $imagen_ancho = $info_imagen[0];
      $imagen_alto = $info_imagen[1];
      $imagen_tipo = $info_imagen['mime'];


      $proporcion_imagen = $imagen_ancho / $imagen_alto;
      $proporcion_miniatura = $miniatura_ancho_maximo / $miniatura_alto_maximo;

      if ( $proporcion_imagen > $proporcion_miniatura ){
      	$miniatura_ancho = $miniatura_ancho_maximo;
      	$miniatura_alto = $miniatura_ancho_maximo / $proporcion_imagen;
      } else if ( $proporcion_imagen < $proporcion_miniatura ){
      	$miniatura_ancho = $miniatura_ancho_maximo * $proporcion_imagen;
      	$miniatura_alto = $miniatura_alto_maximo;
      } else {
      	$miniatura_ancho = $miniatura_ancho_maximo;
      	$miniatura_alto = $miniatura_alto_maximo;
      }

      switch ( $imagen_tipo ){
      	case "image/jpg":
      	case "image/jpeg":
      		$imagen = imagecreatefromjpeg( $ruta_imagen );
      		break;
      	case "image/png":
      		$imagen = imagecreatefrompng( $ruta_imagen );
      		break;
      	case "image/gif":
      		$imagen = imagecreatefromgif( $ruta_imagen );
      		break;
      }

      $lienzo = imagecreatetruecolor( $miniatura_ancho, $miniatura_alto );

      imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho, $miniatura_alto, $imagen_ancho, $imagen_alto);

      imagejpeg($lienzo, $destino, 80);
      // compress imagen
        $querypicture = mysqli_query($conexion, "update users set picture='".$destino."' where user = '".$varcode."'");
          if ($querypicture) {
            echo "<div class='alert alert-success' id='infophoto'>Upload completed</div>";
          } else {
            echo "<div class='alert alert-danger' id='infophoto'>Error Upload ".$conexion->error."</div>";
          }
      }

}
?>
