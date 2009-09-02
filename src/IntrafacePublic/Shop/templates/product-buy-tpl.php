
<?php if ($product['stock'] == 0 || $stock['for_sale'] > 0): ?>
    <p><form method="POST" class="buy" action="<?php e(url('add'));?>">
<?php if ($product['currency'][$currency]['before_price_incl_vat'] != 0.00): ?><p class="before_price"><?php e($currency); ?> <?php e(number_format($product['currency'][$currency]['before_price_incl_vat'], 2, ",", ".")); ?></p><?php endif; ?>

<p class="price"><span><?php e($currency); ?> <?php e(number_format($product['currency'][$currency]['price_incl_vat'], 2, ",", ".")); ?></span></p><br />

            <input type="submit" name="add_product_id" id="submit1" value="<?php e(__('Buy')); ?>" />


        </form>
    </p>
<?php else: ?>
    <p class="shop-sold-out"><?php e(__('Product is sold out')); ?>.</p>
<?php endif; ?>
