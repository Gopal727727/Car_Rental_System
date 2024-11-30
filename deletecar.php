<?php
    include 'sql_connection.php';
    $id = $_GET['id'];
    define ('SITE_ROOT', realpath(dirname(__FILE__)));
    $filename = substr($_GET['filename'],1);
    $sql = "Delete from carinfo where ID = $id";
    $result = $conn->query($sql);
    if($result === true)
    {
        unlink(SITE_ROOT.$filename);
        echo '<script> alert("row deleted");
        window.location.href="./admin/Cardetails.php"</script>';

    }
    else {
        echo "delete failed";
    }
?>