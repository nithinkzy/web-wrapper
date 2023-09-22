<?php /* Template Name: Login template*/


// Check if the user is already logged in, if yes then redirect him to welcome page
// if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
//     $url = '/admin';
//     wp_redirect($url);
//     exit;
// }

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";


// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {

        // Define admin credentials 
        $admin_username = 'test';
        $hashed_password = password_hash('test', PASSWORD_BCRYPT);

        // Check if username exists, if yes then verify password
        if ($admin_username == $username) {
            if (password_verify($password, $hashed_password)) {
                // Password is correct, so start a new session
                // session_start();

                // Store data in session variables
                $_SESSION["loggedin"] = true;
                // define your url here
                $url = '/admin';
                wp_redirect($url);
                // Redirect user to welcome page
                // header("location: admin.php");
            } else {
                // Password is not valid, display a generic error message
                $login_err = "Invalid username or password.";
            }
        } else {
            // Username doesn't exist, display a generic error message
            $login_err = "Invalid username or password.";
        }
    }
}

get_header();
// session_destroy();
?>
<main class="form-signin container-sm  m-auto">
    <form class="text-center" method="post">
        <img class="mb-4" src="<?php echo LOGODIR ?>" alt="" width="72" height="57">
        <h1 class="h3 mb-5 fw-normal">Please sign in</h1>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="username" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-5">
            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <?php
        if ($login_err) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $login_err ?>
            </div>
        <?php

        }
        ?>

        <!-- <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div> -->
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    </form>
</main>
<style>
    .form-signin {
        max-width: 330px;
        padding: 15px;
    }
</style>
<?php
get_footer();
