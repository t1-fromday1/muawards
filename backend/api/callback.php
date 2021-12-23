<?php 

    $data = json_decode(file_get_contents("php://input"), true);
    $file = fopen("payments.txt", "w") or die("Unable to open file!");
    fwrite($file, $data);
    fclose($file);

    

?>