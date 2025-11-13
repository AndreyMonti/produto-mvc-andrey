<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="card">
  <div class="card-header">
    <h2>Produtos</h2>
  </div>
  <div class="card-body">
    <?php if (!empty($_SESSION['success'])): ?>
      <div class="flash" data-success="<?php echo htmlspecialchars($_SESSION['success']); ?>"></div>
      <?php unset($_SESSION['success']); endif; ?>
    <?php if (!empty($_SESSION['errors'])): ?>
      <div class="flash" data-errors="<?php echo htmlspecialchars(json_encode($_SESSION['errors'])); ?>"></div>
      <?php unset($_SESSION['errors']); unset($_SESSION['old']); endif; ?>

    <?php if (count($products) === 0): ?>
      <p class="muted">Nenhum produto cadastrado ainda.</p>
    <?php else: ?>
      <table class="table">
        <thead>
          <tr><th>Nome</th><th>Preço</th><th>Categoria</th><th>Ações</th></tr>
        </thead>
        <tbody>
          <?php foreach ($products as $p): ?>
            <tr>
              <td><?php echo htmlspecialchars($p['name']); ?></td>
              <td>R$ <?php echo number_format($p['price'], 2, ',', '.'); ?></td>
              <td><?php echo htmlspecialchars($p['category']); ?></td>
              <td class="actions">
                <a class="btn-sm" href="index.php?action=edit&id=<?php echo $p['id']; ?>">Editar</a>
                <button class="btn-sm danger js-delete" data-id="<?php echo $p['id']; ?>">Excluir</button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
