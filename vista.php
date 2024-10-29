<?php 
  require "productos.php";
  $data = new Productos();
  $productos = json_decode( $data->getProducts(),true)["data"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ver más - Productos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar scroll</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <!-- Featured Section -->
  <div class="container mt-5">
    <div class="row">
      <div class="col-12">
        <h2 class="mb-4">Productos Destacados</h2>
      </div>

      <!-- FORMULARIO PARA AÑADIR PRODUCTO -->
      <div class="col-12 mb-4">
        <h3>Añadir Producto</h3>
        <form  action="asd.php" method="POST">
          <div class="mb-3">
            <label for="productName" class="form-label">Nombre del Producto</label>
            <input type="text" class="form-control" id="productName" name="productName" placeholder="Ingresa el nombre del producto" required>
          </div>
          <div class="mb-3">
            <label for="productDescription" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="productDescription" name="productDescription" placeholder="Descripción breve" required>
          </div>
          <div class="mb-3">
            <label for="productSlug" class="form-label">slug</label>
            <input type="text" class="form-control" id="productSlug" name="productSlug" placeholder="Precio del producto" required>
          </div>
          <div class="mb-3">
            <label for="productFeactures" class="form-label">Caracteristicas</label>
            <input type="text" class="form-control" id="productFeactures" name="productFeactures" placeholder="Precio del producto" required>
          </div>
          <button type="submit" class="btn btn-success">Añadir Producto</button>
          <input type="hidden" name="addProduct">
        </form>
      </div>

      <?php foreach($productos as $producto): ?>

      <!-- Card 1 (Producto 1) -->
      <div class="col-12 col-md-6 mb-4">
        <div class="card">
          <img src="<?= $producto["cover"]?>" class="card-img-top" alt="Producto 1">
          <div class="card-body">
            <h5 class="card-title"> <?= $producto["name"]?> </h5>
            <p class="card-text"> <?= $producto["description"]?> </p>
            
            <!-- Botones para Editar y Eliminar -->
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editProductModal1">Editar</button>
            <button class="btn btn-danger" onclick="deleteProduct(1)">Eliminar</button>
          </div>
        </div>
      </div>

      <?php endforeach;?>

      <!-- Modal para Editar Producto 1 -->
      <div class="modal fade" id="editProductModal1" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editProductModalLabel">Editar Producto 1</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="editProductForm1" action="#" method="POST">
                <div class="mb-3">
                  <label for="editProductName1" class="form-label">Nombre del Producto</label>
                  <input type="text" class="form-control" id="editProductName1" name="editProductName" value="Producto Destacado 1" required>
                </div>
                <div class="mb-3">
                  <label for="editProductDescription1" class="form-label">Descripción</label>
                  <input type="text" class="form-control" id="editProductDescription1" name="editProductDescription" value="Descripción breve del producto 1" required>
                </div>
                <div class="mb-3">
                  <label for="editProductPrice1" class="form-label">Precio</label>
                  <input type="number" class="form-control" id="editProductPrice1" name="editProductPrice" value="100.00" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
              </form>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function deleteProduct(productId) {
      if(confirm('¿Estás seguro de que deseas eliminar este producto?')) {
        alert('Producto ' + productId + ' eliminado.');
        // Aquí puedes agregar la lógica para eliminar el producto
      }
    }
  </script>
</body>
</html>