<!doctype html>
<html lang="en">
<?php include 'head.php';  include_once 'database1.php'; ?>
<?php
if(!isset($_SESSION)) session_start();
if(isset($_SESSION['admin']))
    {
        ?>
  <body>
    <div class="container d-flex justify-content-right">
      <a href="logout.php">Logout</a>
    </div>
    <div class="container">
      <?php
              $query = "SELECT * FROM contact_form";
              $result = mysqli_query($conn,$query);
              if(!empty($result)){
                  echo '<h1 class="mt-5">Contacts form database</h1>';
                  echo '<table class="table table-sm table-striped">';
                  echo '<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Message</th></tr>';
                 while($row = mysqli_fetch_array($result)){
                  echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['phone']."</td><td>".$row['message']."</td></tr>";
                 }
                 echo '</table>';
              }
              else{
                  $response["success"] = 0;
                  $response["message"] = "Sorry, No safehouse available nearby you.";
                  echo json_encode($response);
              }
      ?>
      <?php

              $query = "SELECT * FROM register_form";
              $result = mysqli_query($conn,$query);
              if(!empty($result)){
                  echo '<h1 class="mt-5">E-Tour 2k19 Registrations</h1>';
                  echo '<table class="table table-sm table-striped">';
                  echo '<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th></tr>';
                 while($row = mysqli_fetch_array($result)){
                  echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['phone']."</td></tr>";
                 }
                 echo '</table>';
              }
              else{
                  $response["success"] = 0;
                  $response["message"] = "Sorry, No safehouse available nearby you.";
                  echo json_encode($response);
              }
      ?>
    </div>
<?php include 'script.php'; ?>
  </body>
<?php   }
else {
  header('location: login.php');
}?>
</html>
