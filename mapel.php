<?php
include("koneksi.php");
$result = mysqli_query($conn, "SELECT * FROM mapel,jurusan,guru 
                                    where mapel.id_guru=guru.id_guru 
                                        AND mapel.id_jurusan=jurusan.id_jurusan 
                                            ORDER BY kelas");
?>

<html>

<head>
    <title>Home Page</title>
</head>

<body>

    <?php include("navbar.html"); ?>
    <br>
    <a class="btn btn-success" href="add_mapel.php" role="button">Add mapel </a>
    <br>
    <br>
    <table width="80%" border="1">
        <tr>
            <th>No</th>
            <th>Nama Mapel</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Guru</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 0;
        while ($data = mysqli_fetch_array($result)) {
            $no++
        ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $data['nama_mapel'] ?></td>
                <td><?php echo $data['kelas'] ?></td>
                <td><?php echo $data['nama_jurusan'] ?></td>
                <td><?php echo $data['nama_guru'] ?></td>
                <td>
                    <a class="btn btn-warning" role="button" href="edit_mapel.php?id=<?= $data['id_mapel'] ?>">Edit</a>
                    <a class="btn btn-danger" role="button" href="hapus_mapel.php?id=<?= $data['id_mapel'] ?>" ; onclick='return confirm("Apakah Yakin Ingin Menghapus?")'>Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>