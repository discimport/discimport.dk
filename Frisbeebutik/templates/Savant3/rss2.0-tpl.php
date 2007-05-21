<?php
echo '<?xml version="1.0" encoding="iso-8859-1"?>';
?>
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/">
    <channel>
        <title><?php echo $this->title; ?></title>
        <link><?php echo $this->link; ?></link>
        <language><?php echo $this->language; ?></language>
        <description><?php echo $this->description; ?></description>
        <docs><?php echo $this->docs; ?></docs>

        <?php if (is_array($this->items) AND count($this->items) > 0): ?>

        <?php foreach ($this->items AS $item): ?>
        <item>
            <guid><?php echo $item['guid']; ?></guid>
            <title><?php echo $item['title']; ?></title>
            <description><?php echo $item['description']; ?></description>
            <pubDate><?php echo $item['pubDate']; ?></pubDate>
            <author><?php echo $item['author']; ?></author>
            <link><?php echo $item['link']; ?></link>
            <?php /*
            <enclosure url="<?php echo $item['enclosure']['link']; ?>" length="<?php echo $item['enclosure']['length']; ?>" type="<?php echo $item['enclosure']['mime_type']; ?>" />
            */
            ?>
        </item>
        <?php endforeach; ?>

        <?php endif; ?>
    </channel>
</rss>
