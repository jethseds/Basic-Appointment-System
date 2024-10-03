<!doctype html>
<html lang="en">
  <head>
    <?php include 'include/head.php'; ?>
  </head>
  <body style="background-color: #f0f4fc;">
    <?php include 'include/navbar.php'; ?>

    <div class="container-fluid" style="margin-top: 200px;margin-bottom: 100px;">
        <div class="container">
            <h3 class="text-center">Login</h3>
            <div class="mt-5">
                <form method="POST" action="controller/controller.php">
                    <div style="width: 400px;margin: auto;">
                        <div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control border-0 rounded-0" required>
                            </div>
                        </div>
                        <div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control border-0 rounded-0" required>
                            </div>
                        </div>
                        <div class="text-right mt-3">
                            <button type="submit" name="login2" class="btn text-white rounded-0 w-100" style="background-color: #03a9f4;">Login</button>
                        </div>
                    
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

    <?php include 'include/footer.php'; ?>
  </body>
</html>