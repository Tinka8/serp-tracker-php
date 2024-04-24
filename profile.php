<?php

require_once "app/User.php";

$user = new User();
$user->setEmail($_GET["email"]);
$user->setPassword($_GET["password"]);

include 'views/partials/header.php';
?>

    <div>
        <?php echo "E-mail: " . $user->getEmail(); ?><br />
        <?php echo "Heslo: " . $user->getPassword(); ?><br />
        <?php echo "Role: " . $user->role; ?>
    </div>
</body>
</html>

<?php 

include 'views/partials/footer.php';
?>