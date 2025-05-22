<?php

declare(strict_types=1);

use Core\Database;

$heading = '';
$db = new Database();
$conn = $db->connect();

$userId = validateUser('user_id');
$noteId = filter_input(INPUT_GET, 'note_id', FILTER_VALIDATE_INT);

if (!$userId) {
    flash('error', 'You must be logged in to edit notes.');
    header('Location: /login');
    exit();
}

if (!$noteId) {
    flash('error', 'Invalid note ID.');
    header('Location: /notes');
    exit();
}

try {
    $stmt = $conn->prepare("SELECT id, title, description FROM notes WHERE user_id = :user_id AND id = :note_id");
    $stmt->execute([':user_id' => $userId, ':note_id' => $noteId]);
    $note = $stmt->fetch();

    if (!$note) {
        flash('error', 'Note not found or you do not have permission to edit it.');
        header('Location: /notes');
        exit();
    }

    $heading = $note['title'];
} catch (Exception $e) {
    flash('error', 'An error occurred while retrieving the note.');
    header('Location: /notes');
    exit();
}

require base_path('views/note/edit.view.php');
