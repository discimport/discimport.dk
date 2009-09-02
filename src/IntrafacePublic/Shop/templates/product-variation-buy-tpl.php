<form method="POST" id="form2" class="buy" action="<?php e(url('add'));?>">
    <?php foreach($attribute_groups as $key => $group): ?>
        <div class="attribute-group">
            <label><?php e($group['name']); ?>:</label>
            <select name="attribute[<?php e($key); ?>]">
                <option value="0"><?php e(__('Select...')); ?></option>
                <?php foreach ($group['attributes'] as $attribute): ?>
                    <?php
                    $selected = '';
                    if(isset($variation) && isset($variation['variation']) && isset($variation['variation']['attributes']) && $variation['variation']['attributes'][$key]['id'] == $attribute['id'] OR count($group['attributes']) == 1) {
                        $selected = 'selected="selected"';
                    }
                    ?>
                    <option value="<?php e($attribute['id']); ?>" <?php echo $selected; ?> ><?php e($attribute['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    <?php endforeach; ?>

    <?php if(isset($variation)): ?>
        <?php if($variation === false): ?>
            <?php e(__('The selected variation does not exist. Please select another.')); ?>
        <?php else: ?>
            <?php if($variation['variation']['currency'][$currency]['before_price_incl_vat'] != 0.00): ?><p class="before_price"><?php e($currency); ?> <?php e(number_format($variation['variation']['currency'][$currency]['before_price_incl_vat'], 2, ",", ".")); ?></p><?php endif; ?>
            <p class="price"><span><?php e($currency); ?> <?php e(number_format($variation['variation']['currency'][$currency]['price_incl_vat'], 2, ",", ".")); ?></span></p>
            <?php if ($product['stock'] == 0 || $variation['stock']['for_sale'] > 0): ?>
                <input type="submit" name="add_product_id" id="submit1" value="<?php e(__('Buy')); ?>" />
            <?php else: ?>
                <p class="shop-sold-out"><?php e(__('Variation is sold out')); ?>.</p>
            <?php endif; ?>
        <?php endif; ?>
    <?php else: ?>
        <?php if($product['currency'][$currency]['before_price_incl_vat'] != 0.00): ?><p class="before_price"><?php e($currency); ?> <?php e(number_format($product['currency'][$currency]['before_price_incl_vat'], 2, ",", ".")); ?></p><?php endif; ?>
        <p class="price"><span><?php e($currency); ?> <?php e(number_format($product['currency'][$currency]['price_incl_vat'], 2, ",", ".")); ?></span></p>
        <input type="submit" name="add_product_id" id="submit1" value="<?php e(__('Buy')); ?>" />
    <?php endif; ?>
</form>
