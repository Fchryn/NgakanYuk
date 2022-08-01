<?php  
session_start();

include 'db.php';
$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id_produk']."' ");
$p = mysqli_fetch_object($produk);

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['add_to_cart'])) {
      if(isset($_SESSION['cart'])) {

      }
      else {
        $_SESSION['cart'][0]=array('item_name'=>$_POST['<?php echo $p->product_name ?>'], 'price'=>$_POST['Rp. <?php echo number_format($p->product_price) ?>'], 'quantity'=>1);
        print_r($_SESSION['cart']);
      }
    }
  }
?>