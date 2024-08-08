<?php
include("koneksi.php");
$fakultas = mysqli_query($conn, "SELECT * FROM `tbl_fakultas` ORDER BY `id_fakultas`");
$prodi = mysqli_query($conn, "SELECT * FROM `tbl_prodi` ORDER BY `id_prodi`");
$konsentrasi = mysqli_query($conn, "SELECT * FROM `tbl_konsentrasi` ORDER BY `id_kosentrasi`");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>HALAMAN UTAMA</title>
        <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
    <header>
        <h1 class="judul">RAMADDAN BLOG</h1>
        <p class="deskripsi">Merancang Web Site</p>
</header>
<div class="wrap">
    <nav class="menu">
        <ul>
            <li><a href="../Latihan_Web_1/">Home</a></li>
            <li><a href="daftar.php">Daftar</a></li>
            <li><a href="#">Kontak</a></li>
</ul>
</nav>
<div class="blog">
    <div class="conteudo1">
        <h1>FORM REGISTRASI MAHASISWA</h1>
        <hr>
        <div class="container">
            <form action="tambah_mhs.php" method="post">
                <div class="row">
                    <div class="col-25">
                        <label for="fname">NIM</label>
</div>
<div class="col-75">
    <input type="text" idd="fname" name="nim" placeholder="silahkan isi NIM anda">
</div>
</div>
    <div class="row">
          <div class="col-25">
          <label for="fname">Nama Lengkap</label>
</div>
<div class="col-75">
    <input type="text" id="fname" name="nama" placeholder="silahkan isi Nama Lengkap anda">
</div>
</div>
        <div class="row">
            <div class="col-25">
                 <label for="subject">Alamat</label>
</div>
<div class="col-75">
          <textarea id="subject" name="alamat" placeholder="Write something.." style="height:100px"></textarea>
</div>
</div>
<div class="row">
                    <div class="col-25">
                        <label for="iname">Tempat Lahir</label>
</div>
<div class="row">
<div class="col-75">
    <input type="text" id="iname" name="tempat" placeholder="silahkan isi Tempat Lahir anda">
</div>
</div>
<div class="row">
<div class="col-25">
          <label for="iname">Tanggal Lahir</label>
</div>
<div class="col-75">
    <input type="date" id="iname" name="tgl">
</div>
</div>
<div class="row">
<div class="col-25">
          <label for="fname">Fakultas</label>
</div>
<div class="col-75">
    <select id="country"  name="fakultas">
</div>
<?php
while ($data_fakultas = mysqli_fetch_array($fakultas)){
    ?>
<option value="<?php echo $data_fakultas['kd_fakultas'] ?>"><?php echo $data_fakultas['nama_fakultas'] ?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="row">
<div class="col-25">
          <label for="fname">Program Studi</label>
</div>
<div class="col-75">
    <select id="country"  name="prodi">
        <?php
    while ($data_prodi = mysqli_fetch_array($prodi)){
    ?>
<option value="<?php echo $data_prodi['kd_prodi'] ?>"><?php echo $data_prodi['nama_prodi'] ?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="row">
<div class="col-25">
          <label for="fname">Kosentrasi</label>
</div>
<div class="col-75">
    <select id="country"  name="kosentrasi">
<?php
while ($data_fakultas = mysqli_fetch_array($kosentrasi)){
    ?>
<option value="<?php echo $data_kosentrasi['kd_kosentrasi'] ?>"><?php echo $data_kosentrasi['nama_kosentrasi'] ?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="row">
<div class="col-25">
          <label for="iname">Alamat Email</label>
</div>
<div class="col-75">
    <input type="text" id="iname"  name="email" placeholder="Enter Your Email">
</div>
</div>
<div class="row">
<div class="col-25">
          <label for="country">Jenis Kelamin</label>
</div>
<div class="col-75">
    <select id="country" name="gender">
        <option value="pria">Pria</option>
        <option value="wanita">Wanita</option>
</select>
</div>
</div>
<div class="row">
<div class="col-25">
          <label for="iname">No. Telepon</label>
</div>
<div class="col-75">
    <input type="text" id="iname"  name="telepon" placeholder="Enter Your Phone Number">
</div>
</div>
<hr>
<div class="row">
<div class="col-25">
          <label for="iname">username </label>
</div>
<div class="col-75">
    <input type="text" id="iname"  name="username" placeholder="Enter Your username">
</div>
</div>
<div class="row">
<div class="col-25">
          <label for="iname">Password</label>
</div>
<div class="col-75">
    <input type="text" id="iname"  name="password" placeholder="Enter Your Passwprd">
</div>
</div>
<hr>
<div class="row">
    <input type="submit" value="submit" name="submit">
</div>
</form>
</div>
</div>
</div>
<footer>
    <p class="deskripsi">Copyright By Ramaddan</p>
</footer>
</div>
</body>
</html>
