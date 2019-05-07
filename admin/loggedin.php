<?php
    session_start();
    if(isset($_POST ['save'])){
        $password = $_POST['password'];
            if ($password=="beingpreneur@1234") {
            $_SESSION["admin"] = 1;
              header('Location: data.php');
            }
            else {
                echo "not looged in!!";
            }
          }

        ?>
