<?php require base_path('views/partials/head.php'); ?>

<?php require base_path('views/partials/nav.php');  ?>

<?php require base_path('views/partials/banner.php');  ?>

<?= showToast(); ?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p><?= $note['description'] ?></p>
        <div class="mt-4 relative">
            <a href="/edit?note_id=<?= (int)$note['id'] ?>" class="cursor-pointer btn-sm bg-blue-600 rounded-md px-2 py-1 text-white hover:bg-blue-700">Edit</a>
        </div>
    </div>
</main>