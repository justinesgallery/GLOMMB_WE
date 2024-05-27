<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="fav.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <form class="border shadow p-3 rounded" action="check_login.php" style="width: 450px;" method="post" >
            <h1 class="text-center p-3">LOGIN</h1>
            <?php 
            if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_GET['error'] ?>
                </div>
            <?php } ?>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" name="pass" id="password">
                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                        <img src="view.png" alt="eye" style="height: 1.25rem;">
                    </button>
                </div>
            </div>
            <div class="mb-3">
                <label for="staff_id" class="form-label">Staff Id</label>
                <input type="text" class="form-control" name="staff_id" id="staff_id">
            </div>
            <button type="submit" class="btn btn-primary mb-3" name="submit">Submit</button>
        </form>
    </div>

    <script>

        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            const eyeImg = togglePassword.querySelector('img');
            if (type === 'password') {
                eyeImg.src = 'view.png';
            } else {
                eyeImg.src = 'hide.png';
            }
        });

    </script>

</body>
</html>