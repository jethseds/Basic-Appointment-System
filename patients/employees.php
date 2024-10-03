<?php include 'session.php'; ?>

<?php
  include '../config/config.php';
  class data extends Connection{ 
      public function managedata(){ 
        include '../data/data.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <?php include 'include/head.php'; ?>
  </head>
  <body style="background-color: #f0f4fc;">
    <?php include 'include/navbar.php'; ?>
    <div class="container-fluid" style="margin-top: 200px;margin-bottom: 100px;">
        <div class="container">
            <h3 class="text-center">Employees</h3>
              <div class="table-responsive">
                <table id="example" class="table table-hover" style="width:100%">
                  <thead>
                    <tr>
                      <th>Fullname</th>
                      <th>Contact</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php  while ($row = $tbl_usersemployeesstmt->fetch()) { ?>
                    <tr>
                      <td><?php echo $row['firstname']." ".$row['lastname'] ?></td>
                      <td><?php echo $row['contact'] ?></td>
                      <td><?php echo $row['email'] ?></td>
                      <td><a class="btn setemployeesdoctor" style="color: #03a9f4;" data-toggle="modal" data-target="#setemployeesdoctor" data-users_id="<?php echo $row['users_id'] ?>">Set Employees</a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
        </div>
    </div>

    <?php include 'modal.php'; ?>
    <?php include 'include/footer.php'; ?>
  </body>
</html>
<?php
    }   }
    $data = new data();
    $data->managedata();
?>