<!-- remove member from squad  -->

<?php
require('connection.php');

if (isset($_GET['id_equipe'])) {
    $id = $_GET['id_equipe'];

    $updateQuery = "UPDATE equipe
                    SET id_pro = NULL
                    WHERE id_equipe = '$id'";

    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        header('Location: scrum.php');
    }
}
?>