<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">       
    </head>
    <body>
        <?php
        $name = "";
        $email = "";
        $website = "";
        $comment = "";
        $gender = "";
        $errorn = "";
        $errorm = "";
        $errorw = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $errorn = "Name is required";
            } else {
                $name = test_input($_POST["name"]);
                if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                    $errorn = "Only letters and white space allowed";
                    $name = "";
                }
            }
            if (empty($_POST["email"])) {
                $errorm = "Email is required";
            } else {
                $email = test_input($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errorm = "Invalid email format";
                    $email = "";
                }
            }
            $website = test_input($_POST["website"]);
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
                $errorw = "Invalid URL format";
                $website = "";
            }
            if (empty($_POST["comment"])) {
                $comment = "";
            } else {
                $comment = test_input($_POST["comment"]);
            }
            if (empty($_POST["gender"])) {
                $gender = "";
            } else {
                $gender = test_input($_POST["gender"]);
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        echo $name . "<br>";
        echo $email . "<br>";
        echo $website . "<br>";
        echo $comment . "<br>";
        echo $gender . "<br>";
        ?>
        <div>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label>Name:</label>
                <input type="text" name="name"><span style="color:red">* <?php echo $errorn; ?></span><br>
                <label>E-mail:</label> 
                <input type="text" name="email"><span style="color:red">* <?php echo $errorm; ?></span> <br>
                <label>Website:</label> 
                <input type="text" name="website"><?php echo $errorw; ?><br>
                <label>Comment:</label> 
                <textarea name="comment" rows="5" cols="40"></textarea><?php echo $comment; ?><br>    
                <input type="radio" name="gender" value="female">Female<?php echo $gender; ?>
                <input type="radio" name="gender" value="male">Male<?php echo $gender; ?>
                <input type="radio" name="gender" value="other">Other<?php echo $gender; ?><br>
                <input type="submit">
            </form>

<!-- <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> Ha a html oldalon belüli php dolgozza fel-->
        </div>
    </body>
</html>
