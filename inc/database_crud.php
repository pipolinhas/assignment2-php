<?php

  

  $fname = '';
  $lname = '';
  $email = '';
  $phone = ''; 
  $image = '';


  $id = 0;
  $update = false;

  $mysqli = new mysqli('localhost:8080', 'root', '', 'mydb') or die(mysqli_error($mysqli));

  if (isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $image = $_POST['image'];

    $mysqli->query("INSERT INTO leads (fname, lname, email, phone, image) VALUES ('$fname', '$lname', '$email', '$phone','$image')") or 
            die($mysqli->error);

    $_SESSION['message'] = "Congratulations! Now you are a member of our team. Don't forget to check your email";
   #$_SESSION['msg_type'] = "success";

    
  }

if (isset($_GET['delete'])){
  $id = $_GET['delete'];
  $mysqli->query("DELETE FROM leads WHERE id = $id") or die($mysqli->error);

  $_SESSION['message'] = "Member removed from our list";

  header("location: ../admin_view.php");
}

if (isset($_GET['edit'])){
  $id = $_GET['edit'];
  $update = true;
  $result = $mysqli->query("SELECT * FROM leads WHERE id=$id") or die($mysqli->error);

  // Check if the query was successful and the result contains at least one row
  if ($result && $result->num_rows == 1){

      $row = $result->fetch_array();
      $fname = $row['fname'];
      $lname = $row['lname'];
      $email = $row['email'];
      $phone = $row['phone'];
      $image = $row['image'];

  }
}

if (isset($_POST['update'])){
  $id = $_POST['id'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $image = $_POST['image'];

  $mysqli->query("UPDATE leads SET fname='$fname',lname='$lname',email='$email',phone='$phone',image='$image' WHERE id=$id") 
    or die($mysqli->error);

    $_SESSION['message'] = "Member data has been updated";
    #$_SESSION['msg_type'] = "warning";

    header("Location: admin_view.php");

}

  
?>
