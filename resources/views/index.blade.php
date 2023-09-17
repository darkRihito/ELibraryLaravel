<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>
<body>
    <div class="container-fluid m-0 p-0">
        <section class="main-section">
            <div class="container">
                <div class="user signinbox">
                    <div class="imagebox">
                        <img src="https://images.pexels.com/photos/4855428/pexels-photo-4855428.jpeg">
                    </div>
                       <div class="formbox">
                            <div class="form">
                                <h2>Rafi Library</h2>
                                <input type="text" placeholder="username">
                                <input type="password" placeholder="Password">
                                <!-- <input type="submit" value="Login"> -->
                                <a style="color:white;" class="btn btn-warning rounded-0 px-4 py-2 mt-2" href="{{ route('bibliografi.index') }}">Login</a>
                                <!-- <p class="signup-text">Don't have an account?<a href="#" onClick="toggleform();">Signup</a></p> -->
                            </div>
                        </div> 
                </div>
                <!-- <div class="user signupbox">
                    <div class="formbox">
                        <div class="form">
                            <h2>Signup</h2>
                            <input type="text" placeholder="Name">
                            <input type="email" placeholder="Email">
                            <input type="password" placeholder="Password">
                            <input type="submit" value="Signup">
                            <p class="signup-text">Already have an account? <a href="#" onClick="toggleform();">Login</a></p>
                        </div>
                    </div>
                    <div class="imagebox">
                            <img src="https://i.imgur.com/kPlWgwj.jpg">
                        </div>
                    </div>
                </div> -->
        </section>
    </div>
</body>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>