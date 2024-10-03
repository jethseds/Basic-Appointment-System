<div class="container-fluid footer">
    <div style="max-width: 1440px" class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="card border-0 bg-transparent">
            <div class="card-body">
              <h5 class="mb-4 text-white">Contact</h5>
              <div class="d-flex"><div><i class="fas fa-phone-alt"></i></div> <p>(+639) 123 456 789</p></div>
              <div class="d-flex"><div><i class="fas fa-envelope"></i></div> <p>clinicschedulingsystem@email.com</p></div>
              <div class="d-flex"><div><i class="fas fa-map-marker-alt"></i></div> <p>State Caloocan Sangandaan</p></div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card border-0 bg-transparent">
            <div class="card-body">
              <h5 class="mb-4 text-white">Information</h5>
              <div class="d-flex"><p>About</p></div>
              <div class="d-flex"><p>Contact</p></div>
              <div class="d-flex"><p>Blog</p></div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card border-0 bg-transparent">
            <div class="card-body">
              <h5 class="mb-4 text-white">Quick Links</h5>
              <div class="d-flex"><p>Schedule</p></div>
              <div class="d-flex"><p>Events</p></div>
              <div class="d-flex"><p>Meetins</p></div>
            </div>
          </div>
        </div>
      </div>
    </div>
 </div>

<footer class="p-3 text-center">
<small>© Copyright 2022. Clinic Scheduling System</small>
</footer>

<script src="../asset/js/jquery.slim.min.js"></script>
<script src="../asset/js/bootstrap.bundle.min.js"></script>
<script src="../asset/js/fontawesome.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script>



  $(document).ready(function() {
    $("#example").DataTable({
      aaSorting: [],
      responsive: true,

      columnDefs: [
        {
          responsivePriority: 1,
          targets: 0
        },
        {
          responsivePriority: 2,
          targets: -1
        }
      ]
    });

    $(".dataTables_filter input")
      .attr("placeholder", "Search here...")
      .css({
        width: "170px",
        display: "inline-block"
      });

    $('[data-toggle="tooltip"]').tooltip();
  });

  $('.delete').click(function(){
    $('.id').val($(this).data('tbl_appointmentschedule_id'))
  })

  $('.selectschedule').click(function(){
    $('.tbl_appointmentschedule_id').val($(this).data('tbl_appointmentschedule_id'))
  })

  
</script>