<?php require base_path('views/partials/head.php'); ?>

<?php require base_path('views/partials/nav.php');  ?>

<?php require base_path('views/partials/banner.php');  ?>

<?= showToast(); ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <?php foreach ($notes as $note) : ?>
                <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200 hover:shadow-xl transition-shadow duration-300 flex flex-col justify-between h-full">
                    <div>
                        <h2 class="text-xl font-semibold mb-2">
                            <?= htmlspecialchars($note['title']) ?>
                        </h2>
                        <p class="text-sm text-gray-600">
                            <?= htmlspecialchars($note['description']) ?>
                        </p>
                    </div>

                    <!-- Footer Section -->
                    <div class="mt-6 pt-4 border-t border-gray-100 text-right">
                        <a href="/note?note_id=<?= $note['id'] ?>" class="text-black-600 font-medium hover:underline hover:text-blue-600">
                            View Details →
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>



<?php require base_path('/views/partials/footer.php'); ?>