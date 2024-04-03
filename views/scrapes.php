<?php require __DIR__ . '/partials/header.php'; ?>
<?php include_once __DIR__ . '/../functions.php' ?>

<div class="wrapper bg-zinc-200 py-10">
    <main class="container max-w-screen-md mx-auto bg-white shadow">
        <?php foreach($scrapes as $scrape): ?>
            <div class="p-4 border-b">
                <h2 class="text-xl font-bold"><?php echo $scrape['domain']; ?></h2>
                <p><?php echo $scrape['phrase']; ?></p>
                <p><?php echo $scrape['position']; ?></p>
            </div>
        <?php endforeach; ?>
    </main>
</div>

<?php require __DIR__ . '/partials/footer.php';