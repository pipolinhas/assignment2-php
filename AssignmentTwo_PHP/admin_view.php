<?php require('inc/header.php');?>

	<?php
		session_start();

		if (!isset($_SESSION['user_id'])) {
		header('location:signin.php');
		exit();}
	?>
	
	<?php
		if (isset($_SESSION['user_id'])): 
	?>
	
	<?php require_once('inc/database_crud.php');?>
	<?php require_once('inc/database_auth.php');?>

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
						<h1> Add, Edit and Delete members of our list </h1>
						<div class="row">
							<table class="table">
								<thead>
									<tr>
										<th>#ID</th>
										<th>Full Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Image</th>
										<th colspan="2"> Action </th>
									</tr>
								</thead>

					<?php while($row = $result->fetch_assoc()): ?>

								<tr>
									<td><?php echo $row['id']; ?></td>
									<td><?php echo $row['fname'] . " " . $row['lname']; ?></td>
									<td><?php echo $row['email'] ?></td>
									<td><?php echo $row['phone'] ?></td>
									<td><?php echo $row['image'] ?></td>
									<td>
										<a class= "button" href="admin_view.php?edit=<?php echo $row['id']; ?>"> Edit</a>
										<a class = "button" href="inc/database_crud.php?delete=<?php echo $row['id']; ?>"> Delete</a>

									</td>

								</tr>

					<?php endwhile; ?>

							</table>
							
						</div>
						<a class="button" href="logout.php">Logout</a>
					</div>

					<div class="container">
							<h1> Subscription Form</h1>
							<p> Add members to our list<br> Or update information of existing members.</p>
						

							<div class="contact-form">
								<div class="contact-left-column">
									<?php if ($update==true):?>
										<h3> Update member info </h3>
									<?php else:?>
										<h3> Add member</h3>
									<?php endif;?>
									<form  method = "POST">
										<input type="hidden" name = "id" value="<?php  echo $id;?>">
										<div class="input-row">
											<div class="input-field">
												<label> Name </label>
												<input type="text" name="fname" id="fname" value="<?php echo $fname; ?>" placeholder="Felipe">
											</div>
											<div class="input-field">
												<label> Last Name</label>
												<input type="text" name="lname" id="lname" value="<?php echo $lname; ?>" placeholder="Didone">
											</div>
										</div>
										
										<div class="input-row">
											<div class="input-field">
												<label> Email </label>
												<input type="email" name="email" id="email" value="<?php echo $email; ?>"  placeholder="youremail@gmail.com">
											</div>  
											<div class="input-field">
												<label> Phone Number</label>
												<input type="tel" name="phone" id="phone" value="<?php echo $phone; ?>" placeholder="+1 XXX XXX XXXX">
											</div>
											
										</div>
										<div class="input-row">
                                    		<label for="image"> Upload  photo </label>
                                   			<input type="file" name="image" id="image" value = "<?php echo $image; ?>" placeholder="upload your photo">
                            			</div>
											<?php if ($update == true):?>
												<button type="submit" name="update"> Update Info</button>
											<?php else:?>
												<button type="submit" name="submit"> Join List</button>
											<?php endif;?>
										
									
										</form>
								</div>
								<div class="contact-right-column">
									<h3> Our contact info </h3>
									<table>
										<tr>
											<td>Email</td>
											<td> contact@topbikes.com</td>
										</tr>
										<tr>
											<td>Phone</td>
											<td> +1 999 999 9999</td>
										</tr>
										<tr>
											<td>Address</td>
											<td> 132, Top Bikes Road, Toronto, ON</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
				</main>
				<?php endif?>

				<?php require('inc/footer.php');?>

