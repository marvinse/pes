<a href="?c=product&action=add">Agregar producto</a>
<ul>
    <?php foreach ($entries as $product){ ?>
        <li><?php echo $product->name ?> <a href="?c=product&action=update&id=<?php echo $product->getId() ?>">Editar</a> | <a href="?c=product&action=delete&id=<?php echo $product->getId() ?>">Borrar</a></li>
    <?php } ?>
</ul>