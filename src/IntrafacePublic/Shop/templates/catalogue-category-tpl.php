<ul class="cat2">
    <?php foreach($categories as $category): ?>
        <li>
                    <h3><a href="<?php e($this->url('./'.$category['identifier'])); ?>"><?php e($category['name']); ?></a></h3>
                    <!--
                    <ul>
                        <li><img src="<?php e(url('/images/arrow3x5.gif')); ?>" alt="" width="3" height="5" /> <a href="#">Driver</a></li>
                    </ul>
                    -->
                </li>

    <?php endforeach; ?>
</ul>
