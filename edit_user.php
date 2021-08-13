<?php
//include database connection file
include_once("koneksi.php");

//check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $jenis = $_POST['jenis'];

    //update user data
    $result = mysqli_query($conn, "update users set username='$username',password='$password',jenis='$jenis' where id=$id");

    //redirect to homepage to display updated user in list
    header("location: user.php");
}

//display selected user data based on id
//getting id from url
$id = $_GET['id'];
//fetech user data based on id
$result = mysqli_query($conn, "select * from users where id='$id'");
while ($data = mysqli_fetch_array($result)) {
    $username = $data['username'];
    $password = $data['password'];
    $jenis = $data['jenis'];
?>
    <html>

    <head>
        <title></title>
    </head>

    <body>
        <a href="user.php">Go to Home</a>
        <br><br>

        <form action="edit_user.php" method="post" name="form1">
            <table width="25%" border="0">
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value="<?= $username; ?>"></td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" value="<?= $password; ?>"></td>
                </tr>

                <tr>
                    <td>Jenis</td>
                    <td>
                        <select name="jenis">
                            <option value="A" <?php if ($jenis == 'A' || $jenis == 'a') {
                                                    echo 'selected="selected"';
                                                } ?>>Admin</option>
                            <option value="K" <?php if ($jenis == 'K' || $jenis == 'k') {
                                                    echo 'selected="selected"';
                                                } ?>>Karyawan</option>
                            <option value="U" <?php if ($jenis == 'U' || $jenis == 'u') {
                                                    echo 'selected="selected"';
                                                } ?>>User</option>
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