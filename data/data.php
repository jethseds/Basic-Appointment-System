<?php
date_default_timezone_set('Asia/Manila');


$sql = "SELECT * FROM tbl_users WHERE type = 'Doctors'";
$tbl_doctors_admin_stmt = $this->conn()->query($sql);

$sql = "SELECT * FROM tbl_users WHERE type = 'Employees'";
$tbl_employees_admin_stmt = $this->conn()->query($sql);

$sql = "SELECT * FROM tbl_users WHERE type = 'Admin'";
$select_doctors_stmt = $this->conn()->query($sql);


if (isset($_GET['users_id'])) {
	$sql = "SELECT * FROM tbl_appointmentschedule WHERE available > 0 AND users_id = '".$_GET['users_id']."'";
	$select_doctors_schedule_stmt = $this->conn()->query($sql);
}

// Show Schedule Resched to employees
if (isset($_GET['doctor_id'])) {
	$sql = "SELECT * FROM tbl_appointmentschedule WHERE available > 0 AND users_id = '".$_GET['doctor_id']."'";
	$select_doctors__resched_schedule_stmt = $this->conn()->query($sql);
}

// Profile
if (isset($_SESSION['users_id'])) {
	$sql = "SELECT * FROM tbl_users WHERE users_id = '".$_SESSION['users_id']."'";
	$profilestmt = $this->conn()->query($sql);
}

// Doctor SHow Schedule
if (isset($_SESSION['users_id'])) {
	$sql = "SELECT * FROM tbl_appointmentschedule WHERE users_id = '".$_SESSION['users_id']."'";
	$my_tbl_appointmentschedulestmt = $this->conn()->query($sql);
}

// Appointment Patients
if (isset($_SESSION['users_id'])) {
	$sql = "SELECT *,appointmentreservation.status AS appointmentreservation_status, appointmentreservation.type AS appointmentreservation_type FROM tbl_appointmentschedule INNER JOIN appointmentreservation ON tbl_appointmentschedule.tbl_appointmentschedule_id=appointmentreservation.tbl_appointmentschedule_id INNER JOIN tbl_users ON appointmentreservation.doctor_id=tbl_users.users_id WHERE patients_id = '".$_SESSION['users_id']."'";
	$appointment_patient_stmt = $this->conn()->query($sql);
}

// Appointment Doctor
if (isset($_SESSION['users_id'])) {
	$sql = "SELECT *,appointmentreservation.status AS appointmentreservation_status, appointmentreservation.type AS appointmentreservation_type, appointmentreservation.proof AS appointmentreservation_proof FROM tbl_appointmentschedule INNER JOIN appointmentreservation ON tbl_appointmentschedule.tbl_appointmentschedule_id=appointmentreservation.tbl_appointmentschedule_id INNER JOIN tbl_users ON appointmentreservation.patients_id=tbl_users.users_id WHERE appointmentreservation.doctor_id = '".$_SESSION['users_id']."'";
	$appointment_doctor_stmt = $this->conn()->query($sql);
}

// Appointment Doctor Show to Employees
if (isset($_SESSION['users_id'])) {

	$sql = "SELECT * FROM tbl_users WHERE users_id = '".$_SESSION['users_id']."'";
	$stmt = $this->conn()->query($sql);
	$row = $stmt->fetch();

	$sql = "SELECT *,appointmentreservation.status AS appointmentreservation_status, appointmentreservation.doctor_id AS appointmentreservation_doctor_id, appointmentreservation.type AS appointmentreservation_type FROM tbl_appointmentschedule INNER JOIN appointmentreservation ON tbl_appointmentschedule.tbl_appointmentschedule_id=appointmentreservation.tbl_appointmentschedule_id INNER JOIN tbl_users ON appointmentreservation.patients_id=tbl_users.users_id WHERE appointmentreservation.status = 5";
	$reschedstmt = $this->conn()->query($sql);
}

   $sql = "SELECT *,appointmentreservation.status AS appointmentreservation_status, appointmentreservation.doctor_id AS appointmentreservation_doctor_id, appointmentreservation.type AS appointmentreservation_type, appointmentreservation.created_date AS appointmentreservation_created_date FROM tbl_appointmentschedule INNER JOIN appointmentreservation ON tbl_appointmentschedule.tbl_appointmentschedule_id=appointmentreservation.tbl_appointmentschedule_id INNER JOIN tbl_users ON appointmentreservation.patients_id=tbl_users.users_id WHERE appointmentreservation.status = 1 AND appointmentreservation.proof = ''";
	$notpaidstmt = $this->conn()->query($sql);

	$sql = "SELECT *,appointmentreservation.status AS appointmentreservation_status, appointmentreservation.doctor_id AS appointmentreservation_doctor_id, appointmentreservation.type AS appointmentreservation_type, appointmentreservation.created_date AS appointmentreservation_created_date FROM tbl_appointmentschedule INNER JOIN appointmentreservation ON tbl_appointmentschedule.tbl_appointmentschedule_id=appointmentreservation.tbl_appointmentschedule_id INNER JOIN tbl_users ON appointmentreservation.patients_id=tbl_users.users_id WHERE appointmentreservation.status = 1 AND appointmentreservation.proof != ''";
	$paidstmt = $this->conn()->query($sql);

// Appointment Report
if (isset($_SESSION['users_id'])) {
	$sql = "SELECT *,appointmentreservation.status AS appointmentreservation_status FROM tbl_appointmentschedule INNER JOIN appointmentreservation ON tbl_appointmentschedule.tbl_appointmentschedule_id=appointmentreservation.tbl_appointmentschedule_id INNER JOIN tbl_users ON appointmentreservation.patients_id=tbl_users.users_id WHERE appointmentreservation.doctor_id = '".$_SESSION['users_id']."' AND appointmentreservation.status = 2";
	$appointment_report_doctor_stmt = $this->conn()->query($sql);
}


$sql = "SELECT *,appointmentreservation.status AS appointmentreservation_status FROM tbl_appointmentschedule INNER JOIN appointmentreservation ON tbl_appointmentschedule.tbl_appointmentschedule_id=appointmentreservation.tbl_appointmentschedule_id INNER JOIN tbl_users ON appointmentreservation.patients_id=tbl_users.users_id WHERE  appointmentreservation.status = 2";
$appointment_report_doctor__employee_stmt = $this->conn()->query($sql);


// Employee Show schedule Doctor
if (isset($_SESSION['users_id'])) {
	$sql = "SELECT * FROM tbl_users WHERE users_id = '".$_SESSION['users_id']."'";
	$stmt = $this->conn()->query($sql);
	$rowemployee = $stmt->fetch();
	
	$sql = "SELECT * FROM tbl_appointmentschedule";
	$my_doctor_tbl_appointmentschedulestmt = $this->conn()->query($sql);
}








$sql = "SELECT * FROM tbl_users WHERE type = 'Student' OR type = 'Teacher'";
$tbl_usersstudentteacherstmt = $this->conn()->query($sql);



$sql = "SELECT * FROM tbl_appointmentschedule";
$tbl_appointmentschedulestmt = $this->conn()->query($sql);

$sql = "SELECT * FROM timeschedule";
$timeschedulestmt = $this->conn()->query($sql);




?>
