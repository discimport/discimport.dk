<?php 
echo '<?xml version="1.0" encoding="iso-8859-1"?>';
?>
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/">
	<channel>
		<title><?php echo $title; ?></title>
		<link><?php echo $link; ?></link>
		<language><?php echo $language; ?></language>
		<description><?php echo $description; ?></description>
		<docs><?php echo $docs; ?></docs>
		
		<?php if (is_array($items)): ?>
		
		<?php foreach ($items AS $item): ?>
		<item>
			<guid><?php echo $item['guid']; ?></guid>
			<title><?php echo $item['title']; ?></title>
			<description><?php echo $item['description']; ?></description>
			<pubDate><?php echo $item['pubDate']; ?></pubDate>
			<author><?php echo $item['author']; ?></author>
			<link><?php echo $item['link']; ?></link>
			<enclosure url="<?php echo $item['enclosure']['link']; ?>" length="<?php echo $item['enclosure']['length']; ?>" type="<?php echo $item['enclosure']['mime_type']; ?>" />
		</item>
		<?php endforeach; ?>
		
		<?php endif; ?>
	</channel>
</rss>
