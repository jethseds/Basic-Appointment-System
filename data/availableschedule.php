
<?php
  include '../config/config.php';
  class data extends Connection{ 
      public function managedata(){ 
     
        $sql = "SELECT * FROM tbl_appointmentschedule WHERE date = '".$_POST['date']."'";
        $stmt = $this->conn()->query($sql);
        while ($row = $stmt->fetch()) { ?>

        
        <?php 
        if ($row['available'] > 0) { ?>
          <label class="text-success">Available: <?php echo $row['available'] ?></label>
        <?php }else{ ?>
          <label class="text-danger">Not Available 0</label>
        <?php } ?>
                    

<?php } } } $data = new data(); $data->managedata(); ?>