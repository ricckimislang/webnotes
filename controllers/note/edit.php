<?php
$heading = '';

$userId = validateUser('user_id');
$noteId = $_GET['note_id'] ?? null;

function getNote($userId, $noteId)
{
    try {
        global $db;

        $stmt = $db->connect()->prepare("SELECT id, title, description FROM notes WHERE user_id = :user_id AND id = :note_id");
        $stmt->execute([':user_id' => $userId, ':note_id' => $noteId]);
        $row = $stmt->fetch();

        if (empty($row)) {
            return false; // note not found or user doesn't have access to the note
        }
        return $row;
    } catch (Exception $e) {
        throw new Exception($e->getMessage());
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    try {
        if (!$userId) {
            header('location: /notes');
            exit();
        }
        $note = getNote($userId, $noteId);

        if (!$note) {
            flash('error', 'Note not found.');
            header('Location: /notes');
            exit();
        }
        $heading = $note['title'];
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

require base_path('views/note/edit.view.php');
