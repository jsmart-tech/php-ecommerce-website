

<?php 
session_start();
define('BOOK','http://localhost/bookstore')
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/">


      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Bookstore</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-dark" >
    <div class="container" style="margin-top: none">
        <a class="navbar-brand  text-white" href= <?php BOOK; ?> >Bookstore</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
       
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active  text-white" aria-current="page" href=<?php BOOK; ?> >Home</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link  text-white" href= "<?php echo BOOK; ?>/contact.php">Contact</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active  text-white" aria-current="page" href="<?php echo BOOK; ?>/shopping/cart.php"><i class="fas fa-shopping-cart"></i>(2)</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active  text-white" aria-current="page" href="<?php echo BOOK; ?>/categories/index.php">Categories</a>
            </li>
            <?php if (isset($_SESSION ['username'])) :?>
            <li class="nav-item dropdown">
            
            <a class="nav-link dropdown-toggle  text-white" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION ['username'] ;?>
    
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="auth/logout.php">Logout</a></li>
</ul>
            </li>
            
            <?php else : ?>

            <li class="nav-item">
                <a class="nav-link  text-white" href="auth/login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  text-white" href="http://localhost/bookstore/auth/register.php">Register</a>
            </li>
        </ul>
    <?php endif; ?>
        </div>
    </div>
    </nav>
