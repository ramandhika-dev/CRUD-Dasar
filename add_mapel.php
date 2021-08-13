<html>

<head>
    <title>Add Mapel</title>
</head>

<body>
    <a href="siswa.php">Go to Home</a>
    <br><br>

    <form action="add_mapel.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>nama_mapel</td>
                <td><input type="text" name="nama_mapel" value=""></td>
            </tr>

            <tr>
                <td>kelas</td>
                <td><select name="kelas">
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select></td>
            </tr>

            <tr>
                <td>jurusan</td>
                <td>
                    <select name="id_jurusan" id="">
                        <?php
                        include("koneksi.php");
                        $result = mysqli_query($conn, "SELECT * FROM jurusan ");
                        while ($data = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?= $data['id_jurusan'] ?>"><?= $data['nama_jurusan'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Guru</td>
                <td><select name="id_guru" id="">
                        <?php
                        include("koneksi.php");
                        $result = mysqli_query($conn, "SELECT * FROM guru ");
                        while ($data = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?= $data['id_guru'] ?>"><?= $data['nama_guru'] ?></option>
                        <?php
                        }
                        ?>
                    </select></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php
    // check if form submitted, insert form data into users table
    if (isset($_POST['submit'])) {
        $nama_mapel = $_POST['nama_mapel'];
        $kelas = $_POST['kelas'];
        $jurusan = $_POST['id_jurusan'];
        $guru = $_POST['id_guru'];
        //include database connection file
        include_once("koneksi.php");

        //insert user data into table
        $result = mysqli_query($conn, "insert into mapel(nama_mapel,kelas,id_jurusan,id_guru) values('$nama_mapel','$kelas','$jurusan','$guru')");

        //show message when user added
        echo "Users added successfully. <a href='mapel.php'>View Users</a>";
    }
    ?>
</body>

</html>