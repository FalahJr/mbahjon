<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!-- Awesome CSS -->
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.min.css">

    <!-- CSS Home -->
    <link rel="stylesheet" href="resource/css/home.css">


    <title>Mbah John</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #3c623d;">
        <div class="container">
            <a class="navbar-brand" href="#">MBAH JOHN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="index.php#">Home</a>
                    <a class="nav-link" href="index.php#menu">Menu</a>
                    <a class="nav-link" href="index.php #about">About Us</a>
                    <?php
                        // $_SESSION['status'] = "";

                        session_start();

                        if($_SESSION['status']!="sudah_login"){
                        echo " <a class='nav-link' href='Login.php'>Login</a>";
                        } 
                        else{
                        //     echo " <a class='nav-link' href=''>".$_SESSION['email']."</a>";
                        // }
                    ?>
                    <div class="dropdown">
                        <button class="btn nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['email']; ?>

                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="cart.php?id_user=<?php echo $_SESSION['id_login']; ?>"><i class="fas fa-shopping-cart"></i> Cart</a></li>
                            <!-- <li><a class="dropdown-item" href="#">Another action</a></li> -->
                            <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
                        </ul>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->
    <section class="pt-5">

        <div class="container px-4 px-lg-5" >
            <h1 class="h2">Your Cart</h1>
                <!-- <a href="addproduct.php" class="btn btn-sm btn-success mr-4"><i class="fas fa-plus"></i> Tambah Menu</a> -->
                <br>
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Menu</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Qty</th>
                        <th scope="col" colspan="">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    include('config.php');
                    $id_user = $_GET['id_user'];
                    // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                    $query = "SELECT * FROM keranjang INNER JOIN MENU ON menu.id_menu = keranjang.id_menu WHERE id_user='1'";
                    // dd('query');
                    $result = mysqli_query($koneksi, $query);
                    //mengecek apakah ada error ketika menjalankan query
                    if(!$result){
                        die ("Query Error: ".mysqli_errno($koneksi).
                        " - ".mysqli_error($koneksi));
                    }

                    //buat perulangan untuk element tabel dari data mahasiswa
                    $no = 1; //variabel untuk membuat nomor urut
                    // hasil query akan disimpan dalam variabel $data dalam bentuk array
                    // kemudian dicetak dengan perulangan while
                    while($row = mysqli_fetch_assoc($result))
                    {
                    ?>
                        <tr>
                        <th scope="row"><?php echo $no; ?></th>
                        <td><?php echo $row['deskripsi_menu']?></td>
                        <td class="w-25">
                        <img class="img-responsive w-50" src="Image/<?php echo $row['gambar_menu']?>" alt="">  
                        </td>
                        <td><?php echo $row['harga']?></td>
                        <td><?php echo $row['qty']?></td>
                        <td>
                       
                        <a href="deletecart.php?id=<?php echo $row['id_keranjang'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</a>
                        </td>
                        <!-- <td></td> -->
                        </tr>
                        <!-- <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                        </tr> -->
                        <?php
                            $no++; //untuk nomor urut terus bertambah 1
                        }
                        ?>
                    </tbody>
                </table>
                    </div>
                    </section>
    <!-- Footer -->
    <footer class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: #3c623d;">
            © 2020 Copyright:
            <a class="text-dark">Kelompok 5</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Akhir Footer -->


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>