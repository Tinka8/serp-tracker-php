<?php

require_once "app/User.php";
include_once "functions.php";

$user = new User();


include 'views/partials/header.php';
?>
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold">
            Registrace
        </h1>
        <div class="p-4">
            <form action="/register.php" class="space-y-2" method="POST">
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="border" required>
                </div>
                <div>
                    <label for="password">Heslo</label>
                    <input type="password" id="password" name="password" class="border" required>
                </div>
                <div>
                    <button type="submit" class="border bg-gray-100 px-2">Registrovat</button>
                </div>
            </form>
        </div>
        <?php 
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
	        $email = $_POST["email"];
	        $password = $_POST["password"];

         
            if (User::create($email, $password)) { ?>
            <div class="px-6 py-2 bg-green-200 text-green-800 border-green-400 border my-2">
                Uživatel byl úspěšně zaregistrován.
            </div>
        <?php }
        }?>
            
    </div>

<?php 

include 'views/partials/footer.php';
?>