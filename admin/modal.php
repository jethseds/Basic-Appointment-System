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
          <button type="submit" name="deleteschedule" class="btn btn-sm" style="background-color: #03a9f4;color: #fff;">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Add Schedule -->
<div class="modal fade" id="addschedule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="../controller/controller.php">
                            <div style="width: 400px;margin: auto;">
                                <input type="hidden" name="tbl_appointmentschedule_id" value="<?php if(isset($_GET['tbl_appointmentschedule_id'])){ echo $_GET['tbl_appointmentschedule_id']; }else{ echo ''; } ?>">
                                <div>
                                    <div class="form-group" style="position: relative;">
                                        <label>Date</label>
                                        <div style="position: absolute;top: 0;left: 0;width: 94%;height: 100%;background-color: red;z-index: 1;opacity: 0;"></div>
                                        <div class="form-control p-0" style="padding: unset;padding-left: 10px;">
                                          <input type="" name="date" id="datepicker" class="form-control border-0 rounded-0" required>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label>Time</label>
                                        <div class="row">
                                          <div class="col-xs-6">
                                            <select name="time1" class="form-control border-0 mr-1 rounded-0" required>
                                                <?php if(isset($_GET['tbl_appointmentschedule_id'])){ 
                                                    $explode = explode('-', $row['time']); ?> 
                                                <option value="<?php echo $explode[0]; ?>"><?php echo $explode[0]; ?></option>
                                                <?php } ?>
                                                    <option value="08:00 AM">08:00 AM</option>
                                                    <option value="08:30 AM">08:30 AM</option>
                                                    <option value="09:00 AM">09:00 AM</option>
                                                    <option value="09:30 AM">09:30 AM</option>
                                                    <option value="10:00 AM">10:00 AM</option>
                                                    <option value="10:30 AM">10:30 AM</option>
                                                    <option value="11:00 AM">11:00 AM</option>
                                                    <option value="11:30 AM">11:30 AM</option>
                                                    <option value="12:00 AM">12:00 AM</option>
                                                    <option value="12:30 AM">12:30 AM</option>
                                                    <option value="01:00 PM">01:00 PM</option>
                                                    <option value="01:30 PM">01:30 PM</option>
                                                    <option value="02:00 PM">02:00 PM</option>
                                                    <option value="02:30 PM">02:30 PM</option>
                                                    <option value="03:00 PM">03:00 PM</option>
                                                    <option value="03:30 PM">03:30 PM</option>
                                                    <option value="04:00 PM">04:00 PM</option>
                                                    <option value="04:30 PM">04:30 PM</option>
                                                    <option value="05:00 PM">05:00 PM</option>
                                                    <option value="05:30 PM">05:30 PM</option>
                                                    <option value="06:00 PM">06:00 PM</option>
                                                    <option value="06:30 PM">06:30 PM</option>
                                                    <option value="07:00 PM">07:00 PM</option>
                                                    <option value="07:30 PM">07:30 PM</option>
                                                    <option value="08:00 PM">08:00 PM</option>
                                                    <option value="08:30 PM">08:30 PM</option>
                                                    <option value="09:00 PM">09:00 PM</option>
                                                    <option value="09:30 PM">09:30 PM</option>
                                            </select>
                                          </div>
                                          <div class="col-xs-6">
                                            <select name="time2" class="form-control border-0 ml-1 rounded-0" required>
                                                <?php if(isset($_GET['tbl_appointmentschedule_id'])){ 
                                                    $explode = explode('-', $row['time']); ?> 
                                                <option value="<?php echo $explode[1]; ?>"><?php echo $explode[1]; ?></option>
                                                <?php } ?>
                                            <option value="08:00 AM">08:00 AM</option>
                                            <option value="08:30 AM">08:30 AM</option>
                                            <option value="09:00 AM">09:00 AM</option>
                                            <option value="09:30 AM">09:30 AM</option>
                                            <option value="10:00 AM">10:00 AM</option>
                                            <option value="10:30 AM">10:30 AM</option>
                                            <option value="11:00 AM">11:00 AM</option>
                                            <option value="11:30 AM">11:30 AM</option>
                                            <option value="12:00 AM">12:00 AM</option>
                                            <option value="12:30 AM">12:30 AM</option>
                                            <option value="01:00 PM">01:00 PM</option>
                                            <option value="01:30 PM">01:30 PM</option>
                                            <option value="02:00 PM">02:00 PM</option>
                                            <option value="02:30 PM">02:30 PM</option>
                                            <option value="03:00 PM">03:00 PM</option>
                                            <option value="03:30 PM">03:30 PM</option>
                                            <option value="04:00 PM">04:00 PM</option>
                                            <option value="04:30 PM">04:30 PM</option>
                                            <option value="05:00 PM">05:00 PM</option>
                                            <option value="05:30 PM">05:30 PM</option>
                                            <option value="06:00 PM">06:00 PM</option>
                                            <option value="06:30 PM">06:30 PM</option>
                                            <option value="07:00 PM">07:00 PM</option>
                                            <option value="07:30 PM">07:30 PM</option>
                                            <option value="08:00 PM">08:00 PM</option>
                                            <option value="08:30 PM">08:30 PM</option>
                                            <option value="09:00 PM">09:00 PM</option>
                                            <option value="09:30 PM">09:30 PM</option>
                                        </select>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label>Slot</label>
                                        <input name="available" class="form-control border-0 available rounded-0" value="<?php if(isset($_GET['tbl_appointmentschedule_id'])){ echo $row['available']; } ?>" required>
                                    </div>
                                </div>
                               
                            </div>
                      
        <div class="modal-footer">
          <button type="submit" name="setschedule" class="btn btn-sm" style="background-color: #03a9f4;color: #fff;">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Set Employees Doctor -->
<div class="modal fade" id="setemployeesdoctor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Set Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="../controller/controller.php">
        <div class="modal-body">
          <input type="hidden" name="id" class="users_id">
          <h4 class="text-center">Are you sure you want to set as your employee?</h4>
        </div>
        <div class="modal-footer">
          <button type="submit" name="setemployee" class="btn btn-sm text-white" style="background-color: #03a9f4;color: #fff;">Set</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Update Status Appointment Reservation -->
<div class="modal fade" id="updatestatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Set Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="../controller/controller.php">
        <div class="modal-body">
          <input type="hidden" name="appointmentreservation_id" class="appointmentreservation_id">
          <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
              <option value="1">Confirmed</option>
              <option value="2">Completed</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="updatestatus" class="btn btn-sm text-white" style="background-color: #03a9f4;color: #fff;">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Proof -->
<div class="modal fade" id="proof" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Proof</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="../controller/controller.php">
        <div class="modal-body">
          <div class="showproof">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="proof" class="btn btn-sm text-white" style="background-color: #03a9f4;color: #fff;">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>


