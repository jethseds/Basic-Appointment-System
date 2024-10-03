<?php 

  include '../config/config.php';
  class data extends Connection{ 
      public function managedata(){

            $appointmentreservation_id = $_POST['appointmentreservation_id'];
            $sql = "SELECT * FROM appointmentreservation WHERE appointmentreservation_id = '".$appointmentreservation_id."'";
            $stmt = $this->conn()->query($sql);
            $row = $stmt->fetch();
        
?>
<img src="../images/<?php echo $row['proof'] ?>" width="100%">



<?php
                      }
                        
                  }

                    $data = new data();
                    $data->managedata();
                              
                  ?>