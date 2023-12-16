<?php
include("connection.php");
include("addproject.php");
include("addscrumaster.php");
session_start();
if (!isset($_SESSION["product"])) {
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
                        <a href="logout.php" class="block py-2 px-3 text-red-500 rounded hover:bg-blue-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Deconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Popup Ajouter un Projet -->
    <div id="popup4" class="fixed w-full h-full top-0 left-0  items-center flex justify-center hidden z-50">
        <div class="bg-white w-1/3 h-fit border-2 border-black flex flex-col justify-start items-center overflow-y-auto rounded-2xl ">
            <div class="bg-black w-1/3 h-8 fixed rounded-tr-2xl rounded-tl-2xl">
                <div class="flex justify-end">
                    <span onclick="closePopup4()" class="text-2xl text-white font-bold cursor-pointer mr-3">&times;</span>
                </div>
            </div>
            <form class="mt-10 p-2" method="post">
                <div>
                    <label for="" class="block text-sm font-medium leading-6 text-black-900">Nom projet</label>
                    <div class="relative mt-2 rounded-md">
                        <input type="text" name="nom_pro" id="" class="block rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6 w-full">
                    </div>
                </div>
                <div>
                    <label for="" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                    <div class="relative mt-2 rounded-md">
                        <textarea name="descrp_pro" id="" class="block rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6 resize-none w-full"></textarea>
                    </div>
                </div>

                <div class="flex items-center justify-between mt-2">
                    <button type="submit" name="submit" class="text-white bg-black hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Ajouter</button>
                    <p onclick="closePopup4()" class="cursor-pointer text-white bg-black hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Retour</p>
                </div>
            </form>
        </div>
    </div>
    <!-- Popup Assigner scrum master -->
    <div id="popup5" class="fixed w-full h-full top-0 left-0  items-center flex justify-center hidden z-50">
        <div class="bg-white w-1/3 h-fit border-2 border-black flex flex-col justify-start items-center overflow-y-auto rounded-2xl ">
            <div class="bg-black w-1/3 h-8 fixed rounded-tr-2xl rounded-tl-2xl">
                <div class="flex justify-end">
                    <span onclick="closePopup5()" class="text-2xl text-white font-bold cursor-pointer mr-3">&times;</span>
                </div>
            </div>
            <form class="mt-10 p-2" method="post">
                <div>
                    <label for="" class="block text-sm font-medium leading-6 text-gray-900">Projet</label>
                    <div class="relative mt-2 rounded-md">
                        <select name="projet" id="" class="block rounded-md border-0 py-1.5 pl-2 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6 w-full">

                            <?php
                            $query = "SELECT id_pro,nom_pro FROM projet where nom_pro <> 'none'";
                            $result = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['id_pro'] . "'>" . $row['nom_pro'] . "</option>";
                            }

                            ?>

                        </select>
                    </div>
                </div>
                <div>
                    <label for="" class="block text-sm font-medium leading-6 text-gray-900">Membre</label>
                    <div class="relative mt-2 rounded-md">
                        <select name="id" id="" class="block rounded-md border-0 py-1.5 pl-2 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6 w-full">

                            <?php
                            $query = "SELECT * FROM utilisateur where role='membre'";
                            $result = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['id'] . "'>" . $row['nom'] . " " . $row['prenom'] . "</option>";
                            }
                            ?>

                        </select>
                    </div>
                </div>
                <div class="flex items-center justify-between mt-2 w-full">
                    <button type="submit" name="submits" class="text-white bg-black hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Ajouter</button>
                    <p onclick="closePopup5()" class="cursor-pointer text-white bg-black hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Retour</p>
                </div>
            </form>
        </div>
    </div>
    <!-- ----------------------------------------- -->

    <!-- CRUD projets  -->
    <div class="w-[90%] mx-auto">
        <section class="equipe">
            <div class="bg-gray-100 py-10">
                <div class="flex justify-between w-full mt-4 sm:mt-0 sm:flex-none">
                    <h1 class="text-3xl font-bold leading-none tracking-tight text-black md:text-3xl lg:text-4xl ">Affichage des projets</h1>
                    <button onclick="openPopup4();" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-black px-4 py-2 text-sm font-medium mb-4 text-white shadow-sm hover:bg-white hover:text-black focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Ajouter un Projet</button>
                </div>
                <div class="mt-8 flex flex-col">
                    <div class="my-2 overflow-x-auto">
                        <div class="inline-block min-w-full py-2 align-middle">
                            <div class="overflow-hidden shadow-sm ring-1 ring-black ring-opacity-5">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">Id projet</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Nom projet</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Description</th>

                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                                <span>Modifier</span>
                                            </th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                                <span>Supprimer</span>
                                            </th>
                                        </tr>
                                    </thead>


                                    <tbody class="divide-y divide-gray-200 bg-white">

                                        <tr>
                                            <?php
                                            $sql = "SELECT * FROM projet  where nom_pro <> 'none'";
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
                                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-center text-sm font-medium sm:pr-6 lg:pr-8">
                                                        <a href="editproject.php?id_pro=<?php echo $row['id_pro']; ?>" class="text-black hover:text-indigo-900">Modifier<span class="sr-only"></span></a>
                                                    </td>
                                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-center text-sm font-medium sm:pr-6 lg:pr-8">
                                                        <a href="deleteproject.php?id_pro=<?php echo $row['id_pro']; ?>" class="text-black hover:text-indigo-900">Supprimer<span class="sr-only"></span></a>
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
        </section>



        <section class="membre">
            <div class="bg-gray-100 py-10">
                <div class="flex justify-between w-full mt-4 sm:mt-0 sm:flex-none">
                    <h1 class="mb-4 text-3xl font-bold leading-none tracking-tight text-black md:text-3xl lg:text-4xl ">Assigner Scrum master à un projet</h1>
                    <button onclick="openPopup5()" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-black px-4 py-2 text-sm font-medium mb-4 text-white shadow-sm hover:bg-white hover:text-black focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Assigner scrum master</button>
                </div>
                <div class="mt-8 flex flex-col">
                    <div class="my-2 overflow-x-auto">
                        <div class="inline-block min-w-full py-2 align-middle">
                            <div class="overflow-hidden shadow-sm ring-1 ring-black ring-opacity-5">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">id Projet</th>

                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Nom Projet</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Scrum master</th>

                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                                <span>Supprimer</span>
                                            </th>
                                        </tr>
                                    </thead>


                                    <tbody class="divide-y divide-gray-200 bg-white">

                                        <tr>
                                            <?php
                                            $sql = "SELECT * FROM projet inner join  utilisateur  on utilisateur.projet = projet.id_pro and utilisateur.role = 'ScrumMaster'  and nom_pro <> 'none' ";
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
                                                        echo $row["nom"];
                                                        ?>
                                                    </td>


                                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-center text-sm font-medium sm:pr-6 lg:pr-8">
                                                        <a href="deletesm.php?id=<?php echo $row['id']; ?>" class="text-black hover:text-indigo-900">Supprimer<span class="sr-only"></span></a>
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

    <script src="popup.js"></script>
</body>

</html>