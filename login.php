<?php

$errors = [];
$email = '';
$password = '';
$user_type = '';

include 'connection.php';

if (isset($_POST['login'])) {
   $email = htmlspecialchars($_POST['email']);
   $password = htmlspecialchars($_POST['password']);
   $user_type = $_POST['userType'];
   $hashPassword = md5($password);
      $query = "SELECT * FROM employees WHERE email = '$email' AND password = '$hashPassword' AND userType = '$user_type'";
   $result = mysqli_query($conn, $query);

   if (!$result) {
      die('Error Executing query! ' . mysqli_error($conn));
   }

   if (mysqli_num_rows($result) == 1) {
      $user = mysqli_fetch_assoc($result);
      if ($user['userType'] == 'admin') {
         session_start();
         $_SESSION["id"] = $user['id'];
         $_SESSION["name"] = $user['name'];
         $_SESSION["email"] = $user['email'];
         $_SESSION["password"] = $user['password'];
         $_SESSION["userType"] = $user['userType'];
         header("Location:manageuser.php");
         exit;
      }
       elseif ($user['userType'] == 'user') {
         session_start();
         $_SESSION["id"] = $user['id'];
         $_SESSION["name"] = $user['name'];
         $_SESSION["email"] = $user['email'];
         $_SESSION["password"] = $user['password'];
         $_SESSION["userType"] = $user['userType'];

         header("Location: oneUser.php");
         exit;
      }
   } else {
      $errors[] = 'Login failed. Please check your email, password, and user '; 
   }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="style.css" rel="stylesheet" >
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

<ul>
  <li><a class="nav" href="#">PHP MANAGE USER OPERATION</a></li>
  <li><a class="nav" type="button" class="btn btn-primary nav-link active" href="register.php">Add New</a></li>
  <li><a class="nav" aria-current="page" href="logout.php">Log out</a></li>
</ul>

<div class="font-sans min-h-screen antialiased bg-gray-900 pt-24 pb-5">
    <div class="flex flex-col justify-center sm:w-96 sm:m-auto mx-5 mb-5 space-y-8">
      <form  method="post" >
        <div class="flex flex-col bg-white p-10 rounded-lg shadow space-y-6">
          <h1 class="font-bold text-xl text-center">Log in</h1>


          <div class="flex flex-col space-y-1">
            <input type="text" name="userN" id="user" class="border-2 rounded px-3 py-2 w-full focus:outline-none focus:border-blue-400 focus:shadow" placeholder="Username" />
          </div>

          <div class="flex flex-col space-y-1">
            <input type="email" name="email" id="email" class="border-2 rounded px-3 py-2 w-full focus:outline-none focus:border-blue-400 focus:shadow" placeholder="Email" />
          </div>

          <div class="flex flex-col space-y-1">
            <input type="password" name="password" id="password" class="border-2 rounded px-3 py-2 w-full focus:outline-none focus:border-blue-400 focus:shadow" placeholder="password" />
          </div>

          <div class="flex flex-col space-y-1">
           <select name="userType" id="">
            <option selected value="user">User</option>
            <option  value="admin">Admin</option>
           </select>
          </div>
 
            <button type="submit" name="login" class="bg-blue-500 text-white font-bold px-5 py-2 rounded focus:outline-none shadow hover:bg-blue-700 transition-colors">Log in</button>
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