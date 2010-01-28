<ul class="cat">
        <?php foreach($categories as $category): ?>
    <?php
        $picture = $this->getCategoryPicture($category['id']);
        if (!empty($picture[0]['catalogue']['file_uri'])) {
            $picture_url = $picture[0]['catalogue']['file_uri'];
        } else {
            $picture_url = url('/images/cat174x111-1.jpg');
        }
    ?>

    	<li>
    		<a href="<?php e($this->url('./'.$category['identifier'])); ?>">
    		<img src="<?php e($picture_url); ?>" alt="<?php e($category['name']); ?>" width="145" height="111" /><?php e($category['name']); ?>
    		<span><!--Description--></span>
    		</a>
    	</li>
    <?php endforeach; ?>
</ul>
