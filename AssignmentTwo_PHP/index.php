<?php require('inc/header.php');?>

<?php require_once('inc/database_crud.php');?>



<?php 
	$mysqli = new mysqli('localhost:8080', 'root', '', 'mydb') or die(mysqli_error($mysqli));
	$result = $mysqli->query("SELECT * FROM leads") or die($mysqli->error);
?>

<?php 
	 function pre_r( $array ) {
		echo '<pre>';
		print_r($array);
		echo '</pre>';
	 }
	 ?>


   
	<?php 

if (isset($_SESSION['message'])):
	echo $_SESSION['message'];
	unset($_SESSION['message']);
	endif

?>
     <main>
        <div class="container">
		<h1> Join our Members and have exclusive access to the Arena </h1>

	        <div class="row">
		        <table class="table">
					<thead>
						<tr>
							<th>#ID</th>
							<th>Full Name</th>
							<th>Email</th>
							<th>Phone</th>
                            <th>Image</th>

							
						</tr>
					</thead>

		<?php while($row = $result->fetch_assoc()): ?>

					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['fname'] . " " . $row['lname']; ?></td>
						<td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['image'] ?></td>
						

					</tr>

		<?php endwhile; ?>

		        </table>
	        </div>
        </div>

		<div class="container">
                <h1> Join Our VIP List!</h1>
                <p> Subscribe to the form below and be a member of our Team!<br> Don't forget to check your email for more info.</p>
            

                <div class="contact-form">
                    <div class="contact-left-column">
                        <h3> Be an exclusive member!</h3>
                        <form method = "POST" >
                            <div class="input-row">
                                <div class="input-field">
                                    <label> Name </label>
                                    <input type="text" name="fname" id="fname" placeholder="Felipe">
                                </div>
                                <div class="input-field">
                                    <label> Last Name</label>
                                    <input type="text" name="lname" id="lname" placeholder="Didone">
                                </div>
                            </div>
                            
                            <div class="input-row">
                                <div class="input-field">
                                    <label> Email </label>
                                    <input type="email" name="email" id="email" placeholder="youremail@gmail.com">
                                </div>  
                                <div class="input-field">
                                    <label> Phone Number</label>
                                    <input type="tel" name="phone" id="phone" placeholder="+1 XXX XXX XXXX">
                                </div>
                                
                            </div>
                            <div class="input-row">
                                    		<label for="image"> Upload  photo </label>
                                   			<input type="file" name="image" id="image" placeholder="upload your photo">
                            </div>
                        
                                <button type="submit" name="submit"> Join List</button>
                            
                        
                            </form>
                    </div>
                    <div class="contact-right-column">
                        <h3> Our contact info </h3>
                        <table>
                            <tr>
                                <td>Email</td>
                                <td> rvarenas@gmail.com</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td> +1 999 999 9999</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td> 999, Davisville Avenue, Toronto, ON</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

		
    </main>

    <?php require('inc/footer.php');?>

   