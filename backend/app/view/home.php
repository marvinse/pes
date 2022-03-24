<a href="?c=login<?php echo @$_SESSION["uid"] ? "&action=logout" : ""; ?>"><?php echo @$_SESSION["uid"] ? "Cerrar sesión" : "Iniciar Sesión"; ?></a>
<?php
    if( @$_SESSION["uid"] ){ ?>
        <a href="?c=edit">Editar productos</a>
<?php } ?>
<a href="?c=cart">Ver carrito</a>
<form method="POST" action="?c=home">
    <input type="text" name="search">
    <input type="submit" value="Buscar" />
</form>
<?php
    if($_POST){ ?>
        <h3>Busquedas relacionadas con: <?php echo $filter ?></h3>
<?php } ?>
<?php foreach ($entries as $product){ ?>
    <img src="<?php echo $product->image ?>" />
    <h5><?php echo $product->name ?></h5>
    <span class="text-secondary">Precio: $<?php echo $product->price ?></span>
    <p><?php echo $product->description ?></p>
    <br>
    <a href="?c=product&id=<?php echo $product->getId() ?>" class="btn btn-dark">ver producto</a>
<?php } ?>