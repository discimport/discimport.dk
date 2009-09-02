<div id="middle">
                <ul class="breadcrumb">

                    <li><a href="<?php e(url('../')); ?>">Produkter</a> &gt; </li>
                    <li><?php e($product['name']); ?></li>
                </ul>
                <div class="description">
                    <h3><span><?php e($product['number']); ?></span> <?php e($product['name']); ?></h3>

                    <p><?php e($product['description']); ?></p>
                    <ul class="product-details">
                    <!--
                        <li><strong>Producent:</strong> Discmania</li>
                        <li><strong>Plast:</strong> D-line</li>

                        <li><strong>Diameter:</strong> 21,7cm</li>
                        <li><strong>Technic:</strong> Speed 4, Glide 4, Turn 0, Fade 2</li>
                        -->
                    </ul>
                    <?php if(isset($related_products) && is_string($related_products)) echo $related_products; ?>
                </div>
                <!-- end description -->
                <!-- start image and price box to the sider of description -->
                <div class="pricebox">
                    <p class="imgbox"><?php if(isset($pictures) && is_string($pictures)) echo $pictures; ?></p>

    <?php if($product['has_variation']): ?>
        <?php echo $product_variation_buy; ?>
    <?php else: ?>
        <?php echo $product_buy; ?>
    <?php endif; ?>


                </div>

                <!-- end price box -->
            </div>