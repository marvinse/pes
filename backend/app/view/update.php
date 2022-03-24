<form method="POST" action="?c=product&action=update">
    <input type="hidden" name="id" value="<?php echo $product->getId() ?>">
    <input type="text" name="name" id="" placeholder="Nombre" value="<?php echo $product->name?>">
    <input type="text" name="price"  placeholder="Precio" value="<?php echo $product->price?>">
    <input type="text" name="image"  placeholder="Url de la imagen" value="<?php echo $product->image?>">
    <textarea name="description" placeholder="Descripcion" id="" cols="30" rows="10"><?php echo $product->description?></textarea>
    <input type="submit">
</form>