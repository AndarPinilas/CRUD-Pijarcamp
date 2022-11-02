<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM produk WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['nama_produk'])  && isset($_POST['keterangan']) && isset($_POST['harga']) && isset($_POST['jumlah']) ) {
  $nama_produk = $_POST['nama_produk'];
  $keterangan = $_POST['keterangan'];
  $harga = $_POST['harga'];
  $jumlah = $_POST['jumlah'];
  $sql = 'UPDATE produk SET nama_produk=:nama_produk, keterangan=:keterangan, harga=:harga, jumlah=:jumlah WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':nama_produk' => $nama_produk, ':keterangan' => $keterangan, ':harga' => $harga, ':jumlah' => $jumlah, ':id' => $id])) {
    header("Location: ./index.php");
  }
}
 ?>

<!doctype html>
<html lang="en">
  <head>
    <title>Andar Pinilas</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="bg-info">
    <div class="container">
      <div class="card mt-5">
        <div class="card-header">
          <h2>Edit Produk</h2>
        </div>
        <div class="card-body">
          <?php if(!empty($message)): ?>
            <div class="alert alert-success">
              <?= $message; ?>
            </div>
          <?php endif; ?>
          <form method="post">
            <div class="form-group">
              <label for="nama_produk">nama_produk</label>
              <input value="<?= $person->nama_produk; ?>" type="text" name="nama_produk" id="nama_produk" class="form-control">
            </div>
            <div class="form-group">
              <label for="keterangan">keterangan</label>
              <input type="text" value="<?= $person->keterangan; ?>" name="keterangan" id="keterangan" class="form-control">
            </div>
            <div class="form-group">
              <label for="harga">harga</label>
              <input type="text" value="<?= $person->harga; ?>" name="harga" id="harga" class="form-control">
            </div>
            <div class="form-group">
              <label for="jumlah">jumlah</label>
              <input type="number" value="<?= $person->jumlah; ?>" name="jumlah" id="jumlah" class="form-control">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-info">Edit Produk</button>
              <a href="index.php" class="btn btn-danger">Close</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
