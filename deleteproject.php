​<?php
    include "connection.php";
    if (isset($_GET['id_pro'])) {
        $id = $_GET['id_pro'];
        $update = "UPDATE utilisateur SET projet = NULL, role = 'membre' WHERE projet = $id";
        $result = mysqli_query($conn, $update);
        $sql = "DELETE FROM projet WHERE id_pro =$id";
        $result = mysqli_query($conn, $sql);
        if ($result == TRUE) {
            header('Location: product.php');
        }
    }
    ?>