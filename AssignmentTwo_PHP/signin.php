<?php require('inc/header.php');?>

<main>
    <div class = "container-sign-in">
        <h1>Sign In</h1>  
        <h3>It Looks Like You Are Not Signed In!</h3>
        <h3>Sign in below</h3>
        <form method="post" action="inc/validate.php">
          <div class = "contact-form">
          <div class = "contact-left-column">
              <div class = "input-row">
                <p><input class="form-control" name="username" type="text" placeholder="Username" required /></p>
                <p><input class="form-control" name="password" type="password" placeholder="Password" required /></p>
                
              </div>
          </div>      
          <div class="contact-right-column">      
            <button class="login-button" type="submit"> Login </button>
          </div>   
              
          
          
         </div>
        </form>
      
    </div>
  </main>

  <?php require('inc/footer.php');?>
