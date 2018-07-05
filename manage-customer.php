<?php include 'core/int.php'; protect_page(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Manage Customer | <?php echo get_app_name(); ?></title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="dist/css/font-awesome.min.css">
<link rel="stylesheet" href="dist/css/ionicons.min.css">
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<link rel="stylesheet" type="text/css" href="formvalidation/vendor/formvalidation/css/formValidation.min.css">
<link rel="stylesheet" href="dist/css/skins/skin-green.min.css">
<link rel="stylesheet" href="plugins/sweetalert/sweetalert2.min.css">
<link rel="stylesheet" href="dist/css/jquery-ui.min.css">
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="plugins/datatables/extensions/KeyTable/css/keyTable.bootstrap.min.css">
<link rel="stylesheet" href="plugins/datatables/extensions/Select/css/select.bootstrap.min.css">

<style type="text/css">
.table tr td:nth-child(1) { text-align: center; }
.table tr td:nth-child(6) { text-align: center; }
.selected { background-color: red; }
table.dataTable th.focus,
table.dataTable td.focus {
  outline: none;
}
.dataTables_filter { display: block; margin-top: -50px; width: 300px; float: right; }
.dataTables_filter input { width: 200px !important; }
#table_length,#table_info,#table_paginate { display: none; }
</style>
</head>

<body class="hold-transition skin-green sidebar-mini sidebar-collapse">
<div class="wrapper">

<?php include 'include/header.php'; ?>
<?php include 'include/menu.php'; ?>


<div class="content-wrapper">



  <!-- Main content -->
  <section class="content">

    <div class="row">

        <div class="col-md-12">
           <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Customer Master <!-- - <small><a style="cursor: pointer;" data-toggle="modal" data-target="#help_modal">Keyboard Shortcuts</small></a> --></h3>
              <div class="text-center" style="margin-top: -25px;">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#add_customer_modal" class="btn btn-default btn-flat">ADD</a>
                <a href="javascript:void(0)" id="edit" class="btn btn-default btn-flat">EDIT</a>
                <a href="javascript:void(0)" id="delete" class="btn btn-default btn-flat">DELETE</a>
                
              </div>
            </div>

              <div class="box-body">

              <table class="table table-bordered table-striped" id="table">
                <thead>
                  <tr>
                    <th class="text-center">Customer ID</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
              
              </div>
            
          </div>

      </div>

    </div>

  </section>
  
</div>

<!--- Add Customer Model -->

<div class="modal fade" id="add_customer_modal" tabindex="-1" role="dialog" aria-labelledby="add_customer_modal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="add_customer_modal">Add Customer</h4>
      </div>
      <form class="form-horizontal" action="ajax/Add/Add-Customer.php" method="post" id="add_customer_form" enctype="multipart/form-data">
      <div class="modal-body">
        
        <div class="form-group">
          <label class="control-label col-md-2">Name</label>
          <div class="col-md-4">
            <input type="text" name="name" class="form-control" placeholder="Enter Name">
          </div>
          <label class="control-label col-md-1">Mobile</label>
          <div class="col-md-4">
            <input type="number" name="mobile" maxlength="10" minlength="10" placeholder="Enter Mobile Number" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-2">Telephone No.</label>
          <div class="col-md-4">
            <input type="number" name="telephone" class="form-control" placeholder="Enter Telephone Number">
          </div>
          <label class="control-label col-md-1">Email</label>
          <div class="col-md-4">
            <input type="email" name="email" class="form-control" placeholder="Enter Email Address">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-2">DOB</label>
          <div class="col-md-4">
            <input type="text" name="dob" class="form-control" placeholder="Enter Date of Birth">
          </div>
          <label class="control-label col-md-1">Image</label>
          <div class="col-md-4">
            <input type="file" name="image" onchange="readURLAdd(this);" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-2">Address</label>
          <div class="col-md-4">
            <textarea class="form-control" rows="4" style="resize: vertical;" name="address" placeholder="Enter Address"></textarea>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-4">
            <img  style="display: none;" id="add_image_show" src="#" class="img-thumbnail img-responsive" />
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-flat" id="addsave">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!--- End Add Customer Model -->

<!--- Update Customer Model -->

<div class="modal fade" id="update_customer_modal" tabindex="-1" role="dialog" aria-labelledby="update_customer_modal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="update_customer_modal">Update Customer</h4>
      </div>
      <form class="form-horizontal" action="ajax/Update/Update-Customer.php" method="post" id="update_customer_form" enctype="multipart/form-data">
      <div class="modal-body">
        
        <div class="form-group">
          <label class="control-label col-md-2">Name</label>
          <div class="col-md-4">
            <input type="text" name="name" class="form-control" placeholder="Enter Name">
            <input type="hidden" name="id">
            <input type="hidden" name="umobile">
          </div>
          <label class="control-label col-md-1">Mobile</label>
          <div class="col-md-4">
            <div class="input-group">
              <span class="input-group-addon" id="mobile"></span>
              <input type="number" name="mobile" maxlength="10" minlength="10" placeholder="Enter Mobile Number" class="form-control" style="padding-right: 0;">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-2">Telephone No.</label>
          <div class="col-md-4">
            <input type="number" name="telephone" class="form-control" placeholder="Enter Telephone Number">
          </div>
          <label class="control-label col-md-1">Email</label>
          <div class="col-md-4">
            <input type="email" name="email" class="form-control" placeholder="Enter Email Address">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-2">DOB</label>
          <div class="col-md-4">
            <input type="text" name="dob" class="form-control" placeholder="Enter Date of Birth">
          </div>
          <label class="control-label col-md-1">Image</label>
          <div class="col-md-4">
            <input type="file" name="image" onchange="readURLUpdate(this);" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-2">Address</label>
          <div class="col-md-4">
            <textarea class="form-control" rows="4" style="resize: vertical;" name="address" placeholder="Enter Address"></textarea>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-4">
            <img  style="display: none;" id="update_image_show" src="#" class="img-thumbnail img-responsive" />
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-flat" id="updatesave">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!--- End Update Customer Model -->

<!--- View Customer Details Model -->

<div class="modal fade" id="view_customer_modal" tabindex="-1" role="dialog" aria-labelledby="view_customer_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="view_customer_modal">Customer Details</h4>
      </div>

      <div class="modal-body">
        
        <div id="view_customer_details"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--- End View Customer Details Model -->

<!--- Help Model -->

<div class="modal fade" id="help_modal" tabindex="-1" role="dialog" aria-labelledby="help_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="help_modal">Keyboard Shortcuts</h4>
      </div>

      <div class="modal-body">

        <table class="table table-bordered">
          <tr>
            <td><kbd>CTRL + H</kbd></td>
            <th>Keyboard Shortcuts</th>
          </tr>
          <tr>
            <td><kbd>CTRL + A</kbd></td>
            <th>New Customer</th>
          </tr>
          <tr>
            <td><kbd>CTRL + S</kbd></td>
            <th>Save Data</th>
          </tr>
          <tr> 
            <td><kbd>ALT + S</kbd></td>
            <th>Search Data</th>
          </tr>
          <tr>
            <td><kbd>CTRL + U</kbd></td>
            <th>Update Data (if row are selected)</th>
          </tr>
          <tr>
            <td><kbd>CTRL + D</kbd></td>
            <th>Delete Data (if row are selected)</th>
          </tr>
        </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--- End Help Model -->

<?php include 'include/footer.php'; ?>

</div>

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="dist/js/app.js"></script>
<script src="formvalidation/vendor/formvalidation/js/formValidation.min.js"></script>
<script src="formvalidation/vendor/formvalidation/js/framework/bootstrap.min.js"></script>
<script src="plugins/sweetalert/sweetalert2.min.js"></script>
<script src="dist/js/shortcut.js"></script>
<script src="dist/js/jquery-ui.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="plugins/datatables/extensions/KeyTable/js/dataTables.keyTable.min.js"></script>
<script src="plugins/datatables/extensions/Select/js/dataTables.select.min.js"></script>
<script>
var table,id;
function readURLAdd(input) {
   $('#add_image_show').show();
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
       $('#add_image_show').attr('src', e.target.result)};
       reader.readAsDataURL(input.files[0]);
  }
}
function readURLUpdate(input) {
   $('#update_image_show').show();
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
       $('#update_image_show').attr('src', e.target.result)};
       reader.readAsDataURL(input.files[0]);
  }
}
$(document).ready(function() {

    table = $('#table').DataTable( {
        "processing": true,
        "serverSide": true,
        "ordering": false,
        "pageLength": 12,
        deferRender: true,
        keys: true,
        select: {
          style:"single",
        },
        language: {
            searchPlaceholder: "Search Customer"
        },
        "ajax": "ajax/View/View-Customer.php",
        // "order": [[ 0, "desc" ]],
        "drawCallback": function( settings ) {
            setTimeout(function() {
              table.cell(':eq(1)').focus();
              table.row(':eq(0)', { page: 'current' }).select();
            },1000);
        },
    })
    .on('key-focus', function() {
      //table.rows('.selected').deselect();
      $('#table').DataTable().row(getRowIdx()).select();

    })
    .on('click', 'tbody td', function() {
      var rowIdx = $('#table').DataTable().cell(this).index().row;
      $('#table').DataTable().row(rowIdx).select();
      //alert(rowIdx);
    })
    .on('key', function(e, datatable, key, cell, originalEvent) {
      if (key === 13) {
        var data = $('#table').DataTable().row(getRowIdx()).data();
        Edit_Customer(data[0]);
      }
      if(key == 38) {
        table.rows('.selected').deselect();
      }
    });



    // $('#table tbody').on('click', 'tr', function () {
    //     var data = table.row( this ).data();

    //     //alert( 'You clicked on '+data[0]+'\'s row' );
    // } );

     // $('#example tbody').on( 'click', 'tr', function () {
     //   $("#example tbody tr").removeClass('selected');        
     //   $(this).addClass('selected');
     //   alert('ok');
     // });



    function getRowIdx() {
      return $('#table').DataTable().cell({
        focused: true
      }).index().row;
    }

    $('#edit').click(function() {
      id = $('.selected td:eq(0)').text();
      Edit_Customer(id);
    });

    $('#delete').click(function() {
      id = $('.selected td:eq(0)').text();
      Delete_Customer(id);
    });

    // table.on( 'search.dt', function () {
    //   setTimeout(function() {
    //     table.cell(':eq(1)').focus();
    //     table.row(':eq(0)', { page: 'current' }).select();
    //   },500);
    // });



    setTimeout(function() {
      table.cell(':eq(1)').focus();
      table.row(':eq(0)', { page: 'current' }).select();
    },1000);

    // table.on( 'key', function ( e, datatable, key, cell, originalEvent ) {
    //   if ( key === 13 ) {
    //     var id = datatable.row( cell.index().row ).data();
        
    //   }
    // });

    shortcut.add("Alt+S",function() {
      $('div.dataTables_filter input').focus();
    });

    shortcut.add("Ctrl+D",function() {
      $('#delete').trigger('click');
    });

    shortcut.add("Ctrl+U",function() {
      $('#edit').trigger('click');
    });

    // Keytable Enable/Disable Function

    $('#add_customer_modal').on('shown.bs.modal', function () {
      table.keys.disable();
      shortcut.add("Ctrl+S",function() {
        $('#addsave').trigger('click');
      });
    });

    $('#update_customer_modal').on('shown.bs.modal', function () {
      table.keys.disable();
      shortcut.add("Ctrl+S",function() {
        $('#updatesave').trigger('click');
      });
    });

    $('#view_customer_modal').on('shown.bs.modal', function () {
      table.keys.disable();
    });


    $('#add_customer_modal').on('hidden.bs.modal', function () {
      table.keys.enable();
      shortcut.remove("Ctrl+S");
      setTimeout(function() { table.cell( ':eq(1)' ).focus();  }, 500);
    });

    $('#update_customer_modal').on('hidden.bs.modal', function () {
      table.keys.enable();
      shortcut.remove("Ctrl+S");
      setTimeout(function() { table.cell( ':eq(1)' ).focus();  }, 500);
    });

    $('#view_customer_modal').on('hidden.bs.modal', function () {
      table.keys.enable();
      setTimeout(function() { table.cell( ':eq(1)' ).focus();  }, 500);
    });


    // End Keytable Enable/Disable Function
        

    shortcut.add("Ctrl+A",function() {
      $('#add_customer_modal').modal('show');
    });

     shortcut.add("Ctrl+H",function() {
      $('#help_modal').modal('show');
    });

    

    // Add Customer

    $('#add_customer_form')
    .find('[name="dob"]')
    .datepicker({
        dateFormat: 'dd-mm-yy',
        changeYear:true,
        changeMonth:true,
        onSelect: function(date, inst) {
            $('#add_customer_form').formValidation('revalidateField', 'dob');
        }
    });

    $('#add_customer_form')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {
                    row:".col-md-4",
                    validators: {
                        notEmpty: {
                            message: 'The name is required'
                        }
                    }
                },
                mobile: {
                    row:".col-md-4",
                    validators: {
                        notEmpty: {
                            message: 'The mobile is required'
                        },
                        integer: {
                          message: 'only number are allowed'
                        },
                        remote: {
                            message: 'The mobile already use',
                            url: 'ajax/check-customer-mobile.php',
                            type: 'POST',
                            delay: 200
                        },
                    }
                },
                dob: {
                    row:".col-md-4",
                    validators: {
                        date: {
                            format: 'DD-MM-YYYY',
                            message: 'The date is not valid'
                        }
                    }
                },
            }
        })
        .on('success.form.fv', function(e) {
            // Prevent form submission
            e.preventDefault();

            var $form    = $(e.target),
                formData = new FormData(),
                params   = $form.serializeArray(),
                files    = $form.find('[name="image"]')[0].files;

            $.each(files, function(i, file) {
                formData.append('image', file);
            });

            $.each(params, function(i, val) {
                formData.append(val.name, val.value);
            });

            $.ajax({
                url: $form.attr('action'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                beforeSend: function() {
                  $('#addsave').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(result) {
                $('#addsave').html('Save');
                swal({ 
                  type: "success",
                  title: "Success",
                  text: "Customer Successfully Added !",
                  timer: 800,
                  showConfirmButton: false
                });
                setTimeout(function() { $('#add_customer_modal').modal('hide'); }, 700);
                //alert(result);
                setTimeout(function() { table.ajax.reload(null, false); }, 900);
                setTimeout(function() { table.cell( ':eq(1)' ).focus();  }, 1500);
                $('#add_customer_form').data('formValidation').resetForm(true);
                $("#add_customer_form")[0].reset();
                }
            });
        });

      // Update Customer

    $('#update_customer_form')
    .find('[name="dob"]')
    .datepicker({
        dateFormat: 'dd-mm-yy',
        changeYear:true,
        changeMonth:true,
        onSelect: function(date, inst) {
            $('#update_customer_form').formValidation('revalidateField', 'dob');
        }
    });

    $('#update_customer_form')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {
                    row:".col-md-4",
                    validators: {
                        notEmpty: {
                            message: 'The name is required'
                        }
                    }
                },
                mobile: {
                    row:".col-md-4",
                    validators: {
                        integer: {
                          message: 'only number are allowed'
                        },
                        remote: {
                            message: 'The mobile already use',
                            url: 'ajax/check-customer-mobile.php',
                            type: 'POST',
                            delay: 200
                        },
                    }
                },
                dob: {
                    row:".col-md-4",
                    validators: {
                        date: {
                            format: 'DD-MM-YYYY',
                            message: 'The date is not valid'
                        }
                    }
                },
            }
        })
        .on('success.form.fv', function(e) {
            // Prevent form submission
            e.preventDefault();

            var $form    = $(e.target),
                formData = new FormData(),
                params   = $form.serializeArray(),
                files    = $form.find('[name="image"]')[0].files;

            $.each(files, function(i, file) {
                formData.append('image', file);
            });

            $.each(params, function(i, val) {
                formData.append(val.name, val.value);
            });

            $.ajax({
                url: $form.attr('action'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                beforeSend: function() {
                  $('#updatesave').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(result) {
                $('#updatesave').html('Save');
                swal({ 
                  type: "success",
                  title: "Success",
                  text: "Customer Successfully Updated !",
                  timer: 800,
                  showConfirmButton: false
                });
                setTimeout(function() { $('#update_customer_modal').modal('hide'); }, 700);
                //alert(result);
                setTimeout(function() { table.ajax.reload(null, false);  }, 900);
                setTimeout(function() { table.cell( ':eq(1)' ).focus();  }, 1500);
                $('#update_customer_form').data('formValidation').resetForm(true);
                $("#update_customer_form")[0].reset();

                }
            });
        });

});
function Delete_Customer(id) {
  swal({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then(function () {
    $.ajax({
      type:"POST",
      url:"ajax/Delete/Delete-Customer.php",
      data:"id="+id,
      success: function() {
        swal({ 
          type: "success",
          title: "Deleted",
          text: "Customer Successfully Deleted !",
          timer: 500,
          showConfirmButton: false
        });
        table.ajax.reload(null, false);
        setTimeout(function() { table.cell( ':eq(1)' ).focus();  }, 500);
      }
    });
  });
}
function Edit_Customer(id) {
  $.ajax({
    type:"POST",
    url:"ajax/Fetch/Fetch-Customer.php",
    data:"id="+id,
    dataType:"json",
    success: function(data) {
      $('#update_customer_modal').modal('show');
      $('#update_customer_modal input[name="id"]').val(data.customer_id);
      $('#update_customer_modal input[name="name"]').val(data.name);
      $('#update_customer_modal input[name="umobile"]').val(data.mobile);
      $('#update_customer_modal #mobile').text(data.mobile);
      $('#update_customer_modal input[name="telephone"]').val(data.telephone);
      $('#update_customer_modal input[name="email"]').val(data.email);
      $('#update_customer_modal input[name="dob"]').val(data.dob);
      $('#update_customer_modal textarea[name="address"]').val(data.address);
      $('#update_customer_modal #update_image_show').show();
      $('#update_customer_modal #update_image_show').attr('src', 'dist/img/customer/'+data.image);
    }
  })
}
function Get_Details_Customer(id) {
  $.ajax({
    type:"POST",
    url:"ajax/View/View-Customer-Details.php",
    data:"id="+id,
    success: function(data) {
      $('#view_customer_modal').modal('show');
      $('#view_customer_details').html(data);
    }
  })
}
</script>
</body>
</html>
