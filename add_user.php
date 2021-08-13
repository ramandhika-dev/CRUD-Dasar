<html>

<head>
    <title>Add Users</title>
</head>

<body>
    <a href="user.php">Go to Home</a>
    <br><br>

    <form action="add_user.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>

            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>

            <tr>
                <td>Jenis</td>
                <td>
                    <select name="jenis">
                        <option value="A">Admin</option>
                        <option value="K">Karyawan</option>
                        <option value="U">User</option>
                    </select>
                </td>
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
        $username = $_POST['username'];
        $password = $_POST['password'];
        $jenis = $_POST['jenis'];

        //include database connection file
        include_once("koneksi.php");

        //insert user data into table
        $result = mysqli_query($conn, "insert into users(username,password,jenis) values('$username','$password','$jenis')");

        //show message when user added
        echo "Users added successfully. <a href='user.php'>View Users</a>";
    }
    ?>
</body>

</html>