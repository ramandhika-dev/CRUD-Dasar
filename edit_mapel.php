<?php
//include database connection file
include_once("koneksi.php");

//check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id_mapel = $_POST['id_mapel'];
    $nama_mapel = $_POST['nama_mapel'];
    $kelas = $_POST['kelas'];
    $id_jurusan = $_POST['id_jurusan'];
    $id_guru = $_POST['id_guru'];

    //update user data
    $result = mysqli_query($conn, "update mapel set id_mapel='$id_mapel',nama_mapel='$nama_mapel',kelas='$kelas',id_jurusan='$id_jurusan',id_guru='$id_guru' where id_mapel=$id_mapel");

    //redirect to homepage to display updated user in list
    header("location: mapel.php");
}

//display selected user data based on id
//getting id from url
$id = $_GET['id'];
//fetech user data based on id
$result = mysqli_query($conn, "select * from mapel,jurusan where id_mapel='$id'");

while ($data = mysqli_fetch_array($result)) {
    $id_mapel = $data['id_mapel'];
    $nama_mapel = $data['nama_mapel'];
    $kelas = $data['kelas'];
    $id_jurusan_mapel = $data['id_jurusan'];
    $globals['id_jurusan_mapel'] = $id_jurusan_mapel;
    $id_guru = $data['id_guru'];
?>
    <html>

    <head>
        <title></title>
    </head>

    <body>
        <a href="mapel.php">Go to Home</a>
        <br><br>

        <form action="edit_mapel.php" method="post" name="form1">
            <table width="25%" border="0">
                <tr>
                    <td>Id_Mapel</td>
                    <td><input type="text" name="id_guru" value="<?= $id_mapel; ?>" readonly></td>
                </tr>

                <tr>
                    <td>Nama_Mapel</td>
                    <td><input type="text" name="nama_guru" value="<?= $nama_mapel; ?>"></td>
                </tr>

                <tr>
                    <td>kelas</td>
                    <td><select name="kelas">
                            <option value="X" <?php if ($kelas == 'x' || $kelas == 'X') {
                                                    echo 'selected="selected"';
                                                } ?>>X</option>
                            <option value="XI" <?php if ($kelas == 'xi' || $kelas == 'XI') {
                                                    echo 'selected="selected"';
                                                } ?>>XI</option>
                            <option value="XII" <?php if ($kelas == 'xii' || $kelas == 'XII') {
                                                    echo 'selected="selected"';
                                                } ?>>XII </option>
                        </select></td>
                </tr>

                <tr>
                    <td>Nama Jurusan</td>
                    <td><select name="jurusan" id="">
                            <?php
                            include("koneksi.php");
                            $result = mysqli_query($conn, "SELECT * FROM jurusan ");
                            while ($data = mysqli_fetch_array($result)) {
                            ?>
                                <option <?php if ($data['id_jurusan'] == $globals['id_jurusan_mapel'] || $data['id_jurusan'] == $globals['id_jurusan_mapel']) {
                                            echo 'selected="selected"';
                                        } ?> value="<?= $data['nama_jurusan'] ?>"><?= $data['nama_jurusan'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
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