            <ul class="cat">
            <!-- use class="current" -->
                <?php foreach($categories as $category): ?>
                    <li><a href="<?php e($this->url('./'.$category['identifier'])); ?>"><img src="<?php e(url('/images/cat174x111-1.jpg')); ?>" alt="cat 1 image" width="174" height="111" /><?php e($category['name']); ?><span><!--Description--></span></a></li>
                <?php endforeach; ?>
            </ul>