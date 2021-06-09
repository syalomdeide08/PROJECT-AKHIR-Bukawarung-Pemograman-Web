<?php 
    error_reporting(0);
    include 'db.php';
    session_start();
    if($_SESSION['status_login2'] != true){
        echo '<script>window.location="login_customer.php"</script>';
    }
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin
            WHERE admin_id = 1");
            $a = mysqli_fetch_object($kontak);

        $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."'");
        $p = mysqli_fetch_object($produk);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukawarung</title>
    <link rel="stylesheet"  href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet"> 
</head>
<body>
   <header>
       <div class="container">
   <h1><a href="index.php">Bukawarung</a></h1>
   <ul>
    <li><a href="produk.php">Produk</a></li>
    <li><a href="login.php">Login admin</a></li>
    <li><a href="login_customer.php">Login</a></li>
    <li><a href="logout.php">Logout</a></li>

   </ul>
   </div>
</header>

<!-- search -->
<div class="search">
    <div class="container">
            <form action="produk.php">
            <input type="text" name="search" placeholder="Cari Produk">
            <input type="submit" name="cari" value="Cari Produk">
            </form>
        
        </div>
    </div>
    
    <!-- category -->
    <div class="section">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
                <?php 
                $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");

                if(mysqli_num_rows($kategori) > 0){
                    while($k = mysqli_fetch_array($kategori)){
                ?>
                        <a href="produk.php?kat=<?php echo $k['category_id'] ?>">
                        <div class="col-5">
                            <img src="img/icon-kategori.jpg" width="50px" style="margin-bottom:5px;">
                            <p><?php echo $k['category_name'] ?></p>
                        </div>
                    </a>
                <?php }}else{ ?>

                    <p>Kategori tidak ada</P>
                <?php } ?>


            </div>
        </div>
    </div>

    <!-- new product -->
    <div class="section">
        <div class="container">
            <h3>Produk Terbaru</h3>
            <div class="box">
                <?php 
                $produk = mysqli_query($conn, "SELECT * FROM  tb_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 8");

                if(mysqli_num_rows($produk) > 0){
                    while($p = mysqli_fetch_array($produk)){
                ?>
                        <a href="detail-produk.php?id=<?php echo $p['product_id'] ?>"> 
                        <div class="col-4">
                            <img src="produk/<?php echo $p['product_image'] ?>">
                            <p class="nama"><?php echo substr($p['product_name'], 0, 30) ?></p>
                            <p class="harga">Rp. <?php echo number_format($p['product_price']) ?></P>
                        </div>
                    </a>
                    <?php }}else{ ?>
                        <p>Produk tidak ada</p>
                    <?php } ?>
            </div>
        </div>
    </div>

    <!-- footer -->
    <div class="footer">
        <div class="container">
            <h4><a href="http://unsrat.ac.id/">UNSRAT</a></h4>
            <br>
            <h4>Alamat</h4>
            <p><?php echo $a->admin_address ?></p>

            <h4>Email</h4>
            <p><?php echo $a->admin_email ?></p>

            <h4>No Hp</h4>
            <p><?php echo $a->admin_telp ?></p>
            <small>Copyright &copy; 2021 - Bukawarung.</small>
        </div>
    </div>
</body>
</html>