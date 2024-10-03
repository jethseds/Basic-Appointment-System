<!doctype html>
<html lang="en">
  <head>
    <?php include 'include/head.php'; ?>
  </head>
  <body style="background-color: #f0f4fc;">
    <?php include 'include/navbar.php'; ?>

    <div class="container-fluid" style="margin-top: 200px;margin-bottom: 100px;">
        <div class="container">
            <h3 class="text-center">Register</h3>
            <div class="mt-5">
                <form method="POST" action="controller/controller.php">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Firstname</label>
                                <input type="" name="firstname" class="form-control border-0 rounded-0" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Lastname</label>
                                <input type="" name="lastname" class="form-control border-0 rounded-0" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Middlename</label>
                                <input type="" name="middlename" class="form-control border-0 rounded-0" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="" name="contactnumber" maxlength="11" class="form-control age border-0 rounded-0" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email</label>
                                <div class="form-control border-0 p-0 rounded-0 d-flex">
                                    <input type="text" name="email" minlength="4" class="border-0 form-control border-0 rounded-0" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control border-0 rounded-0" required>
                            </div>
                        </div>
                    
                    </div>
                    <div class="text-right">
                            <button type="submit" name="register" class="btn text-white rounded-0" style="background-color: #03a9f4;">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include 'include/footer.php'; ?>

    <script>
        $('.age').keypress
            (
                function(event)
                {
                    if (event.keyCode == 46 || event.keyCode == 8)
                    {
                    //do nothing
                    }
                    else 
                    {
                        if (event.keyCode < 48 || event.keyCode > 57 ) 
                        {
                      event.preventDefault(); 
                  } 
                    }
                }
            );
    </script>
  </body>
</html>