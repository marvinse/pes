<?php include('view/partials/menu.php') ?>
<br><br>
<div class="container">
    <form enctype="multipart/form-data" class="needs-validation" novalidate method="POST" action="?c=dashboard&action=add">
        <div class="form-group">
            <label for="type">Tipo de grupo</label>
            <select class="form-control" id="type" name="type">
                <option value="Empresa">Empresa</option>
                <option value="Iglesia">Iglesia</option>
                <option value="Colegio">Colegio</option>
                <option value="Escuela">Escuela</option>
                <option value="Comunidad">Comunidad</option>
            </select>
        </div>
        <div class="form-group">
            <label for="entity">Nombre de la entidad</label>
            <input type="text" class="form-control" id="entity" name="entity" placeholder="Nombre de la entidad" required>
            <div class="invalid-feedback">
                Favor ingresar nombre de la entidad
            </div>
        </div>
        <div class="form-group">
            <label for="contactname">Nombre del contacto</label>
            <input type="text" class="form-control" id="contactname" name="contactname" placeholder="Nombre del contacto" required>
            <div class="invalid-feedback">
                Favor ingresar el nombre del contacto
            </div>
        </div>
        <div class="form-group">
            <label for="telephone">Teléfono</label>
            <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Teléfono" required>
            <div class="invalid-feedback">
                Favor ingresar un teléfono
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            <div class="invalid-feedback">
                Favor ingresar email del cliente
            </div>
        </div>
        <div class="form-group">
            <label for="direction">Dirección</label>
            <input type="text" class="form-control" id="direction" name="direction" placeholder="Dirección">
        </div>
        <div class="form-group">
            <label for="date">Fecha de solicitud</label>
            <input type="date" class="form-control" id="date" name="date" placeholder="Fecha de solicitud">
        </div>
        <div class="form-group">
            <label for="activitydate">Fecha de actividad</label>
            <input type="date" class="form-control" id="activitydate" name="activitydate" placeholder="Fecha de actividad">
        </div>
        <div class="form-group">
            <label for="topic">Tema</label>
            <input type="text" class="form-control" name="topic" id="topic" placeholder="Tema" required>
            <div class="invalid-feedback">
                Favor ingresar un tema
            </div>
        </div>
        <div class="form-group">
            <label for="money">Monto estimado</label>
            <input type="text" class="form-control" id="money" name="money" placeholder="Monto estimado">
        </div>
        <div class="form-group">
            <label for="status">Estado</label>
            <select class="form-control" id="status" name="status">
                <option value="approved">Aprobada</option>
                <option value="pending">Pendiente</option>
                <option value="rejected">Rechazada</option>
                <option value="unknow">Desconocida</option>
            </select>
        </div>
        <div class="form-group">
            <label for="responsible">Responsable</label>
            <select class="form-control" id="responsible" name="responsible">
                <?php foreach ($users as $user){ ?>
                    <option value="<?php echo $user->getId()?>"><?php echo $user->username ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="pdf">Propuesta PDF enviada</label>
            <input type="file" accept=".pdf" class="form-control-file" id="pdf" name="pdf">
            </div>
        <div class="form-group">
            <label for="notes">Observaciones</label>
            <textarea name="notes" class="form-control" id="notes" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>