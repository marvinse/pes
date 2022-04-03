<?php include('view/partials/menu.php') ?>
<br><br>
<div class="container">
    <form class="needs-validation" novalidate method="POST" action="?c=user&action=update">
        <div class="form-group">
            <label for="isAdmin">Tipo de usuario</label>
            <select class="form-control" id="isAdmin" name="isAdmin">
                <option value="0">Editor</option>
                <option <?php echo $user[0]->getIsAdmin() ==1 ? "selected" : "" ?> value="1">Administrador</option>
            </select>
        </div>
        <div class="form-group">
            <label for="username">Nombre de usuario</label>
            <input value="<?php echo $user[0]->username?>" type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario" required>
            <div class="invalid-feedback">
                Favor ingresar un nombre de usuario
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input value="<?php echo $user[0]->email?>" type="email" class="form-control" id="email" name="email" placeholder="Email del nuevo usuario" required>
            <div class="invalid-feedback">
                Favor ingresar un email válido
            </div>
        </div>
        <input type="hidden" id="id" name="id" value="<?php echo $_GET['id']?>">
        <button type="submit" class="btn btn-primary">Actualizar</button>
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