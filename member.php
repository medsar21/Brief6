<?php
include("connection.php");

// Initialiser la session
session_start();
$id = $_SESSION['id'];

if (!isset($_SESSION["member"])) {
    echo "Tu n'as pas la permission pour acceder.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>DataWare</title>
</head>

<body class="bg-gray-100">

    <!-- navbar  -->


    <nav class="bg-black">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <h1 class="text-white">DATAWARE</h1>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
                    <li>
                        <a href="logout.php" class="block py-2 px-3 text-red-500 rounded hover:bg-blue-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Deconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <h1 class="mt-2 ml-24 mb-4 text-4xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl">Bienvenue</h1>

    <!-- Affichage mes projets  -->
    <div class="w-[80%] mx-auto">
        <section class="equipe">
            <div class="bg-gray-100 py-10">

                <div>
                    <div class="sm:flex sm:items-center">
                        <div class="mt-4 sm:mt-0 sm:flex-none">
                            <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-black md:text-3xl lg:text-4xl">Mes projets</h2>
                        </div>
                    </div>
                    <div class="mt-8 flex flex-col">
                        <div class="my-2 overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <div class="overflow-hidden shadow-sm ring-1 ring-black ring-opacity-5">
                                    <table class="min-w-full divide-y divide-gray-300">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">Id Projet</th>
                                                <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Nom Porjet</th>
                                                <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Description</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">

                                            <tr>

                                                <?php
                                                // $sql = "SELECT * FROM projet inner join  utilisateur  on utilisateur.projet = projet.id_pro and utilisateur.role = 'ScrumMaster' " ;

                                                // $sql = "SELECT * FROM utilisateur where id=$id";
                                                $sql = "SELECT projet.id_pro, projet.nom_pro, projet.descrp_pro
                                            FROM utilisateur
                                            JOIN equipe ON utilisateur.equipe = equipe.id_equipe
                                            JOIN projet ON equipe.id_pro = projet.id_pro
                                            WHERE utilisateur.id = $id;
                                            ";


                                                $result = mysqli_query($conn, $sql);

                                                if ($result) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-center font-medium text-gray-900 sm:pl-6 lg:pl-8">
                                                            <?php
                                                            echo $row["id_pro"];
                                                            ?>
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                            <?php
                                                            echo $row["nom_pro"];
                                                            ?>
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                            <?php
                                                            echo $row["descrp_pro"];
                                                            ?>
                                                        </td>
                                            </tr>
                                    <?php
                                                    }
                                                    mysqli_free_result($result);
                                                } else {
                                                    echo "Error: " . mysqli_error($conn);
                                                }
                                    ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Affichage mes equipes  -->
        <section class="equipe">
            <div class="bg-gray-100 py-10">

                <div>
                    <div class="sm:flex sm:items-center">
                        <div class="mt-4 sm:mt-0 sm:flex-none">
                            <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-black md:text-3xl lg:text-4xl">Mes equipes</h2>
                        </div>
                    </div>
                    <div class="mt-8 flex flex-col">
                        <div class="my-2 overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <div class="overflow-hidden shadow-sm ring-1 ring-black ring-opacity-5">
                                    <table class="min-w-full divide-y divide-gray-300">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">Id Equipe</th>
                                                <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Nom Equipe</th>
                                                <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Date de Creation</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">

                                            <tr>

                                                <?php
                                                // $sql = "SELECT * FROM equipe inner join  utilisateur  on utilisateur.equipe = equipe.id_equipe" ;
                                                $sql = "SELECT equipe.id_equipe, equipe.nom_equipe, equipe.date_creation
                                            FROM utilisateur
                                            JOIN equipe ON utilisateur.equipe = equipe.id_equipe
                                            WHERE utilisateur.id = $id;
                                            ";

                                                // $sql = "SELECT * FROM equipe";
                                                $result = mysqli_query($conn, $sql);

                                                if ($result) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-center font-medium text-gray-900 sm:pl-6 lg:pl-8">
                                                            <?php
                                                            echo $row["id_equipe"];
                                                            ?>
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                            <?php
                                                            echo $row["nom_equipe"];
                                                            ?>
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                            <?php
                                                            echo $row["date_creation"];
                                                            ?>
                                                        </td>
                                            </tr>
                                    <?php
                                                    }
                                                    mysqli_free_result($result);
                                                } else {
                                                    echo "Error: " . mysqli_error($conn);
                                                }
                                    ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>