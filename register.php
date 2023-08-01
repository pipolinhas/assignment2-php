<?php require('inc/header.php');?>

<main>
  <div class = "container">

    <h1> Register </h1>
    <div class= "contact-form">
      <div class="contact-left-column">
        <h3>Don't have an account, then sign up below!</h3>
        <form method="post" action="save-admin.php">
          <div class= "input-row">
            <div class="input-field">
                <p><input class="form-control" name="first_name" type="text" placeholder="First Name" required/></p>
            </div>
            <div class="input-field">
                <p><input class="form-control" name="last_name" type="text" placeholder="Last Name" required /></p>
            </div>
          </div>
          <div class= "input-row">
                <p><input class="form-control" name="username" type="text" placeholder="Username" required /></p>
                <p><input class="form-control" name="password" type="password" placeholder="Password" required /></p>
          </div>
                <p><input class="form-control" name="confirm" type="password" placeholder="Confirm Password" required /></p>
                <button type="submit" name="submit"> Register</button>
              </form>
      </div>

      <div class="contact-right-column">
            

          
              <h3>Already have an account, then sign in below!</h3>
              <form method="post" action="inc/validate.php">
                <div class = "input-field">
                  <p><input class="form-control" name="username" type="text" placeholder="Username" required /></p> 
                </div>
                <div class = "input-field">
                  <p><input class="form-control" name="password" type="password" placeholder="Password" required /></p>
                </div>
                <button class="login-button" type="submit"> Login </button>
              </form>
      </div>  


    </div>
 </div>
      



  </main>

<?php require('inc/footer.php');?>
