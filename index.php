<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    height: 100vh;
    background: linear-gradient(to right, #4facfe, #00f2fe);
    display: flex;
    justify-content: center;
    align-items: center;
}

.container {
    background: white;
    padding: 40px;
    border-radius: 40px;
    border: 5px inset black;
    width: 350px;
    box-shadow: 0 0 20px ;
}

.form h2 {
    text-align: center;
    margin-bottom: 25px;
    color: black;
}

.form input {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid beige;
    border-radius: 5px;
    outline: none;
}

.form input:focus {
    border-color: salmon;
    box-shadow: 0 0 5px salmon;
}

.buttons {
    display: flex;
    justify-content: space-between;
}

.buttons button {
    width: 48%;
    padding: 12px;
    background: seagreen;
    color: white;
    border:  4px;
    border-radius: 20px;
    font-weight: bold;
    cursor: pointer;
    /* transition: background 0.3s ease; */
}

.buttons button:hover {
    background: skyblue;
    color: red;
}

    
    </style>
</head>
<body>
    <div class="container">
    <form action="" method="POST" class="form">
        <h2>SignIn/SignUp</h2>
        <input type="text" name="Name" placeholder="Name (for Sign Up)" required>
        <input type="email" name="Email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <div class="buttons">
            <button type="submit" name="SignIn">Sign In</button>
            <button type="submit" name="SignUp">Sign Up</button>
        </div>
    </form>
</div>
<?php
    if(isset($_POST['SignUp']))
    {
        $name=$_POST['Name'];
        $email=$_POST['Email'];
        $password=$_POST['password'];
        $mycon=mysqli_connect('localhost','root',"",'newone');
        $q="insert into login values('$name','$email','$password')";
        $res=mysqli_query($mycon,$q);
        echo"<br>";
        echo $res."SignUp completed";

    }
    if(isset($_POST['SignIn']))

    {
        $name=$_POST['Name'];
        $email=$_POST['Email'];
        $password=$_POST['password'];
        $mycon=mysqli_connect('localhost','root',"",'newone');
        $q="select * from login WHERE email='$email' and password='$password'";
        $res=mysqli_query($mycon,$q);
        
        if(mysqli_num_rows($res)>0)
        {
            echo "login sucessfull";
        }

        else{
            echo"login failed:";
        }
    }

    
?>
</body>
</html>