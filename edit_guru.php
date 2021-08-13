<?php
//include database connection file
include_once("koneksi.php");

//check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id_guru = $_POST['id_guru'];
    $nama_guru = $_POST['nama_guru'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];

    //update user data
    $result = mysqli_query($conn, "update siswa set nis='$nis',nama='$nama',jenis_kelamin='$jenis_kelamin',kelas='$kelas',jurusan='$jurusan',alamat='$alamat' where nis=$nis");

    //redirect to homepage to display updated user in list
    header("location: siswa.php");
}

//display selected user data based on id
//getting id from url
$id = $_GET['id'];
//fetech user data based on id
$result = mysqli_query($conn, "select * from guru where id_guru='$id'");
while ($data = mysqli_fetch_array($result)) {
    $id_guru = $data['id_guru'];
    $nama_guru = $data['nama_guru'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $tempat_lahir = $data['tempat_lahir'];
    $tgl_lahir = $data['tgl_lahir'];
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
                    <td>Id_Guru</td>
                    <td><input type="text" name="id_guru" value="<?= $id_guru; ?>" readonly></td>
                </tr>

                <tr>
                    <td>nama_Guru</td>
                    <td><input type="text" name="nama_guru" value="<?= $nama_guru; ?>"></td>
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
                    <td>tgl_lahir</td>
                    <td><input type="text" name="tgl_lahir" value="<?= $tgl_lahir; ?>"></td>
                </tr>

                <tr>
                    <td>tempat_lahir</td>
                    <td><input type="text" name="tempat_lahir" value="<?= $tempat_lahir; ?>"></td>
                </tr>

                <tr>
                    <td>alamat</td>
                    <td><input type="text" name="alamat" value="<?= $alamat; ?>"></td>
                </tr>



                <tr>
                    <td><input type="hidden" name="id" value="<?= $_GET['id'] ?>"></td>
                    <td><input type="submit" name="update" value="Update"></td>
                </tr>
            </table>
        </form>
    <?php
}
    ?>
    </body>

    </html>