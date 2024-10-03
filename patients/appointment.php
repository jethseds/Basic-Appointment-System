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
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Created Date</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php  while ($row = $appointment_patient_stmt->fetch()) { ?>
                              <tr>
                                <td><?php echo date('F j, Y', strtotime($row['date'])) ?></td>
                                <td><?php echo $row['time'] ?></td>
                                <td>
                                  <?php if ($row['appointmentreservation_status'] == 0) { ?>
                                    <small class="text-white p-1 bg-success" style="background-color: #009688;padding: 5px;color: #fff;">Pending</small>
                                  <?php }else if ($row['appointmentreservation_status'] == 1) {?>
                                    <small class="text-white p-1 bg-warning" style="background-color: #ffc107;padding: 5px;color: #fff;">Confirmed</small>
                                  <?php }else if ($row['appointmentreservation_status'] == 2) { ?>
                                    <small class="text-white p-1 bg-primary" style="background-color: #2196f3;padding: 5px;color: #fff;">Completed</small>
                                  <?php }else if ($row['appointmentreservation_status'] == 5) { ?>
                                    <small class="text-white p-1 bg-danger">Cancelled</small>
                                  <?php } ?>
                                </td>
                                <td><?php echo date('F j, Y', strtotime($row['created_date'])) ?></td>
                              
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

      $('.payment').click(function(){
        appointmentreservation_id = $(this).val();

        $('#payment_appointmentreservation_id').val(appointmentreservation_id)

        $.ajax({
          url: 'payment.php',
          type: 'POST',
          data: {appointmentreservation_id:appointmentreservation_id,},
          success: function(data){

            $('.paymentproof').html(data)

          }
        })
      })


        $(document).ready(function() {
    function close_accordion_section() {
        $('.accordion .accordion-section-title').removeClass('active');
        $('.accordion .accordion-section-content').slideUp(300).removeClass('open');
    }

    $('.accordion-section-title').click(function(e) {
        // Grab current anchor value
        var currentAttrValue = $(this).attr('href');

        if($(e.target).is('.active')) {
            close_accordion_section();
        }else {
            close_accordion_section();

            // Add active class to section title
            $(this).addClass('active');
            // Open up the hidden content panel
            $('.accordion ' + currentAttrValue).slideDown(300).addClass('open');
        }

        e.preventDefault();
    });
});

      
    </script>

</body>
</html>
<?php
                      }
                        
                  }

                    $data = new data();
                    $data->managedata();
                              
                  ?>