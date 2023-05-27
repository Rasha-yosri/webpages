
<?php
session_start();

include 'connection.php';

  $id;
  $name;
     $email;
     $userType;

        if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
            $id = $_SESSION['id'];
            $name = $_SESSION['name'];
            $email = $_SESSION['email'];
            $userType = $_SESSION['userType'];
        } else {
            header("Location: login.php");
            exit();
        }
 ?>

 <!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>show user</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">PHP Show USER OPERATION</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="login.php">log in</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
            </li>
           
            
          </ul>
        </div>
      </div>
    </nav>
    <div class="container my-4">
    <table class="table">
    <thead>

    
    <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>User Type</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $userType; ?></td>
                
            </tr>
        </tbody>
    </table>

 
</div>
    </tbody>
  </table>
      </div>
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html> 






















   