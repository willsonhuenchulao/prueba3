<?php

    include "logic.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <title>MuySocial</title>
</head>
<body>

<!-- menu -->
<div class="container-fluid bg-inverse fixed-top">
<nav class="navbar navbar-expand-lg navbar-light bg-light navbar navbar-dark bg-dark container">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">MuySocial</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ml-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">i</a>
        </li>
        
        
          
        </li>
       
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success mr-4" type="submit">Buscar</button>
      </form>
      <div><a href="login.php" class="btn btn-danger mr-2">Login</a></div>
      <div><a href="#" class="btn btn-danger">Registrarse</a></div>
    </div>
  </div>
</nav>
</div>

<center><h1>MuySocial</h1></center>
    <div class="container mt-5">

    <div class="icono-menu">
        <img src="img/icono2.png" id="icono-menu">
    </div>

    <div class="cont-menu active" id="menu">
        <ul>
            <li><a href="index.php"></a> Inicio</li>
            
            <li><a href="login.php"></a> </li>
            <li>show</li>
        </ul>
    </div>

    <!-- prueba -->
   
    <center><button><a href="multimedia.php">Agrega Tu contenido AQUI!!</a></button></center>
<!-- -->

        <!-- Create a new Post button -->
        <div class="text-center">
            <a href="create.php" class="btn btn-outline-dark">+ Crear nuevo post</a>
        </div>

      

        <!-- Display posts from database -->
        <div class="row">
            <?php foreach($query as $q){ ?>
                <div class="col-12 col-lg-4 d-flex justify-content-center">
                    <div class="card text-white bg-dark mt-5" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $q['title'];?></h5>
                            <p class="card-text"><?php echo substr($q['content'], 0, 50);?>...</p>
                      <!--  <img class="card-img" src="img/fondo.png"  alt=""> -->
                        <img src="<?php echo $q['img']; ?>" alt="" title=" ?>" width="250" height="200" class="img-responsive" />
                        
                            
                            <a href="view.php?id=<?php echo $q['id']?>" class="btn btn-light">Lee mas <span class="text-danger">&rarr;</span></a>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
          <!-- Display any info -->
          <?php if(isset($_REQUEST['info'])){ ?>
            <?php if($_REQUEST['info'] == "added"){?>
                <div class="alert alert-success" role="alert">
                <!-- La publicación se ha agregado correctamente -->
                </div>
            <?php }?>
        <?php } ?>

        <!--multimedia-->
        <?php 
 require("config.php");

  $sqlVideo   = ("SELECT * FROM videos ORDER BY id DESC LIMIT 1");
  $queryVideo = mysqli_query($con, $sqlVideo);
  $totalVideo = mysqli_num_rows($queryVideo);
  $DataVideo  = mysqli_fetch_array($queryVideo);
?>


    <div class="container">
     
     <hr>

      <div class="row text-center">
        <div class="col-6">
          <?php 
          if( $totalVideo >0){ ?>
          <h2><?php echo $DataVideo['nombreVideo']; ?></h2>

          <div class="video-responsive">
            <iframe  src="<?php echo $DataVideo['urlVideo']; ?>"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
          </div>
        <?php }else{ ?>
        <h2>No hay Video</h2>
        <?php } ?>

        </div>

       
      </div>
    </div>
    <!--multimedia-->

        
</div>
       
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="app.js"></script>
</body>
</html>


