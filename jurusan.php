<?php
include("koneksi.php");
$result = mysqli_query($conn, "SELECT * FROM jurusan ORDER BY id_jurusan");
?>

<html>

<head>
    <title>Home Page</title>
</head>

<body>

    <?php include("navbar.html"); ?>
    <br>
    <br>
    <table width="80%" border="1">
        <tr>
            <th>Id_Jurusan</th>
            <th>Jurusan</th>

        </tr>
        <?php

        while ($data = mysqli_fetch_array($result)) {

        ?>
            <tr>
                <td><?php echo $data['id_jurusan'] ?></td>
                <td><?php echo $data['nama_jurusan'] ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>