<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>DataWare</title>
</head>

<body class="bg-white">
    <section>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full text-center text-[80px] font-medium mb-4">
                <p>DATAWARE</p>
            </div>
            <div class="w-full bg-white rounded-lg shadow-xl border-t-2 dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight flex justify-center tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Connexion
                    </h1>
                    <?php
                    require('connection.php');
                    $message = '';

                    if (isset($_POST['email']) && isset($_POST['pass'])) {
                        $email = $_POST['email'];
                        $password = $_POST['pass'];

                        $query = "SELECT * FROM `utilisateur` WHERE email='$email' AND pass='$password'";

                        $result = mysqli_query($conn, $query);

                        if ($result !== false) {
                            $userData = mysqli_fetch_assoc($result);

                            if ($userData) {
                                session_start();
                                $_SESSION['id'] = $userData['id'];
                                $role = $userData['role'];
                                $name = $userData['nom'];

                                switch ($role) {
                                    case 'membre':
                                        $_SESSION['member'] = $name;
                                        $_SESSION['email'] = $email;
                                        header("Location: member.php");
                                        exit();
                                    case 'ProductOwner':
                                        $_SESSION['product'] = $name;
                                        $_SESSION['email'] = $email;
                                        header("Location: product.php");
                                        exit();
                                    case 'ScrumMaster':
                                        $_SESSION['scrum'] = $name;
                                        $_SESSION['email'] = $email;
                                        header("Location: scrum.php");
                                        exit();
                                }
                            } else {
                                $message = "L'email ou le mot de passe est incorrect.";
                            }
                        } else {
                            $message = "Erreur de requête SQL : " . mysqli_error($conn);
                        }
                    }
                    ?>
                    <form class="space-y-4 md:space-y-6" action="" method="post" name="login">
                        <div>
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="exemple@gmail.com" required="">
                        </div>
                        <div>
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de passe</label>
                            <input type="password" name="pass" id="" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <button type="submit" name="submit" class="w-full text-white bg-sky-500 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Se Connecter</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Vous n'avez pas un compte? <a href="register.php" class="font-medium text-sky-600  hover:underline dark:text-primary-500">Créer un compte</a>
                        </p>
                        <?php if (!empty($message)) { ?>
                            <p class="errorMessage"><?php echo $message; ?></p>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>