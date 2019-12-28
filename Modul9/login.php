<?php
    session_start();
    error_reporting(E_ALL^E_NOTICE^E_DEPRECATED);
    mysql_connect('localhost', 'root', '');
    mysql_select_db('informatika');

    $username =$_POST['username'];
    $password =$_POST['password'];
    $submit =$_POST['submit'];

    if ($submit){
        $sql = "select * from user where username = '$username' and password = '$password' ";
        $query = mysql_query($sql);
        $row = mysql_fetch_array($query);
        if ($row['username']!=""){
            // berhasil login
            $_SESSION['username']=$row['username'];
            $_SESSION['status']=$row['status'];
        ?>
        <script>
            alert('Anda Login Sebagai <?php echo $row['username']; ?>');
            document.location = 'hasillogin.php';
        </script>
        <?php
        }else{
            // gagal login
        ?>
        <script>
            alert('Gagal Login');
            document.location='login.php';
        </script>
        <?php
        }

    }
    ?>
    <form action="login.php" method="post">
    <p align='center'>
        Username : <input type="text" name="username"><br>
        Password : <input type="password" name="password"><br>
        <input type="submit" name="submit">
    </p>
    </form>