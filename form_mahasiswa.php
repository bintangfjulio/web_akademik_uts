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
  <title>Form Mahasiswa</title>
</head>

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
        <h5 class="typing">Formulir Data Mahasiswa</h5>
      </center>

      <form action="config/insert_mahasiswa.php" method="post">
        <br>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" placeholder="Masukkan Email" class="form-control" required />
        </div>
        <br>
        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="Nama" placeholder="Masukkan Nama" class="form-control" required />
        </div>
        <br>
        <div class="form-group">
          <label>NIM</label>
          <input type="number" name="NIM" class="form-control" placeholder="Masukkan NIM" required />
        </div>
        <br>
        <div class="form-group">
          <label>Alamat</label>
          <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat" rows="2" required></textarea>
        </div>
        <br>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control" placeholder="Buat Password" required />
        </div>
        <br>
        <div class="form-group">
          <input type="checkbox" required />
          <label for="konfirmasi">Anda sudah memasukkan seluruh data dengan tepat dan benar</label>
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