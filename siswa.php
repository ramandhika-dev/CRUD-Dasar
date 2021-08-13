<?php
include("koneksi.php");
$result = mysqli_query($conn, "SELECT * FROM siswa ORDER BY nis DESC");
?>

<html>

<head>
    <title>Home Page</title>
</head>

<body>

    <?php include("navbar.html"); ?>
    <br>
    <a class="btn btn-success" href="add_siswa.php" role="button">Add Siswa</a>
    <br>
    <br>
    <table width="80%" border="1">
        <tr>
            <th>No</th>
            <th>nis</th>
            <th>nama</th>
            <th>jenis_kelamin</th>
            <th>kelas</th>
            <th>jurusan</th>
            <th>alamat</th>
            <th>aksi</th>
        </tr>
        <?php
        $no = 0;
        while ($data = mysqli_fetch_array($result)) {
            $no++
        ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $data['nis'] ?></td>
                <td><?php echo $data['nama'] ?></td>
                <td><?php echo $data['jenis_kelamin'] ?></td>
                <td><?php echo $data['kelas'] ?></td>
                <td><?php echo $data['jurusan'] ?></td>
                <td><?php echo $data['alamat'] ?></td>
                <td>
                    <a class="btn btn-warning" role="button" href="edit_siswa.php?nis=<?= $data['nis'] ?>">Edit</a>
                    <a class="btn btn-danger" role="button" href="hapus_siswa.php?nis=<?= $data['nis'] ?>" ; onclick='return confirm("Apakah Yakin Ingin Menghapus?")'>Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>