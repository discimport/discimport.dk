<form class="form2" method="post" action="<?php e(url('./')); ?>">
    <table class="overview" cellspacing="0" cellpadding="0">
    <?php $i = 0; ?>
    <?php foreach ($items as $item): ?>
        <tr>
            <td class="imgleft">
                <?php if (!empty($item['pictures'][0])): ?>
            <a href="#"><img src="<?php e($item['pictures'][0]['products-thumb']['file_uri']); ?>" alt="<?php e($item['name']); ?>" alt="img 4" width="69" height="69" /></a>
            <?php endif; ?>

            </td>
            <td class="desc">
                <h3><span><?php //e($item["number"]); ?></span> <a href="#"><?php e($item["name"]); ?></a></h3>
                <p><!-- Farve: Hvid  VÃ¦gt: 175-176 gram--></p></td>
            <td class="purchase"><div class="purchform2"> <strong><?php e($currency); ?> <?php e(number_format($item['currency'][$currency]["totalprice_incl_vat"], 2, ',', '.')); ?></strong>
                <label style="display: none;">stk.</label>
                <span>
                                    <?php if (empty($item["basketevaluation_product"]) OR $item["basketevaluation_product"] == 0): ?>

                        <input type="hidden" name="items[<?php e($i); ?>][product_id]" value="<?php e($item["product_id"]); ?>" />
                        <input type="hidden" name="items[<?php e($i); ?>][product_variation_id]" value="<?php e($item["product_variation_id"]); ?>" />
                        <input type="text" name="items[<?php e($i); ?>][quantity]" size="2" value="<?php e($item["quantity"]); ?>" />
 <!--               <a class="plus" href="#">+</a> <a class="minus" href="#">-</a>--></span> </div>
        <?php $i++; ?>
        <?php endif; ?>

            </td>
        </tr>


        <?php endforeach; ?>
                        <tr class="totalrow">
                            <td class="imgleft">&nbsp;</td>
                            <td class="desc"><!--<p>Forsendelse &amp; ekspeditionsgebyr</p>-->
                                <p class="tot-inc">Total <span>incl. moms</span></p></td>
                            <td class="purchase"><!--><p>DKK 170,00</p>-->
                                <p><b><?php e($currency); ?> <?php e(number_format($total_price[$currency]['incl_vat'], 2, ',', '.')); ?></b></p></td>
                        </tr>

                    </table>
                    <p class="back"><a href="<?php e(url('../products')); ?>">Tilbage</a></p>
                    <p class="out"><a href="<?php e(url('details')); ?>">Til Kassen&nbsp;&nbsp;&nbsp;</a></p>
                    <div class="update">
                        <input type="submit" name="updatebutton"  value="Opdatér kurv" />
                    </div>
                </form>