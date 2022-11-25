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
    <title>Form Kelas</title>
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
                        <a class="nav-link" href="data_mahasiswa.php">Mahasiswa</a>
                    </li>
                    <li class="nav-item" data-aos="fade-down" data-aos-delay="300">
                        <a class="nav-link" href="data_dosen.php">Dosen</a>
                    </li>
                    <li class="nav-item" data-aos="fade-down" data-aos-delay="400">
                        <a class="nav-link active" href="data_kelas.php">Kelas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid container-1">
        <div class="menu-item menu-desc shadow" data-aos="fade-right" data-aos-duration="1000">
            <center>
                <h5 class="typing">Formulir Kelas</h5>
            </center>

            <form action="config/insert_kelas.php" method="post">
                <br>
                <div class="form-group">
                    <label>Nama Kelas</label>
                    <input type="text" name="nama" placeholder="Masukkan Nama Kelas" class="form-control" required />
                </div>
                <br>
                <label>Mata Kuliah</label>
                <select name='id_matakuliah' class="form-select" aria-label="Default select example">
                    <option selected disabled>-- pilih mata kuliah --</option>
                    <?php $query = mysqli_query($connect, "SELECT * FROM MATAKULIAH");
                    while ($matakuliah = mysqli_fetch_array($query)) { ?>
                        <option value="<?php print $matakuliah['id']; ?>"><?php print $matakuliah['nama_matakuliah']; ?></option>
                    <?php } ?>
                </select>
                <br>
                <div class="form-group">
                    <label>Tahun Akademik</label>
                    <input type="number" name="tahun_akademik" placeholder="Masukkan Tahun Akademik" class="form-control" required />
                </div>
                <br>
                <label>Semester</label>
                <select name="semester" class="form-select" aria-label="Default select example">
                    <option selected disabled>-- pilih semester --</option>
                    <?php for ($i = 1; $i <= 8; $i++) { ?>
                        <option value="<?php print $i ?>"><?php print $i ?></option>
                    <?php } ?>
                </select>
                <br>
                <label>Tambahkan mahasiswa</label>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Pilih</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($connect, "SELECT * FROM MAHASISWA");
                        while ($mahasiswa = mysqli_fetch_array($query)) { ?>
                            <tr>
                                <td><input type="checkbox" name="partisipan[]" value="<?php print $mahasiswa['id']; ?>"></td>
                                <td><?php print $mahasiswa['email']; ?></td>
                                <td><?php print $mahasiswa['Nama']; ?></td>
                                <td><?php print $mahasiswa['NIM']; ?></td>
                                <td><?php print $mahasiswa['alamat']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <br>
                <div class="form-group">
                    <center>
                        <input type="checkbox" required />
                        <label for="konfirmasi">Anda sudah memasukkan seluruh data dengan tepat dan benar</label>
                    </center>
                </div>
                <br>
                <center><button type="submit" class="btn btn-outline-primary">Submit</button></center>
            </form>
        </div>
    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>