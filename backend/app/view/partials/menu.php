<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="?c=dashboard">CIP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="?c=dashboard">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?c=dashboard&action=add">Añadir cliente</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?c=dashboard&action=advancedsearch">Busqueda avanzada</a>
        </li>
        <?php if( @$_SESSION["isAdmin"]==1 ){ ?>
            <li class="nav-item">
                <a class="nav-link" href="?c=user">Administrar usuarios</a>
            </li>
        <?php } ?>
        <li class="nav-item">
            <a class="nav-link" href="?c=login&action=logout">Cerrar sesión</a>
        </li>
        </ul>
        <form method="POST" action="?c=dashboard&action=search" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </div>
</nav>