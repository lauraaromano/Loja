<?php
include 'cabecalho.php';
require 'conexao.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID inválido!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['produto'] ?? '';
    $preco = $_POST['preco'] ?? '';
    $quantidade = $_POST['quantidade'] ?? '';

    if ($nome && is_numeric($preco) && is_numeric($quantidade)) {
        $sqlUpdate = "UPDATE produtos SET nome = :nome, preco = :preco, quantidade = :quantidade WHERE id = :id";
        $stmtUpdate = $pdo->prepare($sqlUpdate);
        $stmtUpdate->execute([
            ':nome' => $nome,
            ':preco' => $preco,
            ':quantidade' => $quantidade,
            ':id' => $id
        ]);

        echo "<div class='alert alert-success'>Produto atualizado com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger'>Preencha os campos corretamente.</div>";
    }
}


$sql = "SELECT * FROM produtos WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);
$produto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$produto) {
    echo "Produto não encontrado!";
    exit;
}
?>

<body>
<div class="container">
    <h2>ATUALIZAÇÃO DE PRODUTO</h2>
    <form action="#" method="POST">
        <div class="mb-3">
            Nome: <input value="<?php echo htmlspecialchars($produto['nome']); ?>" type="text" class="form-control" name="produto" >
        </div>
        <div class="mb-3">
            Preço: <input value="<?php echo htmlspecialchars($produto['preco']); ?>" type="text" class="form-control" name="preco" >
        </div>
        <div class="mb-3">
            Quantidade: <input value="<?php echo htmlspecialchars($produto['quantidade']); ?>" type="text" class="form-control" name="quantidade" >
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="listar.php" class="btn btn-warning">Voltar</a>
    </form>
</div>
<?php
include 'rodape.php';
?>
