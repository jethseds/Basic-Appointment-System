<?php 

  include '../config/config.php';
  class data extends Connection{ 
      public function managedata(){

            $tbl_appointmentschedule_id = $_POST['tbl_appointmentschedule_id'];
            $sql = "SELECT * FROM tbl_appointmentschedule WHERE tbl_appointmentschedule_id = '".$tbl_appointmentschedule_id."'";
            $stmt = $this->conn()->query($sql);
            $row = $stmt->fetch();
        
?>
<div class="form-group">
                                        <label>Time</label>
                                        <div class="row">
                                          <div class="col-xs-6">
                                            <select name="time1" class="form-control border-0 mr-1 rounded-0" required>
                                                <?php $explode = explode('-', $row['time']); ?> 
                                                <option value="<?php echo $explode[0]; ?>"><?php echo $explode[0]; ?></option>
                                                
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
                                                <?php $explode = explode('-', $row['time']); ?> 
                                                <option value="<?php echo $explode[1]; ?>"><?php echo $explode[1]; ?></option>
                                                
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



<?php
                      }
                        
                  }

                    $data = new data();
                    $data->managedata();
                              
                  ?>