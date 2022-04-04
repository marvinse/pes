<?php include('view/partials/menu.php') ?>
  <div class="container-fluid">
    <div class="row dots">
      <div class="col-12">
        <span class="dot approved">Aprobada</span>
        <span class="dot pending">Pendiente</span>
        <span class="dot rejected">Rechazada</span>
        <span class="dot unknow">Desconocida</span>
      </div>
    </div>
    <table>
      <thead>
        <tr>
          <th scope="col">Tipo de grupo</th>
          <th scope="col">Nombre Empresa</th>
          <th scope="col">Nombre Cliente</th>
          <th scope="col">Telefono</th>
          <th scope="col">Email</th>
          <th scope="col">Direccion</th>
          <th scope="col">Fecha solicitud</th>
          <th scope="col">Fecha ejecucion</th>
          <th scope="col">Tema</th>
          <th scope="col">Monto</th>
          <th scope="col">Notas</th>
          <th scope="col">Modificado</th>
          <th scope="col">Responsables</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($clients as $client){ ?>
            <tr class="<?php echo $client->status ?>">
                <td data-label="Tipo de Grupo"><?php echo $client->type ?></td>
                <td data-label="Nombre Empresa"><?php echo $client->entity_name ?></td>
                <td data-label="Nombre Cliente"><?php echo $client->name ?></td>
                <td data-label="Telefono"><?php echo $client->phone ?></td>
                <td data-label="Email"><?php echo $client->email ?></td>
                <td data-label="Direccion"><?php echo $client->direction ?></td>
                <td data-label="Fecha Solicitud"><?php echo $client->date ?></td>
                <td data-label="Fecha Ejecucion"><?php echo $client->activity_date ?></td>
                <td data-label="Tema"><?php echo $client->topic ?></td>
                <td data-label="Monto"><?php echo $client->price ?></td>
                <td data-label="Notas"><?php echo $client->notes ?></td>
                <td data-label="Modificado"><?php echo $client->modified_date ?></td>
                <td data-label="Responsable"><?php echo $client->responsible_id ?></td>
                <td data-label="Opciones">
                  <a href="?c=dashboard&action=edit&id=<?php echo $client->id ?>">Editar</a>
                  <br />
                  <a href="#" onclick="openModal(<?php echo $client->id ?>)">Eliminar</a></td>
            </tr>
        <?php } ?>
      </tbody>
    </table>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </nav>
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
          Estás seguro de borrar este cliente?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <input type="hidden" value="" id="clientid">
          <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="deleteClient()">Sí, borrar</button>
        </div>
      </div>
    </div>
  </div>

  <script>
      function openModal(id){
          $('#clientid').val(id);
          $('#deletemodal').modal();
      };

      function deleteClient(){
          window.location.href = "?c=dashboard&action=delete&id="+$('#clientid').val();
      }
  </script>