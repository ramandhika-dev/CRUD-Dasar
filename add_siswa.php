<html>

<head>
    <title>Add Users</title>
</head>

<body>
    <a href="siswa.php">Go to Home</a>
    <br><br>

    <form action="add_siswa.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>nis</td>
                <td><input type="text" name="nis" value="" maxlength="5"></td>
            </tr>

            <tr>
                <td>nama</td>
                <td><input type="text" name="nama" value="" maxlength="30"></td>
            </tr>

            <tr>
                <td>jenis_kelamin</td>
                <td><input type="radio" name="jenis_kelamin" value="L"> Laki-Laki<br>
                    <input type="radio" name="jenis_kelamin" value="P"> Perempuan
                </td>

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
                    <select name="jurusan" id="">
                        <?php
                        include("koneksi.php");
                        $result = mysqli_query($conn, "SELECT * FROM jurusan ");
                        while ($data = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?= $data['nama_jurusan'] ?>"><?= $data['nama_jurusan'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>alamat</td>
                <td><input type="text" name="alamat" value="" maxlength="30"></td>
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
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $kelas = $_POST['kelas'];
        $jurusan = $_POST['jurusan'];
        $alamat = $_POST['alamat'];

        //include database connection file
        include_once("koneksi.php");

        //insert user data into table
        $result = mysqli_query($conn, "insert into siswa(nis,nama,jenis_kelamin,kelas,jurusan,alamat) values('$nis','$nama','$jenis_kelamin','$kelas','$jurusan','$alamat')");

        //show message when user added
        echo "Users added successfully. <a href='siswa.php'>View Users</a>";
    }
    ?>
</body>

</html>