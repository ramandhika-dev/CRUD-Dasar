<?php
include("koneksi.php");
$result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
?>

<html>

<head>
    <title>Home Page</title>
</head>

<body>
    <?php include("navbar.html"); ?>
    <br>
    <a class="btn btn-success" href="add_user.php" role="button">Add User</a>
    <br>
    <br>

    <table width="80%" border="1">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Password</th>
            <th>Jenis</th>
            <th>Update</th>
        </tr>
        <?php
        $no = 0;
        while ($data = mysqli_fetch_array($result)) {
            $no++
        ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $data['username'] ?></td>
                <td><?php echo $data['password'] ?></td>
                <td><?php echo $data['jenis'] ?></td>
                <td>
                    <a class="btn btn-warning" role="button" href="edit_user.php?id=<?= $data['id'] ?>">Edit</a>
                    <a class="btn btn-danger" role="button" href="hapus_user.php?id=<?= $data['id'] ?>" ; onclick='return confirm("Apakah Yakin Ingin Menghapus?")'>Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>