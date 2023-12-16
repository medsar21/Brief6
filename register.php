<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>DataWare</title>
</head>

<body class="">
    <section>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="overflow-y-auto h-[80vh] w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700 shadow-xl border-t-2 ">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight flex justify-center tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Créer un compte
                    </h1>
                    <?php
                    require('connection.php');
                    if (isset($_REQUEST['nom'], $_REQUEST['prenom'], $_REQUEST['email'], $_REQUEST['pass'], $_REQUEST['tel'])) {
                        $username = stripslashes($_REQUEST['nom']);
                        $username = mysqli_real_escape_string($conn, $username);
                        $surname = stripslashes($_REQUEST['prenom']);
                        $surname = mysqli_real_escape_string($conn, $surname);
                        $email = stripslashes($_REQUEST['email']);
                        $email = mysqli_real_escape_string($conn, $email);
                        $password = stripslashes($_REQUEST['pass']);
                        $password = mysqli_real_escape_string($conn, $password);

                        $tel = stripslashes($_REQUEST['tel']);
                        $tel = mysqli_real_escape_string($conn, $tel);
                        $query = "INSERT into `utilisateur` (nom, prenom, email, pass, tel,statut,role)
                         VALUES ('$username','$surname', '$email','$password','$tel','active','membre')";
                        $sql = "SELECT * from `utilisateur` WHERE 'email'= $ "
                        $result = 
                        $res = mysqli_query($conn, $query);
                        if ($res) {
                            echo "<div class='sucess [&>*]:text-black'>
                                <h3>Vous êtes inscrit avec succès.</h3>
                                <a class='hover:text-gray-400 font-medium' href='index.php'><p>Cliquez ici pour vous connecter</p></a>
                                </div>";
                        }
                    } else {
                    ?>
                        <form class="space-y-4 md:space-y-6" method="post">
                            <div class="flex justify-between">
                                <div>
                                    <label for="firstname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre Nom</label>
                                    <input type="text" name="nom" id="firstname" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nom" required="">
                                </div>

                                <div>
                                    <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre Prenom</label>
                                    <input type="text" name="prenom" id="lastname" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Prenom" required="">
                                </div>
                            </div>
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre email</label>
                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="exemple@gmail.com" required="">
                            </div>
                            <div>
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telephone</label>
                                <input type="tel" name="tel" id="" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0625142558" required="">
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de passe</label>
                                <input type="password" name="pass" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmer mot de passe</label>
                                <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            </div>
                            <button type="submit" name="submit" class="w-full text-white bg-sky-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Créer un compte</button>
                            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Avez vous déjà un compte? <a href="index.php" class="font-medium text-sky-600 hover:underline dark:text-primary-500">Se connecter</a>
                            </p>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</body>

</html>