<?php Require "../include/header.php" ;?>
<?php Require "../config/config.php" ;?>

<?php   



if(isset($_SESSION['username'])){
    header("location:".BOOK."");
  }

  
if(isset ($_POST['submit'])){
    

        if(empty($_POST['username']) OR empty($_POST['email']) OR empty($_POST['password'])){
            echo "<script> alert('one or more of the input is missing')</script>";
        }else{
            $email=$_POST['email'];
            $username=$_POST['username'];
            $password=$_POST['password']; 
            $query = "SELECT email FROM users";
            $result = $conn->query($query);
         
    // loop through existing emails to check for matches
    $email_taken = false;
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        if ($row['email'] == $email) {
            $email_taken = true;
            break; // will stop the form from registering
        }
    }
   
    if ($email_taken) {
      // email already taken, give the user an alert and stop from registering
      echo "<script>alert('Email has been registered by another user. Please choose another.');</script>";
      echo "<script>window.location.href = 'register.php';</script>";
      die; // stop from registering
    }

    $insert = $conn->prepare("INSERT INTO users(email, username, mypassword)
      VALUES (:email, :username, :mypassword )");
 
    $insert-> execute([
      ':email'=> $email,
      ':username'=> $username,
      ':mypassword'=> password_hash($password, PASSWORD_DEFAULT),
    ]);
  
    header("Location: login.php");
exit();
   
} 
}








?>  

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="form-control mt-5" method="POST" action ="register.php">
                    <h4 class="text-center mt-3"> Register </h4>
                    <div class="">
                        <label for="" class="col-sm-2 col-form-label">Username</label>
                        <div class="">
                            <input type="text"  name="username" class="form-control" >
                        </div>
                    </div>
                    <div class="">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="">
                            <input type="email" name="email" class="form-control" >
                        </div>
                    </div>
                    <div class="">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="">
                            <input type="password" name="password" class="form-control" id="inputPassword">
                        </div>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mt-4" name="submit"  type="submit">register</button>

                </form>
            </div>
        </div>
 
   

        </div>
        
 
</html>
<?php Require "../include/footer.php" ;?>