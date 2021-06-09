<?php
    session_start();
    include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Bukawarung</title>
    <link rel="stylesheet"  href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet"> 
</head>
<body>
<header>
       <div class="container">
   <h1><a>Bukawarung</a></h1>
   <ul>
    <li><a href="login.php">login admin</a></li>
    <li><a href="login_customer.php">login</a></li>
   </ul>
   </div>
</header>
<!-- content -->
<div class="section">
    <div class="container">
        <h3>Register</h3>
        <div class="box">
        <form action="" method="POST">
           </select>
           <input type="text" name="nama" class="input-control" placeholder="Nama Lengkap" required>
           <input type="text" name="user" class="input-control" placeholder="Username" required>
           <input type="text" name="pass" class="input-control" placeholder="password" required>
           <input type="text" name="hp" class="input-control" placeholder="No Hp"  class="input-control" required>
           <input type="email" name="email" class="input-control" placeholder="email"  class="input-control" required>
           <input type="text" name="alamat" class="input-control" placeholder="Alamat"  class="input-control" required>
            <br>
           <input type="submit" name="submit" value="submit" class="btn">
           </form>
        <?php 
        if(isset($_POST['submit'])){
            
            // print_r($_FILES['gambar']);
             // menampung inputan dari form
             $nama  = $_POST['nama'];
             $user  = $_POST['user'];
             $pass  = $_POST['pass'];
             $hp    = $_POST['hp'];
             $email = $_POST['email'];
             $alamat    = $_POST['alamat'];


                $insert = mysqli_query($conn, "INSERT INTO tb_customer VALUES(
                    null,
                    '".$nama."', 
                    '".$user."', 
                    '".$pass."', 
                    '".$hp."', 
                    '".$email."', 
                    '".$alamat."', 
                    null
                         )");
                
                if($insert){
                    echo '<script>alert("Tambah data berhasil")</script>';
                    echo '<script>window.location="index.php"</script>';
                }else{
                    echo 'gagal' .mysqli_error($conn);
                }

             

            
                
            }
        ?>

        </div>
    </div>
</div>
<!-- footer -->
<footer>
    <div class="container">
        <small>Copyright &copy; 2020 - Bukawarung.</small>
</body>
</html>