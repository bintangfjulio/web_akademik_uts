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
    <title>Data Kelas</title>
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
                <h5 class="typing">Data Kelas</h5>
            </center>
            <br>
            <form action="data_kelas.php" method="post">
                <select name="id" class="form-select" aria-label="Default select example">
                    <option selected disabled>-- pilih kelas --</option>
                    <option value="Show All">Show All</option>
                    <?php $query = mysqli_query($connect, "SELECT * FROM KELAS");
                    while ($kelas = mysqli_fetch_array($query)) { ?>
                        <option value="<?php print $kelas['id']; ?>"><?php print $kelas['nama']; ?></option>
                    <?php } ?>
                </select>
                <br>
                <button type="submit" class="btn btn-outline-primary">filter</button>
            </form>
            <center><a href="form_matakuliah.php"><button type="submit" class="btn btn-outline-primary">Tambah Mata Kuliah</button></a>
                <a href="form_kelas.php"><button type="submit" class="btn btn-outline-primary">Tambah Kelas</button></a>
            </center>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Mahasiswa</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Mata Kuliah</th>
                        <th scope="col">Tahun Akademik</th>
                        <th scope="col">Semester</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    if (isset($_POST['id']) && $_POST['id'] != "Show All") {
                        $id = $_POST['id'];
                        $query = mysqli_query($connect, "SELECT * FROM KELAS_PARTICIPATED AS kp JOIN KELAS AS k ON k.id = kp.id_kelas JOIN MATAKULIAH AS mk ON mk.id = k.id_matakuliah JOIN MAHASISWA AS mhs ON mhs.id = kp.id_mahasiswa WHERE k.id=$id ORDER BY mhs.NIM ASC");
                    } else {
                        $query = mysqli_query($connect, "SELECT * FROM KELAS_PARTICIPATED AS kp JOIN KELAS AS k ON k.id = kp.id_kelas JOIN MATAKULIAH AS mk ON mk.id = k.id_matakuliah JOIN MAHASISWA AS mhs ON mhs.id = kp.id_mahasiswa ORDER BY mhs.NIM ASC");
                    }
                    ?>
                    <br>
                    <?php
                    while ($kelas_participated = mysqli_fetch_array($query)) {
                        $no++;
                    ?>
                        <h6><?php if (isset($_POST['id']) && $_POST['id'] != "Show All") {
                                if ($no == 1) {
                                    print('showing ' . $kelas_participated['nama']);
                                }
                            } ?></h6>
                        <tr>
                            <td width="5%"><?php print $no; ?></td>
                            <td><?php print $kelas_participated['NIM']; ?></td>
                            <td><?php print $kelas_participated['Nama']; ?></td>
                            <td><?php print $kelas_participated['nama']; ?></td>
                            <td><?php print $kelas_participated['nama_matakuliah']; ?></td>
                            <td><?php print $kelas_participated['tahun_akademik']; ?></td>
                            <td><?php print $kelas_participated['semester']; ?></td>
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
