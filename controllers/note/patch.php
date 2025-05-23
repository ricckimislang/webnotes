<?php

declare(strict_types=1);

use Core\Database;
use Core\Validator;

$db = new Database();
$conn = $db->connect();
$validator = new Validator($conn);

$userId = validateUser('user_id');
$noteId = filter_input(INPUT_POST, 'note_id', FILTER_VALIDATE_INT);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);

if (!$userId) {
    flash('error', 'You must be logged in to edit notes.');
    header('Location: /login');
    exit();
}

if (!$noteId) {
    flash('error', 'Invalid note ID.');
    header('Location: /note?note_id=' . $noteId);
    exit();
}

try {
    // Verify note ownership
    $stmt = $conn->prepare("SELECT id FROM notes WHERE user_id = :user_id AND id = :note_id");
    $stmt->execute([':user_id' => $userId, ':note_id' => $noteId]);
    
    if (!$stmt->fetch()) {
        flash('error', 'Note not found or you do not have permission to edit it.');
        header('Location: /note?note_id=$id');
        exit();
    }

    $v  = Validator::string($description, 'description', 1, 200);

    if (!$v) {
        flash('error', 'Description must be between 1 and 200 characters.');
        old('old_description', $description);
        header('Location: /edit?note_id=' . $noteId);
        exit();
    }

    // Update the note
    $stmt = $conn->prepare("UPDATE notes SET description = :description WHERE id = :note_id AND user_id = :user_id");
    $stmt->execute([
        ':description' => $description,
        ':note_id' => $noteId,
        ':user_id' => $userId
    ]);

    flash('success', 'Note updated successfully.');
    unset($_SESSION['old_description']);
    header('Location: /note?note_id=' . $noteId);
    exit();
} catch (Exception $e) {
    flash('error', 'An error occurred while updating the note.');
    header('Location: /edit');
    exit();
} 