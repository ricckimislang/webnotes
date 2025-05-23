<?php

use Core\Database;
use Core\Validator;

$heading = 'Create Note';

$db = new Database();
$conn = $db->connect();

$validator = new Validator($conn);

$userId = validateUser('user_id');



function handleStoreNote($conn, $validator, $title, $description)
{
    $vtitle = $validator->string($title, 'title', 1, 20);
    $vdescription = $validator->string($description, 'description', 1, 200);

    if (!$vtitle || !$vdescription) {
        header('Location: /note/create');
        exit();
    }
    return true;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && strtoupper($_POST['_method']) === 'POST') {

    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);

    try {
        if (!handleStoreNote($conn, $validator, $title, $description)) {
            return;
        }

        $stmt = $conn->prepare("INSERT INTO notes (title, description, user_id) VALUES (:title, :description, :user_id)");
        $stmt->execute([
            ':title' => $title,
            ':description' => $description,
            ':user_id' => $userId,
        ]);
        if ($stmt->rowcount() > 0) {
            flash('success', 'Note created successfully!');
            header('Location: /notes');
            exit();
        }
    } catch (PDOException $e) {
        flash('error', 'Failed to create note: ' . $e->getMessage());
        header('Location: /note/create');
        exit();
    }
}

require base_path('views/note/create.view.php');
