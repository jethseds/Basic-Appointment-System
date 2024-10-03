<?php

    session_start();
    include '../config/config.php';

    class controller extends Connection{

        public function managecontroller(){


            // Login
            if (isset($_POST['login']) OR isset($_POST['login2'])) {

                $email = $_POST['email'];
                $password = $_POST['password'];

                $sql = "SELECT * FROM tbl_users WHERE email = ?";
                $stmt = $this->conn()->prepare($sql);
                $stmt->execute([$email]);

                if ($stmt->rowcount() > 0) {

                  $row = $stmt->fetch();

                  if (password_verify($password, $row['password'])) {

                        $_SESSION['users_id'] = $row['users_id'];
                        $_SESSION['type'] = $row['type'];
                        if ($row['type'] == 'Patients') {

                            header('location:../patients/schedule.php');

                        }else{

                            header('location:../admin/schedule.php');

                        }
                      
                  } else {

                    echo "<script type='text/javascript'>alert('Invalid Email And Password');</script>";
                    if (isset($_POST['login'])) {
                        echo "<script>window.location.href='../admin/index.php';</script>";
                    }else{
                        echo "<script>window.location.href='../login.php';</script>";
                    }
                    

                  }

                } else {

                    echo "<script type='text/javascript'>alert('Invalid Email And Password');</script>";
                    if (isset($_POST['login'])) {
                        echo "<script>window.location.href='../admin/index.php';</script>";
                    }else{
                        echo "<script>window.location.href='../login.php';</script>";
                    }

                } 
               
            } 

            if (isset($_POST['register'])) {

                $email = $_POST['email'];
                $contactnumber = $_POST['contactnumber'];
                $lastname = $_POST['lastname'];
                $firstname = $_POST['firstname'];
                $middlename = $_POST['middlename'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $passwordtxt = $_POST['password'];

                $sql = "SELECT * FROM tbl_users WHERE email = ?";
                $stmt = $this->conn()->prepare($sql);
                $stmt->execute([$email]);

                if ($stmt->rowcount() > 0) {
               
                    echo "<script type='text/javascript'>alert('Account Already Exist');</script>";
                    echo "<script>window.location.href='../register.php';</script>";

                } else {

                    $sql = "INSERT INTO tbl_users (email,lastname,firstname,middlename,contact,password,passwordtxt) VALUES (?,?,?,?,?,?,?)";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([$email,$lastname,$firstname,$middlename,$contactnumber,$password,$passwordtxt]);

                    echo "<script type='text/javascript'>alert('Successfully Create Account');</script>";
                    echo "<script>window.location.href='../register.php';</script>";

                }

            }

            if (isset($_POST['selectschedule'])) {

                $patients_id = $_SESSION['users_id'];
                $doctor_id = $_POST['doctor_id'];
                $tbl_appointmentschedule_id = $_POST['tbl_appointmentschedule_id'];

                $sql = "SELECT * FROM appointmentreservation WHERE patients_id = ? AND doctor_id = ? AND tbl_appointmentschedule_id = ?";
                $stmt = $this->conn()->prepare($sql);
                $stmt->execute([$patients_id,$doctor_id,$tbl_appointmentschedule_id]);

                if ($stmt->rowcount() > 0) {

                    echo "<script type='text/javascript'>alert('Schedule Already Exist');</script>";
                    echo "<script>window.location.href='../patients/selectschedule.php?users_id=".$doctor_id."';</script>";

                } else {

                        $sql = "SELECT * FROM tbl_appointmentschedule WHERE tbl_appointmentschedule_id = '".$tbl_appointmentschedule_id."'";
                        $stmt = $this->conn()->query($sql);
                        $row = $stmt->fetch();

                        $available = $row['available'] - 1;
                        $total = $row['total'] + 1;

                        $sql = "UPDATE tbl_appointmentschedule SET available = ?, total = ? WHERE tbl_appointmentschedule_id = '".$tbl_appointmentschedule_id."'";
                        $stmt = $this->conn()->prepare($sql);
                        $stmt->execute([$available,$total]);

                        $sql = "INSERT INTO appointmentreservation (doctor_id,patients_id,tbl_appointmentschedule_id) VALUES (?,?,?)";
                        $stmt = $this->conn()->prepare($sql);
                        $stmt->execute([$doctor_id,$patients_id,$tbl_appointmentschedule_id]);
               
                    echo "<script type='text/javascript'>alert('Successfully Add Schedule');</script>";
                    echo "<script>window.location.href='../patients/schedule.php';</script>";

                }

            }


            // Update Status Appointment Reservation
            if (isset($_POST['updatestatus'])) {

                $appointmentreservation_id = $_POST['appointmentreservation_id'];
                $status = $_POST['status'];
                $month = date('m');
                $year = date('Y');
           
                $sql = "UPDATE appointmentreservation SET month = ?, year = ?, status = ? WHERE appointmentreservation_id = '".$appointmentreservation_id."'";
                $stmt = $this->conn()->prepare($sql);
                $stmt->execute([$month,$year,$status]);
           
                echo "<script type='text/javascript'>alert('Successfully Update Status');</script>";
                echo "<script>window.location.href='../admin/appointment.php';</script>";

            }


            // Set Schedule Doctors
            if (isset($_POST['setschedule'])) {

                $users_id = $_SESSION['users_id'];

                $sql = "SELECT * FROM tbl_users WHERE users_id = '".$users_id."'";
                $stmt = $this->conn()->query($sql);
                $row = $stmt->fetch();

                $date = date('Y-m-d', strtotime($_POST['date']));
                $start = date('Y-m-d', strtotime($_POST['date']));
                $end = date('Y-m-d', strtotime('+1 day', strtotime($_POST['date'])));
                $time = $_POST['time1']."-".$_POST['time2'];
                $available = $_POST['available'];
                $tbl_appointmentschedule_id = $_POST['tbl_appointmentschedule_id'];


                        
                            $sql = "INSERT INTO tbl_appointmentschedule (users_id,date,time,available) VALUES (?,?,?,?)";
                            $stmt = $this->conn()->prepare($sql);
                            $stmt->execute([$users_id,$date,$time,$available]);
                        
                        echo "<script type='text/javascript'>alert('Successfully Add Schedule');</script>";

                        echo "<script>window.location.href='../admin/schedule.php';</script>";

            }else if (isset($_POST['deleteschedule'])) {

                $tbl_appointmentschedule_id = $_POST['id'];

                $sql = "DELETE FROM tbl_appointmentschedule WHERE tbl_appointmentschedule_id = '".$tbl_appointmentschedule_id."'";
                $stmt = $this->conn()->prepare($sql);
                $stmt->execute([]);
           
                echo "<script type='text/javascript'>alert('Successfully Delete Schedule');</script>";

                echo "<script>window.location.href='../admin/schedule.php';</script>"; 
                
                  

            }


            // Appointment Schedule
            if (isset($_POST['addappointmentschedule'])) {

                $date = $_POST['date'];

                $sql = "SELECT * FROM tbl_appointmentschedule WHERE date = ? ";
                $stmt = $this->conn()->prepare($sql);
                $stmt->execute([$date]);

                if ($stmt->rowcount() > 0) {

                    echo "<script type='text/javascript'>alert('Appointment Schedule Already Exist');</script>";
                    echo "<script>window.location.href='../admin/appointmentschedule.php';</script>";

                } else {

                    $count = count($_POST['time']);

                    for ($i=0; $i < $count; $i++) { 

                        $sql = "INSERT INTO timedate (time,date) VALUES (?,?)";
                        $stmt = $this->conn()->prepare($sql);
                        $stmt->execute([$_POST['time'][$i],$date]);

                    }

                    $sql = "INSERT INTO tbl_appointmentschedule (date) VALUES (?)";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([$date]);

                    
               
                    echo "<script type='text/javascript'>alert('Successfully Add Appointment Schedule');</script>";
                    echo "<script>window.location.href='../admin/appointmentschedule.php';</script>";

                }

            }else if (isset($_POST['editappointmentschedule'])) {

                $tbl_appointmentschedule_id = $_POST['tbl_appointmentschedule_id'];
                $date = $_POST['date'];
                    
                $sql = "UPDATE tbl_appointmentschedule SET date = ? WHERE tbl_appointmentschedule_id = '".$tbl_appointmentschedule_id."'";
                $stmt = $this->conn()->prepare($sql);
                $stmt->execute([$date]);                
           
                echo "<script type='text/javascript'>alert('Successfully Edit Appointment Schedule');</script>";
                echo "<script>window.location.href='../admin/appointmentschedule.php';</script>";   

            }else if (isset($_POST['deleteappointmentschedule'])) {

                $tbl_appointmentschedule_id = $_POST['tbl_appointmentschedule_id'];

                $sql = "DELETE FROM tbl_appointmentschedule WHERE tbl_appointmentschedule_id = '".$tbl_appointmentschedule_id."'";
                $stmt = $this->conn()->prepare($sql);
                $stmt->execute([]);
           
                echo "<script type='text/javascript'>alert('Successfully Delete Appointment Schedule');</script>";
                echo "<script>window.location.href='../admin/appointmentschedule.php';</script>";   

            }


            // Schedule
            if (isset($_POST['addsched'])) {

                $p_id = $_POST['p_id'];
                $l_id = $_POST['l_id'];
                $date_sched = $_POST['date_sched'];
                $address = $_POST['address'];
                $reason = $_POST['reason'];

                $sql = "SELECT * FROM tbl_sched WHERE p_id = ? AND l_id =  ?";
                $stmt = $this->conn()->prepare($sql);
                $stmt->execute([$p_id,$l_id]);

                if ($stmt->rowcount() > 0) {

                    echo "<script type='text/javascript'>alert('Schedule Already Exist');</script>";
                    echo "<script>window.location.href='../admin/sched.php';</script>";

                } else {

                    $sql = "INSERT INTO tbl_sched (p_id,l_id,date_sched,address,reason) VALUES (?,?,?,?,?)";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([$p_id,$l_id,$date_sched,$address,$reason]);
               
                    echo "<script type='text/javascript'>alert('Successfully Add Schedule');</script>";
                    echo "<script>window.location.href='../admin/sched.php';</script>";

                }

            }else if (isset($_POST['editsched'])) {

                $s_id = $_POST['s_id'];

                $p_id = $_POST['p_id'];
                $l_id = $_POST['l_id'];
                $date_sched = $_POST['date_sched'];
                $address = $_POST['address'];
                $reason = $_POST['reason'];

                $sql = "UPDATE tbl_sched SET p_id = ?, l_id = ?, date_sched = ?, address = ?, reason = ? WHERE s_id = '".$s_id."'";
                $stmt = $this->conn()->prepare($sql);
                $stmt->execute([$p_id,$l_id,$date_sched,$address,$reason]);

            

           
                echo "<script type='text/javascript'>alert('Successfully Edit Schedule');</script>";
                echo "<script>window.location.href='../admin/sched.php';</script>";   

            }else if (isset($_POST['deletesched'])) {

                $s_id = $_POST['s_id'];

                $sql = "DELETE FROM tbl_sched WHERE s_id = '".$s_id."'";
                $stmt = $this->conn()->prepare($sql);
                $stmt->execute([]);
           
                echo "<script type='text/javascript'>alert('Successfully Delete Schedule');</script>";
                echo "<script>window.location.href='../admin/sched.php';</script>";   

            }



            // Add Appointment Reservations
            if (isset($_POST['addappointmentreservation'])) {

                $users_id = $_SESSION['users_id'];
                $date = $_POST['date'];
                // $reasonforreferral_id = $_POST['reasonforreferral_id'];
                $meeting = $_POST['meeting'];
                $time = $_POST['time'];
                $concern = $_POST['concern'];
                $month = date('m');
                $year = date('Y');

                $sql = "SELECT * FROM tbl_appointmentschedule WHERE date = ?";
                $stmt = $this->conn()->prepare($sql);
                $stmt->execute([$date]);
                $row = $stmt->fetch();

                $available = $row['available'] - 1;
                $tbl_appointmentschedule_id = $row['tbl_appointmentschedule_id'];

                $sql = "UPDATE tbl_appointmentschedule SET available = ? WHERE tbl_appointmentschedule_id = '".$tbl_appointmentschedule_id."'";
                $stmt = $this->conn()->prepare($sql);
                $stmt->execute([$available]);

              

                $sql = "SELECT * FROM appointmentreservation WHERE tbl_appointmentschedule_id = ? AND time = ?";
                $stmt = $this->conn()->prepare($sql);
                $stmt->execute([$tbl_appointmentschedule_id,$time]);

                if ($stmt->rowcount() > 0) {

                    echo "<script type='text/javascript'>alert('Rervations Already Exist');</script>";
                    echo "<script>window.location.href='../users/messages.php?receiver_id=1';</script>";

                } else {

                    $sql = "INSERT INTO appointmentreservation (users_id,meeting,concern,tbl_appointmentschedule_id,time,month,year) VALUES (?,?,?,?,?,?,?)";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([$users_id,$meeting,$concern,$tbl_appointmentschedule_id,$time,$month,$year]);


                    $sql = "UPDATE timedate SET status = 1 WHERE time = '".$time."' AND date = '".$date."'";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([]);

               
                    echo "<script type='text/javascript'>alert('Successfully Add Rervations');</script>";
                    echo "<script>window.location.href='../users/messages.php?receiver_id=1';</script>";

                }

            }

     

        }

    }

    $controllerrun = new controller();
    $controllerrun->managecontroller();

?>
