<?php
require 'conexao.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $sql = "DELETE FROM produtos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
}

header("Location: listar.php");
exit;
?>

