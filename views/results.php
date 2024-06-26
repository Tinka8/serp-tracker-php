<?php require __DIR__ . '/partials/header.php'; ?>
<?php include_once __DIR__ . '/../functions.php' ?>

<div class="wrapper py-10 <?php echo switch_theme() ?>">
    <main class="container max-w-screen-md mx-auto shadow p-5">
        <table class="w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="text-left">Site</th>
                    <th class="text-left">Keyword</th>
                    <th class="text-left">Position</th>
                    <th class="text-left">Date</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php

                foreach ($data as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row['name'] ?></td>
                        <th scope="row" class="text-left"><?php echo $row['phrase_name']; ?></th>
                        <td><?php echo $row['position'] ?></td>
                        <td><?php echo $row['created_at'] ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </main>
</div>

<?php require __DIR__ . '/partials/footer.php';