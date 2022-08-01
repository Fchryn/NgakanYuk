<?php  
  include 'db.php';
  $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
  $data_kontak = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NgakanYuk!!</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@200;400;600&family=Nunito:wght@700&display=swap" rel="stylesheet">
</head>
<body>

  <header>

    <div class="container">
      <h1><a href="index.php">NgakanYuk!!</a></h1>
      <ul>
        <li><a href="produk.php">Produk</a></li>
        <li><a href="keranjang.php">Keranjang (0)</a></li>
      </ul>
    </div>

  </header>

  <!--Search-->
  <div class="search">
    <div class="container">
      <form action="produk.php">
        <input type="text" name="search" placeholder="Cari Produk">
        <input type="submit" name="cari" value="Cari Produk">
      </form>
    </div>
  </div>
  <!--Category-->
  <div class="section">
    <div class="container">
      <h3>Kategori</h3>
      <div class="box">
        <?php 
          $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
          if(mysqli_num_rows($kategori) > 0) {
            while($kategori_produk = mysqli_fetch_array($kategori)) {
          ?>
          <a href="produk.php?kategori_id=<?php echo $kategori_produk['category_id'] ?>">
            <div class="column-7">
              <img src="img/Kategori_Icon.png" width="50px">
              <p><?php echo $kategori_produk['category_name'] ?></p>
            </div>
          </a>
        <?php } } else { ?>
              <p>Kategori tidak ada..</p>
        <?php } ?>
      </div>
    </div>
  </div>
  <!--new product-->
  <div class="section">
    <div class="container">
      <h3>Produk Baru nih..</h3>
      <div class="box">
        <?php 
          $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 5");
          if(mysqli_num_rows($produk) > 0) {
            while ($p = mysqli_fetch_array($produk)) {
        ?>
          <a href="detail-produk.php?id_produk=<?php echo $p['product_id'] ?>">
            <div class="column-4">
              <img src="gambar-product/<?php echo $p['product_image'] ?>">
              <p class="nama"><?php echo substr($p['product_name'], 0, 30) ?></p>
              <p class="harga">Rp. <?php echo number_format($p['product_price']) ?></p>
            </div>
          </a>
        <?php } } else { ?>
          <p>Produk tidak ada</p>
        <?php } ?>
      </div>
    </div>
  </div>

  <footer>
    <div>
      <div class="container">
        <h4>Alamat</h4>
        <p><?php echo $data_kontak->admin_address ?></p>

        <h4>Email</h4>
        <p><?php echo $data_kontak->admin_email ?></p>

        <h4>No. Handphone</h4>
        <p><?php echo $data_kontak->admin_telp ?></p>
      </div>
      <small>Copyright &copy; 2022-NgakanYuk!!.</small>
    </div>
  </footer>

</body>
</html>