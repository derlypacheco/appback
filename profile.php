<?php
session_start();
include('inc/block/cnn.php');
$varcode = base64_decode($_GET['cod']);
$queryUserProfile = mysqli_query($conexion, "SELECT users.`user`, users.`name`, users.last_name, users.address, users.address_num, users.email, users.picture, users.user_active, users.user_delete, users.license_date, users.start_date, users.company, users.user_online, user_types.type_user FROM users INNER JOIN user_types ON users.id_user_type = user_types.id_user_type where user = '".$varcode."'");
  if (mysqli_num_rows($queryUserProfile)==0) {
      header('location: backend.php');
  } else {
      if($queryUserProfile){
        $rowUserProfile =  mysqli_fetch_array($queryUserProfile);
      } else {
        echo "User Error: " . $conexion->error;
      }
}
?>
<!DOCTYPE html>
<html>
  <head>
<?php include("inc/block/head.php"); ?>
  </head>
  <body class="<?php echo $skim; ?>" onload="cierra_div();">

    <script type="text/javascript">
      function cierra_div(){
        $('#infophoto').fadeOut(4000);
      }
    </script>


    <!-- Site wrapper -->
    <div class="wrapper">

    <?php include("inc/block/header.php"); ?>

    <?php include("inc/block/sildebar.php"); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">

              <?php include('inc/functions/uploadphoto.php'); ?>

             <div id="mensaje"></div>

             <center><label id='photo'>
               <img class="profile-user-img img-responsive thumbnail " src="<?php echo $rowUserProfile['picture']; ?>" alt="User profile picture">
             </label></center>

              <h3 class="profile-username text-center"><?php echo utf8_decode($rowUserProfile['name']." ".$rowUserProfile['last_name']); ?></h3>
              <p class="text-muted text-center"><?php echo $rowUserProfile['type_user']; ?></p>

              <form action="" method="post" name='upphoto' id='upphoto' enctype="multipart/form-data">
                  <input type="hidden" name="k" value="<?php echo md5(rand()); ?>">
                <input type="file" name="photo" id="foto" style="visibility:hidden;">
                <label for="foto" class="btn btn-sm btn-primary btn-red btn-block">Take Picture</label>
                <center><br>
                <button type="submit" class="btn btn-primary btn-block">Upload Picture</button></center>
             </form>

             <p></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Cash</b> <a class="pull-right" href="#">$ 1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Deducible</b> <a class="pull-right bg-red-active color-palette" href="#">$ 322</a>
                </li>
                <li class="list-group-item">
                  <b>Notifications</b> <a class="pull-right" href="#">3</a>
                </li>
                <li class="list-group-item">
                  <b>Service</b> <a class="pull-right" href="#">3,287</a>
                </li>
              </ul>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-gear margin-r-5"></i> Tools</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
              <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
              <li><a href="#settings" data-toggle="tab">Information</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                  <img class="img-bordered-sm " height="50" src="<?php echo $rowUserProfile['picture']; ?>" alt="user image">
                        <span class="username">
                          <a href="#"><?php echo utf8_decode($rowUserProfile['name']." ".$rowUserProfile['last_name']); ?></a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span> <br>
                    <span class="description">Creado - 7:30 PM today</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>

                  <center><button class="btn btn-primary col-sm-4 col-lg-4 col-xs-4">Details</button></center>
                            <div style="clear:both;"></div>
                </div>
                <!-- /.post -->

              </div>


              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">

                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                  <img class=" img-bordered-sm " height="50" src="<?php echo $rowUserProfile['picture']; ?>" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Shared publicly - 7:30 PM today</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>
                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>

                </div>
                <!-- /.post -->

              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-5">
                      <input type="text" class="form-control" value="<?php echo $rowUserProfile['name']; ?>" id="name" placeholder="Name">
                    </div>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="last_name" value="<?php echo $rowUserProfile['last_name']; ?>" placeholder="Last Name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">E-mail</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="email" value="<?php echo $rowUserProfile['email']; ?>" placeholder="E-mail">
                    </div>
                  </div>
                  <div class="form-group"> 
                    <label for="address" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-8">
                      <input class="form-control" id="address" placeholder="Address" value="<?php echo $rowUserProfile['address']; ?>"></input>
                    </div>
                    <div class="col-sm-2">
                      <input class="form-control" id="address_num" placeholder="1234" value="<?php echo $rowUserProfile['address_num']; ?>"></input>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Info. User</label>

                    <div class="col-sm-3">
                      <?php
                        if($rowUserInfo['user_online']==0){
                       ?>
                        <button onclick="" type="button" class="btn btn-danger btn-sm col-sm-12"><i class="fa fa-user"></i> Logout User</button>
                        <?php } else { ?>
                        <button onclick="" type="button" disabled class="btn btn-sm col-sm-12 btn-default disabled"><i class="fa fa-user"></i> User offline</button>
                        <?php } ?>
                    </div>

                    <div class="col-sm-3">
                      <button class="btn btn-primary btn-sm col-sm-12" type="button" onclick=""><i class="fa fa-remove"></i> Remove User</button>
                    </div>

                    <div class="col-sm-4">
                      <input title="Licence Date" type="date" value="<?php echo $rowUserProfile['license_date']; ?>" class="form-control" id="licence_date" placeholder="Licence Date">
                    </div>

                  </div>

                  <div class="form-group">

                    <label for="company" class="col-sm-2 control-label">Company</label>

                    <div class="col-sm-10 col-md-10 col-lg-10">
                      <select class="col-sm-12 col-md-12 col-lg-12 form-control">
                        <option value=""><?php echo $rowUserInfo['company']; ?></option>
                      </select>
                    </div>

                  </div>

                  <div class="form-group">

                    <label class="col-sm-2 col-md-2 col-lg-2">Administration</label>

                    <div class="col-sm-3 col-md-3 col-md-3">
                      <button class="btn btn-sm bg-green-active color-palette col-sm-12 col-md-12 col-lg-12" type="button" onclick="">Online</button>
                    </div>

                    <div class="col-sm-3 col-md-3 col-md-3">
                      <?php
                        $queryCargo = mysqli_query($conexion, "SELECT id_user_type, type_user FROM user_types WHERE type_user_delete = 0 ");
                      ?>
                      <select class="form-control">
                        <?php while($rowCargo = mysqli_fetch_array($queryCargo)){ ?>
                        <option value="<?php echo $rowCargo['id_user_type']; ?>" <?php if($rowUserInfo['type_user']==$rowCargo['type_user']){ echo "selected=''";}?>><?php echo $rowCargo['type_user']; ?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="col-sm-4 col-md-4 col-md-4">
                      <input type="password" class="form-control" name="password" placeholder="Asigne new password">
                    </div>

                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn bg-navy-active color-palette col-sm-12 col-md-12 col-lg-12">Salve</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    <div style="padding: 10px 0px; text-align: center;">
  <script async="" src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <div class="visible-xs visible-sm">
        <!-- AdminLTE -->
        <ins class="adsbygoogle" style="display: inline-block; width: 300px; height: 250px;" data-ad-client="ca-pub-4495360934352473" data-ad-slot="5866534244" data-adsbygoogle-status="done"><ins id="aswift_0_expand" style="display:inline-table;border:none;height:250px;margin:0;padding:0;position:relative;visibility:visible;width:300px;background-color:transparent">
          <ins id="aswift_0_anchor" style="display:block;border:none;height:250px;margin:0;padding:0;position:relative;visibility:visible;width:300px;background-color:transparent">
            <iframe width="300" height="250" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allowfullscreen="true" onload="var i=this.id,s=window.google_iframe_oncopy,H=s&amp;&amp;s.handlers,h=H&amp;&amp;H[i],w=this.contentWindow,d;try{d=w.document}catch(e){}if(h&amp;&amp;d&amp;&amp;(!d.body||!d.body.firstChild)){if(h.call){setTimeout(h,0)}else if(h.match){try{h=s.upd(h,i)}catch(e){}w.location.replace(h)}}" id="aswift_0" name="aswift_0" style="left:0;position:absolute;top:0;"></iframe>
          </ins></ins></ins><script>(adsbygoogle = window.adsbygoogle || []).push({});</script></div>

          <div class="hidden-xs hidden-sm"><!-- Home large leaderboard --><ins class="adsbygoogle" style="display:inline-block;width:728px;height:90px" data-ad-client="ca-pub-4495360934352473" data-ad-slot="1170479443" data-adsbygoogle-status="done">
            <ins id="aswift_1_expand" style="display:inline-table;border:none;height:90px;margin:0;padding:0;position:relative;visibility:visible;width:728px;background-color:transparent">
              <ins id="aswift_1_anchor" style="display:block;border:none;height:90px;margin:0;padding:0;position:relative;visibility:visible;width:728px;background-color:transparent"><iframe width="728" height="90" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allowfullscreen="true" onload="var i=this.id,s=window.google_iframe_oncopy,H=s&amp;&amp;s.handlers,h=H&amp;&amp;H[i],w=this.contentWindow,d;try{d=w.document}catch(e){}if(h&amp;&amp;d&amp;&amp;(!d.body||!d.body.firstChild)){if(h.call){setTimeout(h,0)}else if(h.match){try{h=s.upd(h,i)}catch(e){}w.location.replace(h)}}" id="aswift_1" name="aswift_1" style="left:0;position:absolute;top:0;"></iframe></ins></ins></ins><script>(adsbygoogle = window.adsbygoogle || []).push({});</script></div>
            </div>
          </section>

      </div><!-- /.content-wrapper -->

<?php include("inc/block/footer.php");
//

?>

    </div><!-- ./wrapper -->

<?php include("inc/block/scripts.php"); ?>

  </body>
</html>
