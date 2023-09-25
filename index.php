<?php Require "./include/header.php" ;?>
<?php Require "./config/config.php" ;?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5c5946fe44.js" crossorigin="anonymous"></script>
    <title>Bookstore</title>
  </head>
  <body>
    
    <?php
    $row = $conn->query("SELECT * FROM product WHERE Status = 1");
    $row->execute();
    $allRows = $row->fetchAll(PDO::FETCH_OBJ);
    ?>

    <div class="container"> 
      <div class="row mt-5">
        <?php foreach ($allRows as $product):?>   
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
              <img height="213px" class="card-img-top" src="images/<?php echo $product->image;?>">
              <div class="card-body">
                <h5 class="d-inline"><b><?php echo $product->product_name;?></b></h5>
                <h5 class="d-inline"><div class="text-muted d-inline">($<?php echo $product->price;?>)</div></h5>
                <p><?php echo substr($product->Description ,0 , 100);?></p>
                <a href="<?php echo BOOK;?>/shopping/single.php?id=<?php echo $product->ID;?>" class="btn btn-primary w-100 rounded my-2">Buy now<i class="fas fa-arrow-right"></i></a>      
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php Require "./include/footer.php" ;?>
  </body>
</html>
jkjk