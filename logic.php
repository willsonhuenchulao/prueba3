<?php

    // Don't display server errors 
    ini_set("display_errors", "off");

    // Initialize a database connection
    $conn = mysqli_connect("localhost", "root", "", "MuySocial");

    // Destroy if not possible to create a connection
    if(!$conn){
        echo "<h3 class='container bg-dark p-3 text-center text-warning rounded-lg mt-5'>Not able to establish Database Connection<h3>";
    }

    // Get data to display on index page
    $sql = "SELECT * FROM data";
    $query = mysqli_query($conn, $sql);

    // Create a new post
    if(isset($_REQUEST['new_post'])){
        $title = $_REQUEST['title'];
        $content = $_REQUEST['content'];
        $content = $_REQUEST['img'];
       

        $sql = "INSERT INTO data(title, content, img) VALUES('$title', '$content', '$img')";
        mysqli_query($conn, $sql);

        echo $sql;

        header("Location: contenido.php?info=added");
        exit();
    }

    // Get post data based on id
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM data WHERE id = $id";
        $query = mysqli_query($conn, $sql);
    }

    // Delete a post
    if(isset($_REQUEST['delete'])){
        $id = $_REQUEST['id'];

        $sql = "DELETE FROM data WHERE id = $id";
        mysqli_query($conn, $sql);

        header("Location: contenido.php");
        exit();
    }

    // Update a post
    if(isset($_REQUEST['update'])){
        $id = $_REQUEST['id'];
        $title = $_REQUEST['title'];
        $content = $_REQUEST['content'];
        $img = $_REQUEST['img'];

        $sql = "UPDATE data SET title = '$title', content = '$content', img ='$img' WHERE id = $id";
        mysqli_query($conn, $sql);

        header("Location: contenido.php");
        exit();
    }

    //validar usuario
    if(isset($_REQUEST['validar'])){
        $user = $_REQUEST['usuario'];
        $contraseña = $_REQUEST['contraseña'];

        $sql ="select * from usuarios where  nombre = '$user' and clave = '$contraseña'";
        echo $sql;
      
        
    }

?>
