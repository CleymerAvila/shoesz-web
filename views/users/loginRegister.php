<?php include '../../middlewares/guest.php'; ?>
<?php include '../../config/db.php'; ?>
<?php
$title =  'Login - Sign Up | Shoesz';
include('../layout/header.php');
?>

<div class="login-container">
    <div class="form-box login">
        <form action="<?=$BASE_URL?>controllers/userController.php?action=login" method="POST">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="email" placeholder="Email" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <!-- Aquí agregamos el radio button -->
            <fieldset class="role-selector">
                <label>
                    <input type="radio" name="role" value="Cliente" checked>
                    Cliente
                </label>
                <label>
                    <input type="radio" name="role" value="Admin">
                    Administrador
                </label>
            </fieldset>
            <div class="forgot-link">
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <p>Or loggin with social media</p>
            <div class="social-icons">
                <a href="#"><i class='bx bxl-facebook'></i></a>
                <a href="#"><i class='bx bxl-github'></i></a>
                <a href="#"><i class='bx bxl-google'></i></a>
                <a href="#"><i class='bx bxl-linkedin'></i></a>
            </div>
        </form>
    </div>

    <div class="form-box register">
        <form action="<?=$BASE_URL?>controllers/userController.php?action=register" method="POST">
            <h1>Registration</h1>
            <div class="input-box">
                <input type="text" name="name" placeholder="Name" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="text" name="email" placeholder="Email">
                <i class='bx bxs-envelope'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" class="btn">Register</button>
            <p>Or Register with social media</p>
            <div class="social-icons">
                <a href="#"><i class='bx bxl-facebook'></i></a>
                <a href="#"><i class='bx bxl-github'></i></a>
                <a href="#"><i class='bx bxl-google'></i></a>
                <a href="#"><i class='bx bxl-linkedin'></i></a>
            </div>
        </form>
    </div>

    <div class="toggle-box">
        <div class="toggle-panel toggle-left">
            <a href="<?=$BASE_URL?>">Back to Home</a>
            <h1>Hello, Welcome to Shoesz</h1>
            <p>Don't have an account?</p>
            <button class="btn register-btn">Register</button>
        </div>

        <div class="toggle-panel toggle-right">
            <h1>Welcome Back!</h1>
            <p>Already have an account?</p>
            <button class="btn login-btn">Login</button>
        </div>
    </div>
</div>

<?php include '../../views/layout/footer.php'; ?>