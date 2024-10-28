<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ekart | Admin Login</title>
</head>
<body>
    <div class="container">
        <div class="col-md-12">
            <h2>Login</h2>
            <form method="post" action="{{ route('admin.do.login') }}">
                @csrf
                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="text" id="form2Example1" class="form-control"  name="username" placeholder="User name"/>
                  <label class="form-label" for="form2Example1">User Name</label>
                </div>
              
                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="password" id="form2Example2" class="form-control" name="password" placeholder="Password"/>
                  <label class="form-label" for="form2Example2">Password</label>
                </div>
              
                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                  <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember_me" value="1" id="form2Example31"  />
                      <label class="form-check-label" for="form2Example31"> Remember me </label>
                    </div>
                  </div>
              
                  <div class="col">
                    <!-- Simple link -->
                    <a href="#!">Forgot password?</a>
                  </div>
                </div>
              
                <!-- Submit button -->
                <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Sign in</button>
              
                <!-- Register buttons -->
                <div class="text-center">
                  <p>Not a member? <a href="#!">Register</a></p>
                  <p>or sign up with:</p>
                  <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-facebook-f"></i>
                  </button>
              
                  <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-google"></i>
                  </button>
              
                  <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-twitter"></i>
                  </button>
              
                  <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-github"></i>
                  </button>
                </div>
              </form>
        </div>
    </div>
</body>
</html>