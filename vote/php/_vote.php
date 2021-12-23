<?php

    include "./_config.php";
    $nominee_id = mysqli_real_escape_string($conn, $_POST['nominee_id']);
    $voter = mysqli_real_escape_string($conn, $_POST['voter']);

    // check if user voted already
    $check = mysqli_query($conn, "SELECT * FROM tally WHERE voter = '$voter' AND nominee_id = '$nominee_id'") or die(mysqli_error($conn));
    $checkres = mysqli_num_rows($check);

    if($checkres > 0 ){
        echo "charge_voter";
    }else{
        //allow voting
        $vote = mysqli_query($conn, "INSERT INTO `tally`(`voter`, `nominee_id`, `votes`) VALUES ('".$voter."','".$nominee_id."','1')") or die(mysqli_error($conn));

        if($vote){
            echo "voted";
        }
    }

?>