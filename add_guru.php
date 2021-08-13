<html>

<head>
    <title>Add Users</title>
</head>

<body>
    <a href="guru.php">Go to Home</a>
    <br><br>

    <form action="add_guru.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>nama_guru</td>
                <td><input type="text" name="nama" value=""></td>
            </tr>

            <tr>
                <td>alamat</td>
                <td><input type="text" name="alamat" value=""></td>
            </tr>

            <tr>
                <td>jenis_kelamin</td>
                <td><input type="radio" name="jenis_kelamin" value="L"> Laki-Laki<br>
                    <input type="radio" name="jenis_kelamin" value="P"> Perempuan
                </td>

            </tr>

            <tr>
                <td>tempat_lahir</td>
                <td><input type="text" name="tempat_lahir"></td>
            </tr>


            <tr>
                <td>tgl_lahir</td>
                <td><input type="text" name="tgl_lahir"></td>
            </tr>

            <tr>
                <td>no_hp</td>
                <td><input type="text" name="no" value="" maxlength="30"></td>
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
        $nama_guru = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = date('Y-m-d', strtotime($_POST['tgl_lahir']));
        $no_hp = $_POST['no'];

        //include database connection file
        include_once("koneksi.php");

        //insert user data into table
        $result = mysqli_query($conn, "insert into guru(nama_guru,alamat,jenis_kelamin,tempat_lahir,tgl_lahir,no_hp) 
                            values('$nama_guru','$alamat','$jenis_kelamin','$tempat_lahir','$tgl_lahir','$no_hp')");

        //show message when user added
        echo "Users added successfully. <a href='guru.php'>View Users</a>";
    }
    ?>
</body>

</html>