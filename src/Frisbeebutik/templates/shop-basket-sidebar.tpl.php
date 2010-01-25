<?php echo $content; ?>

            <div id="sidebar2">

            <?php if (!empty($products['products'])): ?>
                <h4 class="nyheder">Nyheder</h4>

                <ul class="discs">
                	<?php foreach($products['products'] as $product): ?>
                		<li>
                		 	<a href="<?php e(url('product/' . $product['id'])); ?>">
                				<img border="0" src="<?php e($product['pictures'][0]['system-square']['file_uri']); ?>" alt="<?php e($product['name']); ?>" width="72" height="72" />DKK <?php e($product['price_incl_vat']); ?>
                			</a>
                		</li>
                	<?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>
