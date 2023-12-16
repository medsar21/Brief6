​<?php
    include "connection.php";
    if (isset($_GET['id_equipe'])) {
        $id = $_GET['id_equipe'];
        $update = "UPDATE utilisateur SET equipe = NULL WHERE equipe = $id";
        $result = mysqli_query($conn, $update);
        $sql = "DELETE FROM equipe WHERE id_equipe =$id";
        $result = mysqli_query($conn, $sql);
        if ($result == TRUE) {
            header('Location: scrum.php');
        }
    }
    ?>