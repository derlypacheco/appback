<?php
if (isset($_POST['tk'])) {
  $mensaje = "";
  $us = $_POST['user'];
  $ps = md5(sha1($_POST['pass']));
  $sqlLogin = "SELECT users.`user`, user_types.id_user_type, users.address, users.address_num, users.email, users.picture, users.start_date, users.name, users.last_name, users.user_online, user_types.type_user, user_types.id_user, user_types.v_user, user_types.c_user, user_types.u_user, user_types.d_user, user_types.v_service, user_types.c_service, user_types.u_service, user_types.d_service, user_types.v_car, user_types.c_car, user_types.u_car, user_types.d_car, user_types.v_service_car, user_types.c_service_car, user_types.u_service_car, user_types.d_service_car, user_types.v_store, user_types.c_store, user_types.u_store, user_types.d_store, user_types.v_noti, user_types.c_noti, user_types.u_noti, user_types.d_noti, user_types.v_tool, user_types.c_tool, user_types.u_tool, user_types.d_tool, user_types.v_make_tool, user_types.c_make_tool, user_types.u_make_tool, user_types.d_make_tool, user_types.v_company, user_types.c_company, user_types.u_company, user_types.d_company FROM users INNER JOIN user_types ON users.id_user_type = user_types.id_user ";
  $sqlLogin .= "  where user = '".trim($us)."' and `password` = '".$ps."' and user_active = '1'";
  $querylogin = mysqli_query($conexion, $sqlLogin) or die("Error: ".$conexion->error);
  $rowconta = mysqli_num_rows($querylogin);
  $rowLogin = mysqli_fetch_array($querylogin) or die("Error: ".$conexion->error);
    if($rowconta==1){
        if($rowLogin['user_online']==0){
          mysqli_query($conexion, "update users set user_online = '1' where user = '".trim($us)."'") or die("Error: ". $conexion->error);
          $_SESSION['user'] = $rowLogin['user'];
          $_SESSION['name'] = utf8_decode($rowLogin['name']);
          $_SESSION['last_name'] = utf8_decode($rowLogin['last_name']);
          $_SESSION['type_user'] = utf8_decode($rowLogin['type_user']);
          $_SESSION['address'] = utf8_decode($rowLogin['address']." ".$rowLogin['address_num']);
          $_SESSION['email'] = $rowLogin['email'];
          $_SESSION['picture'] = $rowLogin['picture'];
          $_SESSION['start_date'] = $rowLogin['start_date'];
          $_SESSION['user'] = $rowLogin['user'];
          $_SESSION['v_user'] = $rowLogin['v_user'];
          $_SESSION['c_user'] = $rowLogin['c_user'];
          $_SESSION['u_user'] = $rowLogin['u_user'];
          $_SESSION['d_user'] = $rowLogin['d_user'];
          $_SESSION['v_service'] = $rowLogin['v_service'];
          $_SESSION['c_service'] = $rowLogin['c_service'];
          $_SESSION['u_service'] = $rowLogin['u_service'];
          $_SESSION['d_service'] = $rowLogin['d_service'];
          $_SESSION['v_car'] = $rowLogin['v_car'];
          $_SESSION['c_car'] = $rowLogin['c_car'];
          $_SESSION['u_car'] = $rowLogin['u_car'];
          $_SESSION['d_car'] = $rowLogin['d_car'];
          $_SESSION['v_service_car'] = $rowLogin['v_service_car'];
          $_SESSION['c_service_car'] = $rowLogin['c_service_car'];
          $_SESSION['u_service_car'] = $rowLogin['u_service_car'];
          $_SESSION['d_service_car'] = $rowLogin['d_service_car'];
          $_SESSION['v_store'] = $rowLogin['v_store'];
          $_SESSION['c_store'] = $rowLogin['c_store'];
          $_SESSION['d_store'] = $rowLogin['d_store'];
          $_SESSION['u_store'] = $rowLogin['u_store'];
          $_SESSION['v_noti'] = $rowLogin['v_noti'];
          $_SESSION['c_noti'] = $rowLogin['c_noti'];
          $_SESSION['u_noti'] = $rowLogin['u_noti'];
          $_SESSION['d_noti'] = $rowLogin['d_noti'];
          $_SESSION['v_tool'] = $rowLogin['v_tool'];
          $_SESSION['c_tool'] = $rowLogin['c_tool'];
          $_SESSION['d_tool'] = $rowLogin['d_tool'];
          $_SESSION['u_tool'] = $rowLogin['u_tool'];
          $_SESSION['v_make_tool'] = $rowLogin['v_make_tool'];
          $_SESSION['c_make_tool'] = $rowLogin['c_make_tool'];
          $_SESSION['u_make_tool'] = $rowLogin['u_make_tool'];
          $_SESSION['d_make_tool'] = $rowLogin['d_make_tool'];
          $_SESSION['v_company'] = $rowLogin['v_company'];
          $_SESSION['c_company'] = $rowLogin['c_company'];
          $_SESSION['u_company'] = $rowLogin['u_company'];
          $_SESSION['d_company'] = $rowLogin['d_company'];
          # Pendientes los permisos de crear, generar y visualizar reportes
          header('Location: backend.php');
        } if ($rowLogin['user_online']==1) {
          $mensaje .= " <div class='alert alert-danger text-center'>User active, contact to administrator.</div> ";
        }
    } else {
      $mensaje .= " <div class='alert alert-danger text-center'>User don't exist<br> ".$conexion->error."</div> ";
    }
}
//google classroom
?>
