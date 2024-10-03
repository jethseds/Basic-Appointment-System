
<header class="main-header">
  <!-- Logo -->
<!--   <a href="#" class="logo">

    EVALUATION SYSTEM
  </a> -->
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <?php
          $sql = "SELECT * FROM tbl_users WHERE users_id = '".$_SESSION['users_id']."'";
          $stmt = $this->conn()->query($sql);
          $row = $stmt->fetch();
                ?>
          
            <span class="hidden-xs"><?php echo $row['lastname']." ".$row['firstname'] ?></span>
          </a>
          <!-- <ul class="dropdown-menu">
            <li class="user-header">
         

              <p>
                <?php echo $row['lastname']." ".$row['firstname'] ?>
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="#profile" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile" 

                data-users_id="<?php echo $row['users_id'] ?>" 
                data-lastname="<?php echo $row['lastname'] ?>" 
                data-firstname="<?php echo $row['firstname'] ?>" 
                data-middlename="<?php echo $row['middlename'] ?>" 
                data-email="<?php echo $row['email'] ?>" 
                data-password="<?php echo $row['passwordtxt'] ?>">Update</a>
              </div>
              <div class="pull-right">
                <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul> -->
        </li>
      </ul>
    </div>
  </nav>
</header>