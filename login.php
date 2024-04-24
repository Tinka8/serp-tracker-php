<?php 

include 'views/partials/header.php';
?>
        <div class="p-4">
            <form action="/profile.php" class="space-y-2">
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="border" required>
                </div>
                <div>
                    <label for="password">Heslo</label>
                    <input type="password" id="password" name="password" class="border" required>
                </div>
                <div>
                    <button type="submit" class="border bg-gray-100 px-2">Prihlasit</button>
                </div>
            </form>
        </div>
    </div>

<?php 

include 'views/partials/footer.php';
?>