<?php

$heading = 'Notes';

$userId = validateUser('user_id');

function getNotes($userId)
{
    global $db;
    $notes = [];

    $stmt = $db->connect()->prepare("SELECT title, description FROM notes WHERE user_id = :id");
    $stmt->execute([':id' => $userId]);
    $row = $stmt->fetchALL();

    foreach ($row as $note) {
        $notes[] = $note;
    }

    return $notes;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    try {
        if (!$userId) {
            abort(401);
        }
        $notes = getNotes($userId);
    } catch (\Exception $e) {
        throw new Exception($e->getMessage());
    }
}

return require base_path('views/notes/show.view.php');
