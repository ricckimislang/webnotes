<?php require base_path('views/partials/head.php'); ?>

<?php require base_path('views/partials/nav.php'); ?>

<?php require base_path('views/partials/banner.php'); ?>

<?php echo showToast(); ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex justify-end">
        <a href="/note/create" class="btn btn-sm btn-success rounded-md px-2 py-1 text-white hover:bg-green-700">Add Note</a>
    </div>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <?php foreach ($notes as $note): ?>
                <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200 hover:shadow-xl transition-shadow duration-300 flex flex-col justify-between h-full">
                    <div>
                        <h2 class="text-xl font-semibold mb-2">
                            <?php echo htmlspecialchars($note['title']) ?>
                        </h2>
                        <p class="text-sm text-gray-600">
                            <?php echo htmlspecialchars($note['description']) ?>
                        </p>
                    </div>

                    <!-- Footer Section -->
                    <div class="flex justify-end items-center mt-6 pt-4 border-t border-gray-100 space-x-4">

                        <label for="confirm-delete-<?= $note['id'] ?>" class="btn btn-error btn-xs text-white">Delete</label>

                        <a href="/note?note_id=<?php echo $note['id'] ?>" class="btn btn-xs btn-info text-white font-medium">
                            View Details →
                        </a>
                    </div>
                </div>

                <!-- modal for delete -->
                <input type="checkbox" id="confirm-delete-<?= $note['id'] ?>" class="modal-toggle" />
                <div class="modal">
                    <div class="modal-box">
                        <h3 class="font-bold text-lg">Confirm Deletion</h3>
                        <p class="py-4">Are you sure you want to delete this note?</p>

                        <div class="modal-action">
                            <!-- Cancel button -->
                            <label for="confirm-delete-<?= $note['id'] ?>" class="btn">Cancel</label>

                            <!-- Delete form -->
                            <form method="POST" action="/note/destroy">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="note_id" value="<?= $note['id'] ?>">
                                <button type="submit" class="btn btn-error text-white">Yes, Delete</button>
                            </form>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</main>



<?php require base_path('/views/partials/footer.php'); ?>