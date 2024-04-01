<?php require __DIR__ . '/partials/header.php'; ?>

<div class="wrapper bg-zinc-200 py-10">
    <main class="container max-w-screen-md mx-auto bg-white shadow">
        <table class="w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="text-left">Stránka</th>
                    <th class="text-left">Kľúčové slovo</th>
                    <th class="text-left">Pozícia</th>
                    <th class="text-left">Dátum</th>
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