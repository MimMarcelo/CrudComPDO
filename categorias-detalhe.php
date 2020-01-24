<?php require_once 'global.php' ?>
<?php
try {
    $id = $_GET['id'];
    $categoria = new Categoria($id);
    $categoria->carregarProdutos();
} catch (Exception $ex) {
    
}
?>
<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Detalhe da Categoria</h2>
    </div>
</div>

<dl>
    <dt>ID</dt>
    <dd><?= $categoria->id ?></dd>
    <dt>Nome</dt>
    <dd><?= $categoria->nome ?></dd>
    <dt>Produtos</dt>
    <dd>
        <ul>
            <?php foreach ($categoria->produtos as $produto): ?>
                <li><a href="/produtos-editar.php?id=<?= $produto['id'] ?>"><?= $produto['nome'] ?></a></li>
            <?php endforeach; ?>
        </ul>
    </dd>
</dl>
<?php require_once 'rodape.php' ?>
