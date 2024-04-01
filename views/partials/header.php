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
                        <a href="/">
                            Results
                        </a>
                    </li>
                    <li>
                        <a href="/scrape.php">
                            Scrape
                        </a>
                    </li>
                </ul>
            </nav>
        </header>
    </div>