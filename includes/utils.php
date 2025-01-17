<?php
function dbConnect(): PDO{
    return new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE . ';charset=utf8', DB_USERNAME, DB_PASSWORD);
}

function getRedirection(PDO $db, string $redirect_to): array{
    $stmt = $db->prepare('SELECT * FROM redirections WHERE custom_name = ?');
    $stmt->execute([$redirect_to]);
    return $stmt->fetchAll();
}

function buildWaiter(): string{
    return file_get_contents('includes/waiter.html');
}