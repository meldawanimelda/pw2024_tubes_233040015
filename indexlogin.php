<?php
require '../pw2024_tubes_233040015/admin/fungsi.php';

if (isset($_POST["login"])) {
    $username = $ $_POST["username"];
    $password = $ $_POST["password"];

    mysqli_query($con, "SELECT * FROM user WHERE username = 
    '$username'" );

    //cek usn
    if(mysqli_num_rows($result) === 1 ){

    //cek pw
$row = mysqli_fetch_assoc($result);
if(password_verify($password, $row["password"])){
    header("Location:../dashboard/index.php ");
    exit;
}
}
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>37.5% || Login</title>
</head>
<style>
body{
    background: gray;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
*{
    font-family: sans-serif;
    box-sizing: border-box;
}
form{
    width: 500px;
    border: 2px solid #ccc;
    background: #fff;
    border-radius: 15px;
}
h2{
text-align: center;
margin-bottom: 40px;
}
input{
    display: block;
    border: 2px solid #ccc;
    width: 95%;
    padding: 10px;
    margin:10px auto;
    border-radius: 5px;
}
label{
    color: #888;
    font-size: 18px;
    padding: 10px;
}
button{
    float: right;
    background:#555;
    padding: 10px 15px;
    color:#123;
    border-radius: 5px;
    margin: 10px;
    border: none;
}
button:hover{
    opacity: .7;
}
</style>
<body>
    <form action="" method="post">
        <h2>LOGIN</h2>
        <label >Username</label>
        <input type="text" name="uname" placeholder="Username"><br>
<label >Password</label>
<input type="password" name="password" placeholder="Password"><br>
<button type="submit"><a href="../pw2024_tubes_233040015/dashboard/index.php"></a>Login</button>
    </form>
</body>
</html>