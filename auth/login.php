<?php Require "../include/header.php" ;?>
<?php Require "../config/config.php" ;?>

<?php

if(isset($_SESSION['username'])){
    header("location:".BOOK."");
  }

if(isset ($_POST['submit'])){
    
        if(empty($_POST['email']) OR empty($_POST['password'])){
            echo "<script> alert('one or more of the input is missing')</script>";

        }else{
            $email=$_POST['email'];
            $password=$_POST['password']; 
            
            $login = $conn->query ("SELECT * FROM users  WHERE email = '$email'");
            $data =$login ->fetch (PDO ::FETCH_ASSOC);
    
            if($login ->rowCount() > 0 ){
                if(password_verify($password, $data ['mypassword'])){
                    $_SESSION ['username'] = $data['username'];
                    $_SESSION['email']  = $data ['email'];
                    header("location: ".BOOK."");
            } else {
                echo "<script>window.alert('one or more input is wrong');</script>";
            }
            
        }else{
                  echo "<script>window.alert('one or more input is wrong');</script>";
            }
        }          
    }

           
          
          
?>
       <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="form-control mt-5" method="POST" action="login.php">
                    <h4 class="text-center mt-3"> Login </h4>
                   
                    <div class="">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="">
                            <input type="email"  name="email" class="form-control" >
                        </div>
                    </div>
                    <div class="">
                        <label for="inputPassword"  class="col-sm-2 col-form-label">Password</label>
                        <div class="">
                            <input type="password" name="password" class="form-control" id="inputPassword">
                        </div>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mt-4" name="submit" type="submit">login</button>

                </form>
            </div>
        </div>
        
   
    <?php Require "../include/footer.php" ;?>