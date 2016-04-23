<?php
// Select Informatio from user
// include_once("../../inc/block/cnn.php");
$queryUserInfo = mysqli_query($conexion, "SELECT users.`user`, users.`name`, users.last_name, users.address, users.address_num, users.email, users.picture, users.user_active, users.user_delete, users.license_date, users.start_date, users.company, users.user_online, user_types.type_user FROM users INNER JOIN user_types ON users.id_user_type = user_types.id_user_type WHERE `user` = '".$_SESSION["user"]."' ");
  if($queryUserInfo){
      if(mysqli_num_rows($queryUserInfo)==1) {
        $rowUserInfo = mysqli_fetch_array($queryUserInfo);
      } else {
        echo "<div class='alert alert-danger'>Error: ".$conexion->errro."</div>";
      }
  } else {
    echo "no cumple la conedicion";
  }
?>
