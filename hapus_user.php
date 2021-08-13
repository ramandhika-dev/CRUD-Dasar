<?php
    //include database connection file
    include_once("koneksi.php");

    //get id from url to delete that user
    $id = $_GET['id'];

    //delete user row from table based on giv3en id
    $result = mysqli_query($conn,"delete from users where id=$id");

    //after delete redirect to home, so taht latest user list will be
    header("location:user.php");
