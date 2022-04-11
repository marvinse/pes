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
          <th scope="col">Responsable</th>
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
                <td data-label="Notas" class="notes"><span class="initialText"><?php echo $client->notes ?></span><span class="viewMore"> ... ver más</span><span class="moreText"></span></td>
                <td data-label="Modificado"><?php echo $client->modified_date ?></td>
                <td data-label="Responsable"><?php echo $client->responsible_name ?></td>
                <td data-label="Opciones" class="options">
                  <a href="?c=dashboard&action=edit&id=<?php echo $client->id ?>">Editar</a>
                  <br />
                  <a href="#" onclick="openModal(<?php echo $client->id ?>)">Eliminar</a>
                  <br />
                  <?php if($client->pdf){ ?>
                    <a href="/app/<?php echo $client->pdf; ?>" target="_blank"><button type="button" class="btn btn-dark">Ver PDF</button></a>
                  <?php } ?>
                </td>
            </tr>
        <?php } ?>
      </tbody>
    </table>
    <br>
    <nav aria-label="navigation">
      <?php 
        if($totalClients > $resulsPerPage){ ?>
          <ul class="pagination">
            <?php
              $totalPages = ceil($totalClients / $resulsPerPage);
              for ($i = 1; $i <= $totalPages; $i++) { ?>
                <li class="page-item <?php echo $i == $currentPage ? "active" : "" ?> "><a class="page-link" href="?c=dashboard&page=<?php echo $i;?>"><?php echo $i; ?></a></li>
              <?php }
            ?>
        </ul>  
      <?php  } ?>
    </nav>
    </br>
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