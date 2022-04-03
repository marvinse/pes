<?php include('view/partials/menu.php') ?>
<br><br>
<div class="container">
    <form class="needs-validation" novalidate method="POST" action="?c=user&action=add">
        <div class="form-group">
            <label for="isAdmin">Tipo de usuario</label>
            <select class="form-control" id="isAdmin" name="isAdmin">
                <option value="0">Editor</option>
                <option value="1">Administrador</option>
            </select>
        </div>
        <div class="form-group">
            <label for="username">Nombre de usuario</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario" required>
            <div class="invalid-feedback">
                Favor ingresar un nombre de usuario
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email del nuevo usuario" required>
            <div class="invalid-feedback">
                Favor ingresar un email válido
            </div>
        </div>
        <div class="form-group">
            <label for="password">Contraseña temporal (el usuario deberá cambiarla en el primer inicio de sesión)</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña temporal" required>
            <div class="invalid-feedback">
                Favor ingresar una contraseña temporal
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>