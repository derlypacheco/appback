<?php
session_start();
include('inc/block/cnn.php');

?>
<!DOCTYPE html>
<html>
  <head>
<?php include("inc/block/head.php"); ?>
  </head>
  <body class="<?php echo $skim; ?>">
    <!-- Site wrapper -->
    <div class="wrapper">

    <?php include("inc/block/header.php"); ?>

    <?php include("inc/block/sildebar.php"); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard - BackEnd
            <!-- <small>it all starts here</small> -->
          </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
          </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Title</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              Start creating encriptation! <br>
              Este es el user <?php echo $_SESSION['user']; ?>, cuenta con el cargo de ver usuario <?php echo $_SESSION['v_user']; ?>
              <br>

<?php
  $key = '12';

  $encript = md5(sha1($key));
  $encript2 = sha1(md5($key));
  echo 'Md5(sha1("passowrd")) : ' . $encript;
  echo '<br>sha1(md5("passowrd")) : ' . $encript2;


?>


            </div><!-- /.box-body -->

            <div class="box-footer">
              Footer
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php include("inc/block/footer.php");
//

?>

    </div><!-- ./wrapper -->

<?php include("inc/block/scripts.php"); ?>

  </body>
</html>
