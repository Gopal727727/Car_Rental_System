<?php
    include '../sql_connection.php';
    $id = $_GET['id'];
    $sql = "Delete from user_info where ID = $id";
    $result = $conn->query($sql);
    if($result === true)
    {
        echo '<script> alert("row deleted");
        window.location.href="Userdetails.php"</script>';
    }
    else {
        echo "delete failed";
    }
?>