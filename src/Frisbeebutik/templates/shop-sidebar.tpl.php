<div id="middle">
<?php echo $content; ?>
</div>
            <div id="sidebar2">
                <p class="cart1"><a href="<?php e(url('/shop/basket')); ?>"><img src="<?php e(url('/images/cart1.gif')); ?>" alt="Indkøbskurv" width="25" height="18" /> <span>Indkøbskurv</span></a></p>
                <!--
                <div class="totals">
                    <p class="qty">5 vare(r) i kurven</p>
                    <p><strong>1,293.00 DKK</strong></p>
                    <p><span>fragt 80,00 DKK</span></p>
                    <p><a href="#">Se Indk&Oslash;bskurv</a></p>
                </div>
                -->

            <?php if (!empty($products['products'])): ?>
                <h4 class="nyheder">Nyheder</h4>

                <ul class="discs">
                	<?php foreach($products['products'] as $product): ?>
                		<li>
                		 	<a href="<?php e(url('product/' .$product['id'])); ?>">
                				<img border="0" src="<?php e($product['pictures'][0]['system-square']['file_uri']); ?>" alt="<?php e($product['name']); ?>" width="72" height="72" />DKK <?php e($product['price_incl_vat']); ?>
                		 	</a>
                		</li>
                	<?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>
