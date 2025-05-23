<?php require base_path('views/partials/head.php'); ?>

<?php require base_path('views/partials/nav.php'); ?>

<?php require base_path('views/partials/banner.php'); ?>

<?php echo showToast(); ?>

<main class="animate__animated animate__fadeIn">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form method="POST" action="/note/create" class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow space-y-4">
            <input type="hidden" name="_method" value="POST" />
            <!-- Title Field -->
            <div class="form-control">
                <label for="title" class="label">
                    <span class="label-text font-semibold">Title</span>
                </label>
                <input type="text" name="title" id="title" class="input input-bordered w-full" required>
            </div>

            <!-- Description Field -->
            <div class="form-control">
                <label for="description" class="label">
                    <span class="label-text font-semibold">Description</span>
                </label>
                <textarea name="description" id="description" rows="4" class="textarea textarea-bordered w-full" required></textarea>
            </div>

            <!-- Submit Button -->
            <div class="form-control">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</main>

<?php require base_path('/views/partials/footer.php'); ?>