<?php

require('connection.php');
session_start();

#for login
if(isset($_POST['login'])){
    $query = "SELECT * FROM `registered_users` WHERE `email` = '$_POST[email_username]' OR `username` = '$_POST[email_username]'";
    $result = mysqli_query($conn, $query);

    if($result){
        if(mysqli_num_rows($result) == 1){
            $result_fetch = mysqli_fetch_assoc($result);
            if($_POST['password'] == $result_fetch['password']){
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $result_fetch['username'];
                header("location: customer.php");
                // echo "<script>
                // window.location.href='customer.php';
                // </script>";
            }
        }else{
            echo 
            "<script>
            alert('Email or username not Registered');
            window.location.href='customer.php';
            </script>";
        }
    }else{
        echo 
            "<script>
            alert('Cannot Run Query');
            window.location.href='customer.php';
            </script>"; 
    }
}


#for registration
if(isset($_POST['register'])){
    $user_exist_query = "SELECT * FROM `registered_users` WHERE `username` = '$_POST[username]' OR `email` = '$_POST[email]'";
    $result = mysqli_query($conn, $user_exist_query);

    if($result){

        if(mysqli_num_rows($result) > 0){
            $result_fetch = mysqli_fetch_assoc($result);
            if($result_fetch['username'] == $_POST['username']){
                echo 
                    "<script>
                    alert('$result_fetch[username] - username is alredy taken');
                    window.location.href='customer.php';
                    </script>";
            }else{
                echo 
                    "<script>
                    alert('$result_fetch[email] - E-mail is alredy taken');
                    window.location.href='customer.php';
                    </script>";
            }
        }else{
            // $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
            $query = "INSERT INTO `registered_users`(`full_name`, `username`, `email`, `password`) VALUES ('$_POST[fullname]','$_POST[username]','$_POST[email]',$_POST[$password])";
            if(mysqli_query($conn, $query)){
                echo 
                    "<script>
                    alert('Registration Successful.');
                    window.location.href='customer.php';
                    </script>";
            }else{
                echo 
                    "<script>
                    alert('Cannot Run Query');
                    window.location.href='customer.php';
                    </script>";
            }
        }

    }else{
        echo 
            "<script>
            alert('Cannot Run Query');
            window.location.href='customer.php';
            </script>";
    }
}
?>