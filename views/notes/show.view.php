<?php require base_path('views/partials/head.php'); ?>

<?php require base_path('views/partials/nav.php');  ?>

<?php require base_path('views/partials/banner.php');  ?>

<?= showToast(); ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <ul class="space-y-4">
            <?php foreach ($notes as $note) : ?>
                <li class="bg-white shadow rounded-lg p-4 border border-gray-200">
                    <h2 class="text-lg font-semibold">
                        <a href="/note?id=<?= $note['description'] ?>"><?= $note['title'] ?></a>
                    </h2>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</main>



<?php require base_path('/views/partials/footer.php'); ?>