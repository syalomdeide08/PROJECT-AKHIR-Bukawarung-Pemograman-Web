<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }
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
   <nav>
       <div class="container">
   <h1><a href="dashboard.php">Bukawarung</a></h1>
   <ul>
    <li><a href="dashboard.php">Dashboard</a></li>
    <li><a href="Profil.php">Profil</a></li>
    <li><a href="data-kategori.php">Data Kategori</a></li>
    <li><a href="data-produk.php">Data Produk</a></li>
    <li><a href="keluar.php">Keluar</a></li>
   </ul>
   </div>
</nav>
</header>

<!-- content -->
<div class="section">
    <div class="container">
        <h3>Data Kategori</h3>
        <div class="box">
        <button type="button" class="btn-primary">
            <p><a href="tambah-kategori.php">Tambah Data</a></p>
        </button>
        <table border = "1" cellspacing="0" 
        class="table">
            <thead>
                <tr>
                    <th width="60px">No</th>
                    <th>Kategori</th>
                    <th width="150px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                 $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                 if(mysqli_num_rows($kategori) > 0){
                 while($row = mysqli_fetch_array($kategori)){
                ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['category_name'] ?></td>
                        <td>
                        <button type="button" class="btn-primary">
                        <a href="edit-kategori.php?id=<?php echo $row['category_id'] ?>">Edit</a> </button>
                        || <button type="button" class="btn-primary"> <a href="proses-hapus.php?idk=<?php echo $row['category_id'] ?>" onclick="return confirm('Yakin ingin hapus ?')">Hapus</a> </button>
                        </td> 
                    </tr>
                    <?php }}else{ ?>
                    <tr>
                        <td colspan="3"> Tidak ada data</td>
                    </tr>
                        <?php } ?>
                </tbody>
        </table>
        </div>
    </div>
</div>
<!-- footer -->
<footer>
    <div class="container">
        <small>Copyright &copy; 2021 - Bukawarung.</small>
</body>
</html>