<?php include 'core/int.php'; protect_page(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Settings | <?php echo get_app_name(); ?></title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="dist/css/font-awesome.min.css">
<link rel="stylesheet" href="dist/css/ionicons.min.css">
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<link rel="stylesheet" type="text/css" href="formvalidation/vendor/formvalidation/css/formValidation.min.css">
<link rel="stylesheet" href="dist/css/skins/skin-green.min.css">
<link rel="stylesheet" href="plugins/sweetalert/sweetalert2.min.css">
</head>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

<?php include 'include/header.php'; ?>
<?php include 'include/menu.php'; ?>


<div class="content-wrapper">

  <section class="content-header">
    <h1>Settings</h1>
    <ol class="breadcrumb">
      <li class="active"><a href="<?php echo $base_url; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Settings</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
        <!-- left column -->
      <div class="col-md-8 col-md-offset-2">
         <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Application Settings</h3>
          </div>

          <?php 
          $get = mysqli_query($con, "select * from settings where S_ID = 1");
          $show = mysqli_fetch_array($get); ?>
          <form role="form" class="form-horizontal"  id="settings_form" action="ajax/Update/Update-Settings.php"  method="post">
            <div class="box-body">

             <div class="form-group">
               <label class="control-label col-md-4">Application Name</label>
               <div class="col-md-7">
                    <input type="text" name="app_name" value="<?php echo $show['App_Name']; ?>" class="form-control" placeholder="Application Name" />
               </div>
             </div>
            
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-right btn-flat">Update</button>
            </div>
          </form>
          
        </div>
        <!-- /.box -->
    </div>


       




      </div>

  </section>
  
</div>


<?php include 'include/footer.php'; ?>

</div>

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="formvalidation/vendor/formvalidation/js/formValidation.min.js"></script>
<script src="formvalidation/vendor/formvalidation/js/framework/bootstrap.min.js"></script>
<script src="plugins/sweetalert/sweetalert2.min.js"></script>
<script src="dist/js/shortcut.js"></script>
<script>
$(document).ready(function() {

    shortcut.add("Ctrl+S",function() {
      $('#settings_form button').trigger('click');
    });

    $('#settings_form')
        .formValidation({
            framework: 'bootstrap',
             excluded: [':disabled'],
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                app_name: {
                    validators: {
                        notEmpty: {
                            message: 'The application name is required'
                        }
                    }
                }
            }
        })
        .on('success.form.fv', function(e) {
            // Prevent form submission
            e.preventDefault();

            var $form = $(e.target),
                fv    = $form.data('formValidation');

            $.ajax({
                url: $form.attr('action'),
                type: 'POST',
                data: $form.serialize(),
                beforeSend: function() {
                  $('#settings_form button').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(result) {
                  $('#settings_form button').html('Update');
                  swal('Success', 'Settings Successfully Added !','success');
                  setTimeout(function() {
                    location.reload();
                  },1000);
                }
            });
          });

});
</script>
</body>
</html>
