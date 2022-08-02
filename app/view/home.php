<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth Management</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.19.0/dist/full.css" rel="stylesheet" type="text/css" />
</head>
<body>
    

    <?php if (isset($model["success"])) : ?>
    <input type="checkbox" checked id="my-modal" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg"><?= $model["success"] ?></h3>
            <div class="modal-action">
                <!-- <label onclick="window.location.href = '/login';" class="btn">Login</label> -->
                <label for="my-modal" class="btn">Yay!</label>
            </div>
        </div>
    </div>
    <?php endif; ?>
    
    <div class="navbar bg-base-100" data-theme="bumblebee">
        <div class="flex-1">
          <a class="btn btn-ghost normal-case text-xl" href="/">Auth Management</a>
        </div>
        <div class="flex-none gap-2">
          <div class="form-control">
            <input type="text" placeholder="Search" class="input input-bordered" />
          </div>
          <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle avatar">
              <div class="w-10 rounded-full">
                <img src="https://placeimg.com/80/80/people" />
              </div>
            </label>
            <ul tabindex="0" class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52">
              <li>
                <a class="justify-between">
                  Profile
                  <span class="badge">New</span>
                </a>
              </li>
              <li><a>Settings</a></li>
              <li>
                <form action="/logout" method="POST">
                  <button type="submit">Logout</button>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>

    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>