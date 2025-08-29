<?php
    include 'cabecalho.php';
?>

<body>
    <div class="container">
        <h1></h1>
        <h2>ATUALIZAÇÃO DE PRODUTO</h2>
        <?php
            $id = $_GET['id'];
            // echo "Recebi ==> $id";

            require 'conexao.php';
            $sql = "SELECT * FROM produtos WHERE id = $id";
            $stmt = $pdo->query($sql);
            $produto = $stmt->fetch(PDO::FETCH_ASSOC);
            // print_r($produto);

            // echo $produto['nome'];


            // while ($produto = $stmt->fetch(PDO::FETCH_ASSOC)) {
            //     echo "ID: " . $produto['id'] . "<br>";
            //     echo "Nome: " . $produto['nome'] . "<br>";
            //     echo "Preço: R$" . $produto['preco'] . "<br>";
            //     echo "Estoque: " . $produto['estoque'] . "<br><br>";
            // }

        ?>
        <form action="#" method="POST">
            <div class="mb-3">
                Nome: <input value="<?php echo $produto['nome']; ?>"type="text" class="form-control" name="produto" >
            </div>
            <div class="mb-3">
                Preço: <input value="<?php echo $produto['preco']; ?>" type="text" class="form-control" name="preco" >
            </div>
            <div class="mb-3">
                Quantidade: <input value="<?php echo $produto['quantidade']; ?>" type="text" class="form-control" name="quantidade" >
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="index.php" type="button" class="btn btn-warning">Voltar</a>
            </div>
        </form>
    </div>
<?php
    include 'rodape.php';
?>