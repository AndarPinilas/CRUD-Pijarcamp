<?php
require 'db.php';
$sql = 'SELECT * FROM produk';
$statement = $connection->prepare($sql);
$statement->execute();
$produk = $statement->fetchAll(PDO::FETCH_OBJ);
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
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card mt-5">
            <div class="card-header">
              <h2>Level 3 - Tugas 10 (Bonus)</h2>
            </div>
            <div class="card-body">
              <a style="margin-bottom: 20px;" href="create.php" class="btn btn-info">Tambah Produk</a>
              <table class="table table-striped table-bordered zero-configuration">
                <tr>
                  <th>ID</th>
                  <th>nama_produk</th>
                  <th>keterangan</th>
                  <th>harga</th>
                  <th>jumlah</th>
                  <th>Action</th>
                </tr>
                <?php foreach($produk as $person): ?>
                  <tr>
                    <td><?= $person->id; ?></td>
                    <td><?= $person->nama_produk; ?></td>
                    <td><?= $person->keterangan; ?></td>
                    <td><?= $person->harga; ?></td>
                    <td><?= $person->jumlah; ?></td>
                    <td>
                      <a href="edit.php?id=<?= $person->id ?>" class="btn btn-info">Edit</a>
                      <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $person->id ?>" class='btn btn-danger'>Delete</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
