<?php include('view/partials/menu.php') ?>
<br><br>
<div class="container">
    <form class="needs-validation" novalidate method="POST" action="?c=dashboard&action=update">
        <div class="form-group">
            <label for="type">Tipo de grupo</label>
            <select class="form-control" id="type" name="type">
                <option <?php echo $client[0]->type == "Empresa" ? "selected" : "" ?> value="Empresa">Empresa</option>
                <option <?php echo $client[0]->type == "Iglesia" ? "selected" : "" ?> value="Iglesia">Iglesia</option>
                <option <?php echo $client[0]->type == "Colegio" ? "selected" : "" ?> value="Colegio">Colegio</option>
                <option <?php echo $client[0]->type == "Escuela" ? "selected" : "" ?> value="Escuela">Escuela</option>
                <option <?php echo $client[0]->type == "Comunidad" ? "selected" : "" ?> value="Comunidad">Comunidad</option>
            </select>
        </div>
        <div class="form-group">
            <label for="entity">Nombre de la entidad</label>
            <input type="text" value="<?php echo $client[0]->entity_name?>" class="form-control" id="entity" name="entity" placeholder="Nombre de la entidad" required>
            <div class="invalid-feedback">
                Favor ingresar nombre de la entidad
            </div>
        </div>
        <div class="form-group">
            <label for="contactname">Nombre del contacto</label>
            <input type="text" value="<?php echo $client[0]->name?>" class="form-control" id="contactname" name="contactname" placeholder="Nombre del contacto" required>
            <div class="invalid-feedback">
                Favor ingresar el nombre del contacto
            </div>
        </div>
        <div class="form-group">
            <label for="telephone">Teléfono</label>
            <input type="text" value="<?php echo $client[0]->phone?>" class="form-control" id="telephone" name="telephone" placeholder="Teléfono" required>
            <div class="invalid-feedback">
                Favor ingresar un teléfono
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" value="<?php echo $client[0]->email?>" class="form-control" id="email" name="email" placeholder="Email" required>
            <div class="invalid-feedback">
                Favor ingresar email del cliente
            </div>
        </div>
        <div class="form-group">
            <label for="direction">Dirección</label>
            <input type="text" value="<?php echo $client[0]->direction?>" class="form-control" id="direction" name="direction" placeholder="Dirección">
        </div>
        <div class="form-group">
            <label for="date">Fecha de solicitud</label>
            <input type="date" class="form-control" value="<?php echo $client[0]->date?>" id="date" name="date" placeholder="Fecha de solicitud">
        </div>
        <div class="form-group">
            <label for="activitydate">Fecha de actividad</label>
            <input type="date" value="<?php echo $client[0]->activity_date?>" class="form-control" id="activitydate" name="activitydate" placeholder="Fecha de actividad">
        </div>
        <div class="form-group">
            <label for="topic">Tema</label>
            <input type="text" value="<?php echo $client[0]->topic?>" class="form-control" name="topic" id="topic" placeholder="Tema" required>
            <div class="invalid-feedback">
                Favor ingresar un tema
            </div>
        </div>
        <div class="form-group">
            <label for="money">Monto estimado</label>
            <input type="text" value="<?php echo $client[0]->price?>" class="form-control" id="money" name="money" placeholder="Monto estimado">
        </div>
        <div class="form-group">
            <label for="status">Estado</label>
            <select class="form-control" id="status" name="status">
                <option <?php echo $client[0]->status == "approved" ? "selected" : "" ?> value="approved">Aprobada</option>
                <option <?php echo $client[0]->status == "pending" ? "selected" : "" ?> value="pending">Pendiente</option>
                <option <?php echo $client[0]->status == "rejected" ? "selected" : "" ?> value="rejected">Rechazada</option>
                <option <?php echo $client[0]->status == "unknow" ? "selected" : "" ?> value="unknow">Desconocida</option>
            </select>
        </div>
        <div class="form-group">
            <label for="responsible">Responsable</label>
            <select class="form-control" id="responsible" name="responsible">
                <?php foreach ($users as $user){ ?>
                    <option <?php echo $client[0]->responsible_id == $user->getId() ? "selected" : "" ?> value="<?php echo $user->getId()?>"><?php echo $user->username ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="pdf">Propuesta PDF enviada</label>
            <input type="file" class="form-control-file" id="pdf" name="pdf">
            </div>
        <div class="form-group">
            <label for="notes">Observaciones</label>
            <textarea name="notes" class="form-control" id="notes" rows="3"><?php echo $client[0]->notes?></textarea>
        </div>
        <input type="hidden" id="id" name="id" value="<?php echo $_GET['id']?>">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>