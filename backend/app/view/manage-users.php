<?php include('view/partials/menu.php') ?>
<br><br>
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <table>
          <thead>
            <tr>
              <th scope="col">Tipo</th>
              <th scope="col">Usuario</th>
              <th scope="col">Email</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $user){ ?>
            <tr>
                <td data-label="Tipo"><?php echo $user->getIsAdmin() == 1 ? "Administrador" : "Editor" ?></td>
                <td data-label="Usuario"><?php echo $user->username ?></td>
                <td data-label="Email"><?php echo $user->email ?></td>
                <td data-label="Acciones">
                    <a href="?c=user&action=edit&id=<?php echo $user->getId() ?>">Editar</a> 
                    <a href="#" onclick="openModal(<?php echo $user->getId() ?>)">Borrar</a>
                </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <br/>
    <div class="row">
      <div class="col-12">
        <a class="btn btn-primary" href="?c=user&action=add" role="button">Agregar nuevo usuario</a>
      </div>
    </div>
  </div>
  <!-- Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Alerta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Estás seguro de borrar este usuario?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <input type="hidden" value="" id="userid">
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="deleteUser()">Sí, borrar</button>
      </div>
    </div>
  </div>
</div>
<script>
    function openModal(id){
        $('#userid').val(id);
        $('#deletemodal').modal();
    };

    function deleteUser(){
        window.location.href = "?c=user&action=delete&id="+$('#userid').val();
    }
</script>