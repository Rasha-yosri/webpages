<?php
    include "connection.php";
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $userType = $_POST['userType'];
        $password = hash("md5",$_POST['password'],false);
        $q = " INSERT INTO employees(`name`, `email`, `password`,`userType`) VALUES ( '$name', '$email', '$password','$userType' )";

        $query = mysqli_query($conn,$q);
       
       if($userType==="user"){
        header("Location: showuser.php");
       }else{
        header("Location: manageuser.php");
       }

       
       
    }

  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet" >
</head>
<body>

<ul>
  <li><a class="nav" >PHP MANAGE USER OPERATION</a></li>
  
</ul>

<div class="font-sans min-h-screen antialiased bg-gray-900 pt-24 pb-5">
    <div class="flex flex-col justify-center sm:w-96 sm:m-auto mx-5 mb-5 space-y-8">


      <form  method="post">
        <div class="flex flex-col bg-white p-10 rounded-lg shadow space-y-6">
          <h1 class="font-bold text-xl text-center">Create a new account</h1>

          <div class="flex flex-col space-y-1">
            <input type="text" name="name" id="name" class="border-2 rounded px-3 py-2 w-full focus:outline-none focus:border-blue-400 focus:shadow" placeholder="Username" />
          </div>

          <div class="flex flex-col space-y-1">
            <input type="email" name="email" id="email" class="border-2 rounded px-3 py-2 w-full focus:outline-none focus:border-blue-400 focus:shadow" placeholder="Email" />
          </div>

          <div class="flex flex-col space-y-1">
            <input type="password" name="password" id="password" class="border-2 rounded px-3 py-2 w-full focus:outline-none focus:border-blue-400 focus:shadow" placeholder="Password" />
          </div>

          <div class="flex flex-col space-y-1">
            <input type="password" name="passconfirm" id="c_np" class="border-2 rounded px-3 py-2 w-full focus:outline-none focus:border-blue-400 focus:shadow" placeholder="passwordconfirm" />
          </div>

          <div class="flex flex-col space-y-1">
            <input type="text" name="userType"  class="border-2 rounded px-3 py-2 w-full focus:outline-none focus:border-blue-400 focus:shadow" placeholder="userType" />
          </div> 

          <div class="flex flex-col-reverse sm:flex-row sm:justify-between items-center">
            <a href="http://localhost:8080/web2/login.php" class="inline-block text-blue-500 hover:text-blue-800 hover:underline">Have an account? Loggin here</a>
            <input type="submit" name="submit" class="bg-blue-500 text-white font-bold px-5 py-2 rounded focus:outline-none shadow hover:bg-blue-700 transition-colors">
          </div>
        </div>
      </form>
      <div class="flex justify-center text-gray-500 text-sm">
        <p>&copy;2023. All right reserved.</p>
      </div>
    </div>
  </div> 
</body>
</html>




