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
                                        <label>Select</label>
                                        <select name="label" class="form-control border-0 rounded-0" required>
                                            <option value="<?php echo $row['label']; ?>"><?php echo $row['label']; ?></option>
                                            <option value="Online">Online</option>
                                            <!-- <option value="Walk-in">Walk-in</option> -->
                                        </select>
                                    </div>



<?php
                      }
                        
                  }

                    $data = new data();
                    $data->managedata();
                              
                  ?>