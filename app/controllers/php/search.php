<?php
    session_start();
    $outgoing_id = '1000';
    include_once "config.php";


    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = "SELECT * FROM users WHERE NOT id = {$outgoing_id} AND (fullName LIKE '%{$searchTerm}%' )";
    $output = "";
    $query = mysqli_query($conn, $sql);
    echo mysqli_error($conn);
    if($query && mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>