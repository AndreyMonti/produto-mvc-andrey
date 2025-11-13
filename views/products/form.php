<?php require __DIR__ . '/../layout/header.php'; 

// old values, errors
$old = $_SESSION['old'] ?? null;
$errors = $_SESSION['errors'] ?? null;
if (isset($_SESSION['old'])) { unset($_SESSION['old']); }
if (isset($_SESSION['errors'])) { unset($_SESSION['errors']); }
?>

<div class="card card-form">
  <div class="card-header">
    <h2><?php echo ($product ? 'Editar Produto' : 'Novo Produto'); ?></h2>
  </div>
  <div class="card-body">
    <?php if ($errors): ?>
      <div class="alert">
        <ul>
          <?php foreach ($errors as $err): ?>
            <li><?php echo htmlspecialchars($err); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form action="index.php?action=<?php echo $action; ?>" method="post" class="form">
      <label>Nome
        <input type="text" name="name" value="<?php echo htmlspecialchars($old['name'] ?? $product['name'] ?? ''); ?>" required />
      </label>
      <label>Preço
        <input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($old['price'] ?? $product['price'] ?? '0.00'); ?>" required />
      </label>
      <label>Categoria
        <input type="text" name="category" value="<?php echo htmlspecialchars($old['category'] ?? $product['category'] ?? ''); ?>" required />
      </label>

      <div class="form-actions">
        <a class="btn-link" href="index.php">Cancelar</a>
        <button class="btn" type="submit">Salvar</button>
      </div>
    </form>
  </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
