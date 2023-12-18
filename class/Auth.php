<?php 

    include 'Database.php';

    Class Auth extends Database{

        function __construct(){
            parent::__construct();
        }

        function login($username, $password)
        {
            $sql = "SELECT * FROM user WHERE username = ?";
            $stmt = $this->koneksi->prepare($sql);
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $result = $stmt->get_result();

       
    
            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    session_start();
                    $_SESSION['status'] = 'login';
                    header("location: ../view/dashboard.php"); 
                    exit;
                } else {
                    header("location: ../index.php?pesan=gagal"); 
                    exit;
                }
            } else {
                header("location: ../index.php?pesan=gagal");
                exit;
            }
        }


        function logout(){
            session_start();
            session_destroy();
            header("location: ../index.php");
        }

    }

 ?>