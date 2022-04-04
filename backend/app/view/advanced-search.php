<?php include('view/partials/menu.php') ?>
<br><br>
<div class="container">
    <form method="POST" action="?c=dashboard&action=advancedsearch">
        <div class="form-group">
            <label for="type">Tipo de grupo</label>
            <select class="form-control" id="type" name="type">
                <option value=""></option>
                <option value="Empresa">Empresa</option>
                <option value="Iglesia">Iglesia</option>
                <option value="Colegio">Colegio</option>
                <option value="Escuela">Escuela</option>
                <option value="Comunidad">Comunidad</option>
            </select>
        </div>
        <div class="form-group">
            <label for="entity">Nombre de la entidad</label>
            <input type="text" class="form-control" id="entity" name="entity" placeholder="Nombre de la entidad">
        </div>
        <div class="form-group">
            <label for="contactname">Nombre del contacto</label>
            <input type="text" class="form-control" id="contactname" name="contactname" placeholder="Nombre del contacto">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
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
            <input type="text" class="form-control" name="topic" id="topic" placeholder="Tema">
        </div>
        <div class="form-group">
            <label for="status">Estado</label>
            <select class="form-control" id="status" name="status">
                <option value=""></option>
                <option value="approved">Aprobada</option>
                <option value="pending">Pendiente</option>
                <option value="rejected">Rechazada</option>
                <option value="unknow">Desconocida</option>
            </select>
        </div>
        <div class="form-group">
            <label for="responsible">Responsable</label>
            <select class="form-control" id="responsible" name="responsible">
                <option value=""></option>
                <?php foreach ($users as $user){ ?>
                    <option value="<?php echo $user->getId()?>"><?php echo $user->username ?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
</div>