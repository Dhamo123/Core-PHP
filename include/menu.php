<?php 
$url = $_SERVER['HTTP_HOST'].parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$main = explode('/', $main, 2)[0];
?>

<aside class="main-sidebar">
  <section class="sidebar">

    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo $base_url; ?>/dist/img/avatar5.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $user_data['First_Name'].' '.$user_data['Last_Name']; ?></p>
        <div class="digital-date" style="display: table-cell; padding-right: 10px;"></div>
      <div class="digital-clock" style="display: table-cell;"></div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">HEADER</li>

      <li class="<?php echo ($main == 'dashboard' ? 'active' : '') ?>"><a href="<?php echo $base_url; ?>/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      

      <li class="<?php echo ($main == 'manage-customer' ? 'active' : '') ?>"><a href="<?php echo $base_url; ?>/manage-customer"><i class="fa fa-users"></i> <span>Manage Customer</span></a></li>
      
      
      <li><a href="<?php echo $base_url; ?>/logout.php"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>

     
    </ul>
  </section>
</aside>
