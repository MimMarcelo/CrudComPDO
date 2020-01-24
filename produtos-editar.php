<?php require_once 'global.php' ?>
<?php
try {
    $id = $_GET['id'];
    $produto = new Produto($id);
    $categorias = Categoria::listar();

//    echo "<pre>";
//    print_r($produto);
//    echo "</pre>";
} catch (Exception $e) {
    Erro::tratarErro($e);
}
?>
<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Editar Nova Categoria</h2>
    </div>
</div>

<form action="produtos-editar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <input type="hidden" name="id" value="<?= $produto->id ?>">
            <div class="form-group">
                <label for="nome">Nome do Produto</label>
                <input type="text" name="nome" value="<?= $produto->nome ?>" class="form-control" placeholder="Nome do Produto" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço da Produto</label>
                <input type="number" name="preco" value="<?= $produto->preco ?>" step="0.01" min="0" class="form-control" placeholder="Preço do Produto" required>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade do Produto</label>
                <input type="number" name="quantidade" value="<?= $produto->quantidade ?>" min="0" class="form-control" placeholder="Quantidade do Produto" required>
            </div>
            <div class="form-group">
                <label for="nome">Categoria do Produto</label>
                <select class="form-control" name="categoria_id">
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?= $categoria['id'] ?>" <?= $categoria['id']==$produto->categoria_id?"selected":""; ?>><?= $categoria['nome'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>

<?php require_once 'rodape.php' ?>
