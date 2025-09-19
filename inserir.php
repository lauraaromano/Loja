<?php
    require 'conexao.php';

    $nome = $_POST['produto'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    $sql = "INSERT INTO produtos (nome, preco, quantidade) VALUES (:nome, :preco, :quantidade)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':quantidade', $quantidade);
    
    if ($stmt->execute()) {
        echo '<div class="alert alert" style="background-color:#f8d7da; color:#721c24; border:1px solid #f5c6cb; border-radius:5px;">';
        echo "Produto inserido com sucesso!";
        echo '</div>';
    } else {
        echo "Erro ao inserir produto.";
    }
?> 