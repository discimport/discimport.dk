<?php if (is_array($product['pictures']) AND array_key_exists(0, $product['pictures'])): ?>
    <img id="picture" src="<?php e($product['pictures'][0]['thumbnail']['file_uri']); ?>" alt="<?php e($product['name']); ?>" width="<?php e($product['pictures'][0]['thumbnail']['width']); ?>" height="<?php e($product['pictures'][0]['thumbnail']['height']); ?>" />
<?php endif; ?>