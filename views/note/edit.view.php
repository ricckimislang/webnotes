<?php require base_path('views/partials/head.php'); ?>

<?php require base_path('views/partials/nav.php');  ?>

<?php require base_path('views/partials/banner.php');  ?>


<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <form id="editNote" action="/edit" method="POST" class="space-y-6">
            <input type="hidden" name="note_id" value="<?= (int)$note['id']; ?>">
            <input type="hidden" name="_method" value="PATCH">
            <div class="space-y-2">
                <label for="description" class="block text-sm font-medium text-gray-700">Note Description</label>
                <textarea name="description" id="description" rows="8" class="p-4 mt-1 block w-full rounded-md border-1 border-solid shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"><?= htmlspecialchars($note['description'] ?? 'no description') ?></textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Save Changes</button>
            </div>
        </form>
    </div>
</main>