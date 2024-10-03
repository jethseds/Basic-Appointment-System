<?php session_start(); ?>

<?php
  include '../config/config.php';
  class data extends Connection{ 
      public function managedata(){
      include '../data/data.php'; 
?>
<!DOCTYPE html>
<html>
<head><?php include 'head.php'; ?></head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'navbar.php'; ?>
<?php include 'sidebar.php'; ?>

<?php
if (isset($_GET['tbl_appointmentschedule_id'])) {
            $tbl_appointmentschedule_id = $_GET['tbl_appointmentschedule_id'];
            $sql = "SELECT * FROM tbl_appointmentschedule WHERE tbl_appointmentschedule_id = '".$tbl_appointmentschedule_id."'";
            $my_update_tbl_appointmentschedulestmt = $this->conn()->query($sql);
            $row = $my_update_tbl_appointmentschedulestmt->fetch();
        }
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Select Appointment
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!--li>Products</li-->
        <li class="active">Select Appointment</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body table-responsive">
              <table id="example1" class="table table-hover" style="width:100%">
                            <thead>
                              <tr>
                                <th>Fullname</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php  while ($row = $select_doctors_stmt->fetch()) { ?>
                              <tr>
                                <td><?php echo $row['firstname']." ".$row['lastname'] ?></td>
                                <td><a class="btn text-white btn-sm rounded-0" style="background-color: #03a9f4;color: #fff;" href="selectschedule.php?users_id=<?php echo $row['users_id'] ?>">Select</a>
                                </td>
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
            </div>
          </div>
        </div>
      </div>
    </section>
     
  </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>All rights reserved</b>
        </div>
         <strong>Copyright &copy; 2023 <!--a href="https://www.facebook.com/BermzISware">Bermz ISware Solutions</a--></strong>
    </footer>    <!-- Add -->


</div>
<!-- ./wrapper -->

<?php include 'footer.php'; ?>
<?php include 'modal.php'; ?>
<!-- Active Script -->
<script>


    $(document).on('click', '#admin_profile', function(e){
    e.preventDefault();
    $('#profile').modal('show');
    var user_id = $(this).data('user_id');
    var name = $(this).data('name');
    var email = $(this).data('email');
    var password = $(this).data('password');


    $('#user_id').val(user_id)
    $('#name').val(name)
    $('#email').val(email)
    $('#password').val(password)


    getRow(id);
  });
$(function(){
  /** add active class and stay opened when selected */
  var url = window.location;
  
  // for sidebar menu entirely but not cover treeview
  $('ul.sidebar-menu a').filter(function() {
      return this.href == url;
  }).parent().addClass('active');

  // for treeview
  $('ul.treeview-menu a').filter(function() {
      return this.href == url;
  }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

});
</script>
<!-- Data Table Initialize -->
<script>
  $(function () {
    $('#example1').DataTable({
      responsive: true
    })
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script>
      $('.cancelappointment').click(function(){
        appointmentreservation_id = $(this).val();

        $('#appointmentreservation_id').val(appointmentreservation_id)

      })
    </script>

</body>
</html>
<?php
                      }
                        
                  }

                    $data = new data();
                    $data->managedata();
                              
                  ?>