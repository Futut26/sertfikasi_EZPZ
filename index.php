<!DOCTYPE html>
<html 
data-theme="light"
lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.20/dist/full.min.css" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content flex-col lg:flex-col">
            <!-- handle pesan -->

            <?php 
                if(isset($_GET['pesan']) && $_GET['pesan'] === 'gagal'){
                    echo "<div class='alert alert-error'>Login gagal, email atau password salah!</div>";
                }else if(isset($_GET['pesan']) && $_GET['pesan'] === 'berhasil'){
                    echo "<div class='alert alert-success'>Registrasi berhasil, silahkan login!</div>";
                }
            ?>

            <div class="text-center lg:text-left">
                <h1 class="text-5xl font-bold">Login now!</h1>
                
            </div>
            <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
                <form action="handler/proses_auth.php?aksi=login" method="post" class="card-body">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Username</span>
                        </label>
                        <input type="username" name="username" placeholder="username" class="input input-bordered" required />
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <input type="password"  name="password" placeholder="password" class="input input-bordered" required />
                       
                    </div>
                    <div class="form-control mt-6">
                        <button type="submit" class="btn btn-primary">Login</button>
                     </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>