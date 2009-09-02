                <ul class="overview">

                    <?php foreach ($products as $product): ?>

                    <li>
                        <p class="imgleft"><a href="<?php e($this->urlToProductId($product['id'])); ?>">
                            <?php if (!empty($product['pictures'][0])): ?>
                            <img src="<?php e($product['pictures'][0]['products-thumb']['file_uri']); ?>" alt="<?php e($product['name']); ?>" width="<?php e($product['pictures'][0]['products-thumb']['width']); ?>" height="<?php e($product['pictures'][0]['products-thumb']['height']); ?>" />
                            <?php endif; ?>
                        </a></p>
                        <div class="desc">
                            <h3><span><?php e($product['number']); ?></span> <a href="<?php e($this->urlToProductId($product['id'])); ?>"><?php e($product['name']); ?></a></h3>
                            <!--
                            <p>MD1 er den første Discmania golf disc. Den har en stor diameter og er en stabil mellemdistance disc med et meget pålideligt svæv og langsomt fade.</p>
                            <ul>
                                <li>Producent: <strong>Discmania</strong></li>
                                <li>Plast: <strong>D-line</strong></li>
                                <li>Diameter: <strong>21,7cm</strong></li>
                                <li>Technic: <strong>Speed 4, Glide 4, Turn 0</strong></li>
                            </ul>
                            -->
                        </div>
                        <div class="purchase">
                            <p><strong>DKK <?php e(number_format($product['currency'][$currency]['price_incl_vat'], 2, ",",".")); ?></strong></p>
                            <p><a href="<?php e($this->urlToProductId($product['id'])); ?>"><img src="<?php e(url('/images/arrow11x10.gif')); ?>" alt="detaljer" width="11" height="10" /> Detaljer</a></p>
                            <!--
                            <form class="form2" method="post" action="">
                                <div class="purchform">
                                    <input name="purchase-qty" type="text" class="purchase-qty" value="1" />
                                    <input type="submit" name="purchase-button" class="purchase-button" value="&nbsp;K&Oslash;B" />
                                </div>
                            </form>
                            -->
                        </div>
                    </li>
                    <!--end row -->
                    <?php endforeach; ?>
                </ul>