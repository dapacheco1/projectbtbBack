<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Register Form</title>
</head>
<body>
    <div class="container">
        <form >
            <h1 class="text-center">Register User form</h1>
            <!--Username-->
            <div class="col-xl-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" required>
            </div>
            <!--Password-->
            <div class="col-xl-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" required>
            </div>
            <!--Rol-->
            <div class="col-xl-4">
                <label for="rol" class="form-label">Rol:</label>
                <select class="form-select" name="rol" id="cmbRol" required>
                    <option value="">---</option>
                    <option value="administrator">Administrator</option>
                    <option value="guest">Guest</option>
                </select>
            </div>
            <!--Email-->
            <div class="col-xl-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email">
            </div>
            <button type="button" class="btn btn-primary" id="submitData">Save User</button>
        </form>
        <a href="{{url('/login')}}">Go to Login Form</a>
    </div>
    <script type="module" src="{{asset('../js/crud.js') }}"></script>
    <script type="module" src="{{asset('../js/sentData.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>