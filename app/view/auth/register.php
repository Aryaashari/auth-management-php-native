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
    
    <div class="container flex justify-center mt-32">

        <div class="card w-96 bg-base-50 shadow-xl" data-theme="bumblebee">
            <div class="card-body">
                <h2 class="font-bold text-center text-lg">REGISTER</h2>

                <form action="/register" method="POST" class="w-full">
                    <div class="form-control mb-3">
                        <label class="input-group">
                            <span>Name</span>
                            <input type="text" name="name" class="input input-bordered w-full" />
                        </label>
                    </div>

                    <div class="form-control mb-3">
                        <label class="input-group">
                            <span>Username</span>
                            <input type="text" name="username" class="input input-bordered w-full" />
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