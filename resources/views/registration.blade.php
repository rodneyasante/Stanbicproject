<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="css/login.css"> 
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
          <div class="form" id="form"> 
              <ul class="tab-group">
                <li class="tab active"><a href="#signup">Sign Up</a></li>
                <li class="tab"><a href="#login">Log In</a></li>
              </ul>
              <div class="tab-content">
                <div id="signup">   
                  <h1>Sign Up for Free</h1>
                  
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="post">
                      <div class="top-row" >
                        <div class="field-wrap ">
                          <label>
                            First Name<span class="req"></span>
                          </label>
                          <input type="text" name="first_name" required autocomplete="off" />
                        </div>
                    
                        <div class="field-wrap">
                          <label>
                            Last Name<span class="req"></span>
                          </label>
                          <input type="text"required autocomplete="off" name="last_name"/>
                        </div>
                      </div>

                      <div class="field-wrap">
                        <label>
                          Email Address/Sap number<span class="req"></span>
                        </label>
                        <input type="email" name="email" required autocomplete="off"/>
                      </div>
                  
                      <div class="field-wrap <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <label>
                          Enter Password<span class="req"></span>
                        </label>
                        <input type="password" required name="password" autocomplete="off" value="<?php echo $password; ?>"/>
                      </div>
                      <div class="field-wrap <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>"">
                        <label>
                          Confirm Password<span class="req"></span>
                        </label>
                        <input type="password"required autocomplete="off" name="confirm_password"/>
                      </div>
                      <div class="field-wrap">
                        <label>
                          Department<span class="req"></span>
                        </label>
                        <input type="Department"required autocomplete="off" name="department"/>
                      </div>
                    <button type="button" class="button button-block"/>Get Started</button>
                    <p>Already have an account? <a href="#login">Login here</a>.</p>
                </form>

                </div>
                
                <div id="login">   
                    <h1>Welcome Back!</h1>
                    <form action="/" method="post">
                        <div class="field-wrap text-box">
                            <input type="email"required autocomplete="off" placeholder="Email Address/Sap number" />
                        </div>
                       <div class="field-wrap text-box">
                            <input type="password"required autocomplete="off" placeholder="Password"/>
                        </div>
                        <p class="forgot"><a href="#">Forgot Password?</a></p>
                        <button class="button button-block"/>Log In</button>
                    </form>
                </div>   
              </div>
        </div>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="js/login.js"></script>    
</body>
</html>