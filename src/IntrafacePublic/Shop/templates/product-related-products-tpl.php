                    <?php if (!empty($related_products)): ?>


                    <h3 class="rel">Relaterede Produkter</h3>
                    <ul class="related">
        <?php foreach($related_products as $value): ?>
            <li><a href="<?php e(url('../' . $value['id'])); ?>"><?php e($value['name']); ?></a></li>
        <?php endforeach; ?>
                    </ul>

<?php endif; ?>