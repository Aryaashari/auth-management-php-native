<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth Management - Register</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.19.0/dist/full.css" rel="stylesheet" type="text/css" />
</head>
<body>

    <?php if (isset($model["success"])) : ?>
    <input type="checkbox" checked id="my-modal" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Selamat, anda telah berhasil membuat akun!</h3>
            <p class="py-4">Silahkan login ke akun anda sekarang!</p>
            <div class="modal-action">
                <label onclick="window.location.href = '/login';" class="btn">Login</label>
            </div>
        </div>
    </div>
    <?php endif; ?>
    
    <div class="container flex justify-center mt-32">

        <div class="card w-96 bg-base-50 shadow-xl" data-theme="bumblebee">
            <div class="card-body">
                <h2 class="font-bold text-center text-lg">REGISTER</h2>

                <?php if (!is_null($model) && isset($model["error"])) : ?>
                    <div class="alert alert-error shadow-lg">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span><?= $model["error"]; ?></span>
                        </div>
                    </div>
                <?php endif; ?>

                <form action="/register" method="POST" class="w-full">
                    <div class="form-control mb-3">
                        <label class="input-group">
                            <span>Name</span>
                            <input type="text" name="name" value="<?= $_POST['name'] ?? '' ?>" class="input input-bordered w-full" />
                        </label>
                    </div>

                    <div class="form-control mb-3">
                        <label class="input-group">
                            <span>Username</span>
                            <input type="text" name="username" value="<?= $_POST['username'] ?? '' ?>" class="input input-bordered w-full" />
                        </label>
                    </div>

                    <div class="form-control w-full mb-3">
                        <label class="input-group">
                            <span>Password</span>
                            <input type="password" name="password" class="input input-bordered w-full" />
                        </label>
                    </div>

                    <div class="form-control w-full mb-3">
                        <label class="input-group">
                            <span>Confirm Password</span>
                            <input type="password" name="confirmPassword" class="input input-bordered w-full" />
                        </label>
                    </div>
                    
                    <p class="text-center text-xs">Sudah punya akun? <a href="/login" class="underline text-yellow-500">Login</a></p>

                    <div class="card-actions w-full mt-4">
                        <button class="btn btn-primary btn-md w-full" type="submit">Register</button>
                    </div>
                </form>
            </div>
        </div>

    </div>


    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>