<div class="container mt-5 p-3 rounded cart">
    <div class="row no-gutters">
        <div class="col-md-8">
            <div class="product-details mr-2">
                <a href="?c=home"><span><i class="fas fa-long-arrow-alt-left ml-3 text-black-50"></i>Regresar a la tienda</span></a>
                <hr>
                <h6 class="mb-0">Tu carrito <?php echo count($cart_products) == 0 ? "está vacío" : "" ?></h6>
                <?php foreach ($cart_products as $product){ ?>
                    <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                    <div class="d-flex flex-row">
                        <img class="rounded" src="<?php echo $product->image ?>" width="40">
                        <div class="ms-2">
                            <span class="fw-bold d-block"><?php echo $product->name ?></span>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center">
                        <span class="d-block"><?php echo @$_SESSION["cart"][$product->getId()] ?> x&nbsp;</span>
                        <span class="d-block ml-5 fw-bold"> $<?php echo $product->price ?></span>
                        &nbsp;<a href="?c=cart&action=delete&itemid=<?php echo $product->getId() ?>"><i class="fas fa-trash ml-3 text-black-50"></i></a>
                    </div>
                </div>
                <?php addToTotal(@$_SESSION["cart"][$product->getId()], $product->price) ?>
                <?php } ?>
            </div>
        </div>
        <?php if ( count($cart_products) > 0 ){ ?>
            <div class="col-md-4">
                <div class="payment-info">
                    <div class="d-flex justify-content-between align-items-center"><span>Detalles de tu pago</span></div><span class="type d-block mt-3 mb-1">Tipo de tarjeta</span><label class="radio"> <input type="radio" name="card" value="payment" checked> <span><img width="30" src="https://img.icons8.com/color/48/000000/mastercard.png" /></span> </label>
                    <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="https://img.icons8.com/officel/48/000000/visa.png" /></span> </label>
                    <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="https://img.icons8.com/ultraviolet/48/000000/amex.png" /></span> </label>
                    <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="https://img.icons8.com/officel/48/000000/paypal.png" /></span> </label>
                    <div><label class="credit-card-label">Nombre como en la tarjeta</label><input type="text" class="form-control credit-inputs" placeholder="Name"></div>
                    <div><label class="credit-card-label">Número de la tarjeta</label><input type="text" class="form-control credit-inputs" placeholder="0000 0000 0000 0000"></div>
                    <div class="row">
                        <div class="col-md-6"><label class="credit-card-label">Fecha de expiración</label><input type="text" class="form-control credit-inputs" placeholder="12/24"></div>
                        <div class="col-md-6"><label class="credit-card-label">CVV</label><input type="text" class="form-control credit-inputs" placeholder="000"></div>
                    </div>
                    <hr class="line">
                    <div class="d-flex justify-content-between information"><span>Total</span><span>$<?php echo $total?></span></div><button class="btn btn-primary btn-block d-flex justify-content-between mt-3" type="button"><span>$<?php echo $total?></span><span>&nbsp;Checkout<i class="fa fa-long-arrow-right ml-1"></i></span></button>
                </div>
            </div>
        <?php }?>
    </div>
</div>