<form method="POST" action="?c=login">
    <div class="form-group">
        <label for="username">Usuario</label>
        <input required type="text" class="form-control" name="username" id="username" placeholder="Nombre de usuario">
    </div>
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" required class="form-control" name="password" id="password" placeholder="Contraseña">
    </div>
    <button type="submit" class="btn btn-primary mt-2">Iniciar sesión</button>
</form>