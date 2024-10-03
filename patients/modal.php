<!-- Delete Schedule -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="../controller/controller.php">
        <div class="modal-body">
          <input type="hidden" name="id" class="id">
          <h4 class="text-center">Are you sure you want to delete data?</h4>
        </div>
        <div class="modal-footer">
          <button type="submit" name="employeedeleteschedule" class="btn btn-sm " style="background-color: #03a9f4;color: #fff;">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Select Schedule -->
<div class="modal fade" id="selectschedule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="../controller/controller.php">
        <div class="modal-body">
          <input type="hidden" name="doctor_id" class="users_id" value="<?php echo $_GET['users_id'] ?>">
          <input type="hidden" name="tbl_appointmentschedule_id" class="tbl_appointmentschedule_id">
          <h4 class="text-center">Are you sure you want to select this schedule?</h4>
        </div>
        <div class="modal-footer">
          <button type="submit" name="selectschedule" class="btn btn-sm " style="background-color: #03a9f4;color: #fff;">Select</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Cancel Appointment -->
    <div class="modal fade" id="cancelappointment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cancel Appointment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="../controller/controller.php">
            <div class="modal-body">
              <div class="form-group">
                <input type="hidden" name="appointmentreservation_id" id="appointmentreservation_id">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="8"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="cancelappointment" class="btn rounded-0 " style="background-color: #03a9f4;color: #fff;">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>


<!-- Payment -->
  <div class="modal fade" id="payment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Upload Proof</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="../controller/controller.php" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                <input type="hidden" name="appointmentreservation_id" id="payment_appointmentreservation_id">
                <label>Proof</label>
                <input type="file" name="proof" class="form-control">
              </div>
              <div class=" paymentproof"></div>
              <div class="form-group">
                <div class="accordion">
                          <div class="accordion-section">
                            <a href="#accordion-2" class="accordion-section-title">Terms & Conditions</a>
                            <input type="checkbox" required>

                            <div id="accordion-2" class="accordion-section-content" style="display: none;">
                              
                <p>Should you wish to change your order after your payment has been processed, please call us immediately on +613 8290 0599 and we will try our best to accommodate your request.&nbsp; There may be some instances where we are unable to modify your order.</p>
                <p>Should you wish to cancel your order after payment has been processed, please call us immediately on +613 8290 0599<span class="Apple-style-span">&nbsp;<span>and we will try our best to accommodate your request.&nbsp;</span></span>We are unable to cancel orders after items have been shipped.</p>
                            </div>
                          </div>
                          
                          </div>

        
      
        




              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="payment" class="btn rounded-0 " style="background-color: #03a9f4;color: #fff;">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>