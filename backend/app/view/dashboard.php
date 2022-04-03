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
                <td data-label="Opciones"><a href="?c=client&action=edit&id=<?php echo $client->id ?>">Editar</a><br /><a href="?c=client&action=delete&id=<?php echo $client->id ?>">Eliminar</a></td>
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