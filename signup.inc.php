<?php
if(isset($_POST['submit'])){
include_once'dbh.inc.php';
$first = mysqli_real_escape_string($conn, $_POST['first']);
$last = mysqli_real_escape_string($conn, $_POST['last']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$uid = mysqli_real_escape_string($conn, $_POST['uid']);
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
$budget = mysqli_real_escape_string($conn, $_POST['budget']);

if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd) ){
    header("Location: signup.php?signup=empty");
    exit();
} 
else{
//if input characters are valid
if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last) ){
    header("Location: signup.php?signup=invalid");
    exit();

}
else{
    //checking email validity
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: signup.php?signup=email");
        exit();
    }
    else{
        $sql = "SELECT * FROM users WHERE user_uid='$uid'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if(resultCheck > 0){
            header("Location: signup.php?signup=usertaken");
            exit();

        }
        else{
            //hashing
            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
            //insert the user in db
            $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd, budget) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd', '$budget');";
             mysqli_query($conn, $sql);

            /* $sql = "CREATE TABLE $uid (
                 id INT(6) AUTO_INCREMENT PRIMARY KEY NOT NULL,
                 expensename VARCHAR(44) NOT NULL,
                 expensedescription VARCHAR(44) NOT NULL,
                 amount INT(8),
                 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )";
                mysqli_query($conn, $sql);*/
             header("Location: signup.php?signup=successful");
             exit();

        }
    }
}

}
}
else{
    header("Location: signup.php");
    exit();
}