<div class="container-fluid footer">
    <div style="max-width: 1440px" class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="card border-0 bg-transparent">
            <div class="card-body">
              <h5 class="mb-4 text-white">Contact</h5>
              <div class="d-flex"><div><i class="fas fa-phone-alt"></i></div> <p>(+639) 123 456 789</p></div>
              <div class="d-flex"><div><i class="fas fa-envelope"></i></div> <p>AppointmentSystem@email.com</p></div>
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
<small>© Copyright 2023. Appointment System</small>
</footer>

<script src="asset/js/jquery.slim.min.js"></script>
<script src="asset/js/bootstrap.bundle.min.js"></script>
<script src="asset/js/fontawesome.js"></script>

<script>
  

    $('#submit').click(function(){
        alert('Please Login Required')
      })
   const rmCheck = document.getElementById("kmli"),
    emailInput = document.getElementById("email");
    passwordInput = document.getElementById("password-field");

  if (localStorage.checkbox && localStorage.checkbox !== "") {
    rmCheck.setAttribute("checked", "checked");
    emailInput.value = localStorage.username;
    passwordInput.value = localStorage.password;
  } else {
    rmCheck.removeAttribute("checked");
    emailInput.value = "";
    passwordInput.value = "";
  }

  function lsRememberMe() {
    if (rmCheck.checked && emailInput.value !== "" && passwordInput.value !== "") {
      localStorage.username = emailInput.value;
      localStorage.password = passwordInput.value;
      localStorage.checkbox = rmCheck.value;
    } else {
      localStorage.username = "";
      localStorage.checkbox = "";
    }
  }
  
  $(".toggle-password").click(function() {
      $(this).toggleClass("fa-eye fa-eye-slash");
      var input = $($(this).attr("toggle"));
      if (input.attr("type") == "password") {
          input.attr("type", "text");
      }else{
        input.attr("type", "password");
      }
  });


  
</script>