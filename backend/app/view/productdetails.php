<img src="<?php echo $product->image ?>" />
<h5><?php echo $product->name ?></h5>
<span class="text-secondary">Precio: $<?php echo $product->price ?></span>
<p><?php echo $product->description ?></p>
<a href="?c=cart&action=add&itemid=<?php echo $product->getId() ?>">Agregar al carrito</a>
<br>