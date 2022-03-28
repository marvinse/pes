<div class="container-login100">
    <div class="wrap-login100">
        <form method="POST" action="?c=login" class="login100-form validate-form">
            <span class="login100-form-title">
                Login
            </span>
            <div class="wrap-input100 validate-input" data-validate="Usuario es requerido">
                <input class="input100" type="text" name="username" placeholder="Usuario">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Password es requerido">
                <input class="input100" type="password" name="password" placeholder="Password">
                <span class="focus-input100"></span>
            </div>
            <?php if( isset($msg) ){ ?>
                <p><?php echo $msg; ?></p>
            <?php } ?>
            <div class="container-login100-form-btn m-t-17">
                <button class="login100-form-btn">
                    Login
                </button>
            </div>
        </form>
    </div>
</div>