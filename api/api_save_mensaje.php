<?php
$con=mysqli_connect('localhost','root','','muysocial');
if ($con){
    $nombre=$_POST['nombre'];
    $rut=$_POST['rut'];
    $consulta=$_POST['consulta'];
    $correo=$_POST['correo'];
    $celular=$_POST['celular'];

    $sql="INSERT INTO mensaje
    (nommen,rut,conmen,cormen,celmen)
    VALUES
    ('$nombre','$rut','$consulta','$correo','$celular')";
    $result=mysqli_query($con,$sql);
    if($result){
        echo 1;
}else{
    echo 2;
}else{
    echo 3;
}
