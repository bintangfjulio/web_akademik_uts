<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.8/typed.min.js"></script>
    <title>Data Mahasiswa</title>
</head>
<?php include('config/connect_database.php'); ?>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm sticky-top">
        <div class="container-fluid container-0">
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item" data-aos="fade-down">
                        <a class="nav-link" aria-current="page" href="index.html">Home</a>
                    </li>
                    <li class="nav-item" data-aos="fade-down" data-aos-delay="100">
                        <a class="nav-link active" href="data_mahasiswa.php">Mahasiswa</a>
                    </li>
                    <li class="nav-item" data-aos="fade-down" data-aos-delay="300">
                        <a class="nav-link" href="data_dosen.php">Dosen</a>
                    </li>
                    <li class="nav-item" data-aos="fade-down" data-aos-delay="400">
                        <a class="nav-link" href="data_kelas.php">Kelas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid container-1">
        <div class="menu-item menu-desc shadow" data-aos="fade-right" data-aos-duration="1000">
            <center>
                <h5 class="typing">Data Mahasiswa</h5>
            </center>
            <br>
            <form action="data_mahasiswa.php" method="post">
                <select name="sort" class="form-select" aria-label="Default select example">
                    <option selected disabled>-- sort by --</option>
                    <option value="No Sorting">No Sorting</option>
                    <option value="NIM">NIM</option>
                    <option value="Nama">Nama</option>
                </select>
                <br>
                <button type="submit" class="btn btn-outline-primary">sort</button>
            </form>
            <center><a href="form_mahasiswa.php"><button type="submit" class="btn btn-outline-primary">Tambah Mahasiswa</button></a></center>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    if (isset($_POST['sort']) && $_POST['sort'] != "No Sorting") {
                        $sort = $_POST['sort'];
                        $query = mysqli_query($connect, "SELECT * FROM MAHASISWA ORDER BY $sort ASC");
                    } else {
                        $query = mysqli_query($connect, "SELECT * FROM MAHASISWA");
                    }
                    ?>
                    <h6 class="sort-status"><?php if (isset($_POST['sort']) && $_POST['sort'] != "No Sorting") {
                                                print('sorted by ' . $sort);
                                            } ?></h6>
                    <?php
                    while ($mahasiswa = mysqli_fetch_array($query)) {
                        $no++;
                    ?>
                        <tr>
                            <td width="5%"><?php print $no; ?></td>
                            <td><?php print $mahasiswa['email']; ?></td>
                            <td><?php print $mahasiswa['Nama']; ?></td>
                            <td><?php print $mahasiswa['NIM']; ?></td>
                            <td><?php print $mahasiswa['alamat']; ?></td>
                            <td><?php print $mahasiswa['password']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>