<?php
//include database connection file
include_once("koneksi.php");

//check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    //update user data
    $result = mysqli_query($conn, "update siswa set nis='$nis',nama='$nama',jenis_kelamin='$jenis_kelamin',kelas='$kelas',jurusan='$jurusan',alamat='$alamat' where nis=$nis");

    //redirect to homepage to display updated user in list
    header("location: siswa.php");
}

//display selected user data based on id
//getting id from url
$nis = $_GET['nis'];
//fetech user data based on id
$result = mysqli_query($conn, "select * from siswa where nis='$nis'");
while ($data = mysqli_fetch_array($result)) {
    $nis = $data['nis'];
    $nama = $data['nama'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $kelas = $data['kelas'];
    $jurusan = $data['jurusan'];
    $alamat = $data['alamat'];
?>
    <html>

    <head>
        <title></title>
    </head>

    <body>
        <a href="siswa.php">Go to Home</a>
        <br><br>

        <form action="edit_siswa.php" method="post" name="form1">
            <table width="25%" border="0">
                <tr>
                    <td>nis</td>
                    <td><input type="text" name="nis" value="<?= $nis; ?>" readonly></td>
                </tr>

                <tr>
                    <td>nama</td>
                    <td><input type="text" name="nama" value="<?= $nama; ?>"></td>
                </tr>

                <tr>
                    <td>jenis_kelamin</td>
                    <td><input type="radio" name="jenis_kelamin" value="L" <?php if ($jenis_kelamin == 'L' || $jenis_kelamin == 'L') {
                                                                                echo 'checked="checked"';
                                                                            } ?>> Laki-Laki<br>
                        <input type="radio" name="jenis_kelamin" value="P" <?php if ($jenis_kelamin == 'P' || $jenis_kelamin == 'P') {
                                                                                echo 'checked="checked"';
                                                                            } ?>> Perempuan
                    </td>

                </tr>

                <tr>
                    <td>kelas</td>
                    <td><input type="text" name="kelas" value="<?= $kelas; ?>"></td>
                </tr>

                <tr>
                    <td>jurusan</td>
                    <td><input type="text" name="jurusan" value="<?= $jurusan; ?>"></td>
                </tr>

                <tr>
                    <td>alamat</td>
                    <td><input type="text" name="alamat" value="<?= $alamat; ?>"></td>
                </tr>



                <tr>
                    <td><input type="hidden" name="id" value="<?= $_GET['nis'] ?>"></td>
                    <td><input type="submit" name="update" value="Update"></td>
                </tr>
            </table>
        </form>
    <?php
}
    ?>
    </body>

    </html>