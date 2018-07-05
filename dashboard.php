<?php include 'core/int.php'; protect_page(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Dashboard | <?php echo get_app_name(); ?></title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="dist/css/font-awesome.min.css">
<link rel="stylesheet" href="dist/css/ionicons.min.css">
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<link rel="stylesheet" type="text/css" href="formvalidation/vendor/formvalidation/css/formValidation.min.css">
<link rel="stylesheet" href="dist/css/skins/skin-green.min.css">
<link rel="stylesheet" href="plugins/footable/css/footable.bootstrap.min.css">
<link rel="stylesheet" href="plugins/morris/morris.css">
</head>

<body class="hold-transition skin-green sidebar-mini sidebar-collapse">
<div class="wrapper">

<?php include 'include/header.php'; ?>
<?php include 'include/menu.php'; ?>


<div class="content-wrapper">

  <section class="content-header">
    <h1>Dashboard</h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
    		 <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <a href="manage-customer">
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
              <?php
                $getcu = mysqli_query($con, "select customer_id from customer");
                $showcu= mysqli_num_rows($getcu);
                echo $showcu;
              ?>
              </h3>
              <p>View All Customer</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
          </div>
          </a>
        </div>

        <!-- ./col -->
    </div>

     

  </section>
  
</div>

<?php include 'include/footer.php'; ?>

</div>

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="dist/js/app.js"></script>
<script src="plugins/footable/js/footable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#footable').footable();
});
</script>


</body>
</html>
