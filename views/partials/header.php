<?php include_once __DIR__ . '/../../functions.php' ?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>SERP tracker</title>
</head>
<body>
    <div class="wrapper <?php echo switch_theme() ?> pt-10">
        <header class="container max-w-screen-md mx-auto">
            <h1 class="text-2xl font-bold">
                SERP tracker
            </h1>

            <nav>
                <ul class="flex space-x-4">
                    <li>
                        <a 
                            href="/"
                            class="<?php echo $_SERVER['REQUEST_URI'] === '/' ? 'underline' : '' ?>">
                            Home</a
                        >
                    </li>
                    <li>
                        <a 
                            href="/scrape.php"
                            class="<?php echo $_SERVER['REQUEST_URI'] === '/scrape.php' ? 'underline' : '' ?>">
                            Scrape</a
                        >
                    </li>
                    <li>
                        <a 
                            href="/login.php"
                            class="<?php echo $_SERVER['REQUEST_URI'] === '/login.php' ? 'underline' : '' ?>">
                            Login</a
                        >
                    </li>
                    <li>
                        <a 
                            href="/profile.php"
                            class="<?php echo $_SERVER['REQUEST_URI'] === '/profile.php' ? 'underline' : '' ?>">
                            Profile</a
                        >
                    </li>
                </ul>
            </nav>
        </header>
    </div>