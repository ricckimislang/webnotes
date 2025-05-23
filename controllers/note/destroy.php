<?php

use Core\Database;
use Core\Validator;

$db = new Database();
$conn = $db->connect();
$userId = validateUser('user_id');

function deleteNote($conn, $noteId, $userId)
{
    $stmt = $conn->prepare("DELETE FROM notes WHERE id = :id AND user_id = :user_id");
    $stmt->execute([':id' => $noteId, ':user_id' => $userId]);
    if($stmt->rowCount() > 0){
        return true;
    }
    return false;
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['_method'] === 'DELETE') 
{
    $noteId = $_POST['note_id'] ?? '';

    $deleteNote = deleteNote($conn, $noteId, $userId);

    if(!$deleteNote){
        abort(401);
    }
    flash('success', 'Note deleted successfully');
    header('Location: /notes');
    exit();
}

require base_path('views/notes/show.view.php');
