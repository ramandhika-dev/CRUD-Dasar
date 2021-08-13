<?php
include("koneksi.php");
$result = mysqli_query($conn, "SELECT * FROM guru");
?>

<html>

<head>
    <title>Home Page</title>
</head>

<body>

    <?php include("navbar.html"); ?>
    <br>
    <a class="btn btn-success" href="add_guru.php" role="button">Add Guru</a>
    <br>
    <br>
    <table width="80%" border="1">
        <tr>
            <th>No</th>
            <th>nama_guru</th>
            <th>alamat</th>
            <th>jenis_kelamin</th>
            <th>tempat_lahir</th>
            <th>tgl_lahir</th>
            <th>no_hp</th>
            <th>aksi</th>
        </tr>
        <?php
        $no = 0;
        while ($data = mysqli_fetch_array($result)) {
            $no++
        ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $data['nama_guru'] ?></td>
                <td><?php echo $data['alamat'] ?></td>
                <td><?php echo $data['jenis_kelamin'] ?></td>
                <td><?php echo $data['tempat_lahir'] ?></td>
                <td><?php echo $data['tgl_lahir'] ?></td>
                <td><?php echo $data['no_hp'] ?></td>
                <td>
                    <a class="btn btn-warning" role="button" href="edit_guru.php?id=<?= $data['id_guru'] ?>">Edit</a>
                    <a class="btn btn-danger" role="button" href="hapus_siswa.php?id=<?= $data['id_guru'] ?>" ; onclick='return confirm("Apakah Yakin Ingin Menghapus?")'>Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>