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



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Appointment
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!--li>Products</li-->
        <li class="active">Appointment</li>
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
                                <th>Patients</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php  while ($row = $appointment_doctor_stmt->fetch()) { ?>
                              <tr>
                                <td class="small"><?php echo $row['firstname']." ".$row['lastname'] ?></td>
                                <td class="small"><?php echo date('F j, Y', strtotime($row['date'])) ?></td>
                                <td class="small"><?php echo $row['time'] ?></td>
                                <td class="small">
                                  <?php if ($row['appointmentreservation_status'] == 0) { ?>
                                    <small class="text-white bg-success" style="padding: 5px;background-color: #009688;color: #fff;">Pending</small>
                                  <?php }else if ($row['appointmentreservation_status'] == 1) {?>
                                    <small class="text-white bg-warning" style="padding: 5px;background-color: #ffc107;color: #fff;">Confirmed</small>
                                  <?php }else if ($row['appointmentreservation_status'] == 2) { ?>
                                    <small class="text-white bg-primary" style="padding: 5px;background-color: #2196f3;color: #fff;">Completed</small>
                                  <?php } ?>
                                </td>
                                <td class="small">
                                    <a class="btn updatestatus" style="color: #03a9f4;" data-toggle="modal" data-target="#updatestatus" data-appointmentreservation_id="<?php echo $row['appointmentreservation_id'] ?>"><i class="fas fa-edit"></i></a>
                                    
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

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'category_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.catid').val(response.id_menu);
      $('#edit_name').val(response.name_menu);
      $('.catname').html(response.name_menu);
    }
  });
}

$('.proof').click(function(){

  appointmentreservation_id = $(this).data('appointmentreservation_id')
  $.ajax({
    url: 'proof.php',
    type: 'POST',
    data: {appointmentreservation_id:appointmentreservation_id,},
    success: function(data){
      $('.showproof').html(data)
    }
  })
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