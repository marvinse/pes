<?php include('view/partials/menu.php') ?>
<br><br>
<div class="container">
    <form class="needs-validation" novalidate method="POST" action="?c=user&action=profile">
        <h2>Bienvenido <?php echo $_SESSION["username"]; ?></h2>
        <p>Rol: <span class="badge bg-primary text-light"><?php echo $_SESSION["isAdmin"] ? "Administrador" : "Editor"?></span></p>
        <div class="form-group">
            <label for="newpassword">New Password</label>
            <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Si desea cambiar su contraseña ingrese el nuevo password deseado" required>
            <div class="invalid-feedback">
                Favor ingresar una contraseña
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Cambiar</button>
    </form>
    <br/>
    <?php if(isset($success)){ ?>
        <div class="alert alert-success" role="alert">
            La contraseña se cambió con éxito
        </div>
    <?php } ?>
</div>