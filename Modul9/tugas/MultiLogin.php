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
        $cek = mysql_num_rows($query);

        if ($cek > 0){
            $row = mysql_fetch_assoc($query);
            if ($row['status']=="administrator"){
                // berhasil login
                $_SESSION['username']=$row['username'];
                $_SESSION['status']='administrator';
                
                header("location: halaman_admin.php");

            }elseif($row['status']=="member"){
                // berhasil login
                $_SESSION['username']=$row['username'];
                $_SESSION['status']='member';
                
                header("location: halaman_member.php");
            }else{
                // gagal login
            echo "
            <script>
                alert('Gagal Login');
                document.location='MultiLogin.php';
            </script>
            ";
            }
        }

    }
?>
    <form action="MultiLogin.php" method="post">
    <p align='center'>
        Username : <input type="text" name="username"><br>
        Password : <input type="password" name="password"><br>
        <input type="submit" name="submit">
    </p>
    </form>