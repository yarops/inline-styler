<?php
if (!file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
	die('Error locating autoloader. Please run <code>composer install</code>.');
}
require $composer;

$styler = new \Yarops\InlineStyler\Styler();
$styler->setMedia([
	'all' => '',
	'xs' => '@media (min-width: 520px)',
	'sm' => '@media (min-width: 768px)',
	'md' => '@media (min-width: 992px)',
	'lg' => '@media (min-width: 1200px)'
]);

$styler->media('all')->setRules('.block', [
	'padding-top' => '20px',
	'padding-bottom' => '20px',
]);

$styler->media('xs')->setRules('.block', [
	'padding-top' => '10px',
	'padding-bottom' => '10px',
	'padding-left' => '',
]);
?>
<!doctype html>
<html lang="en">
<head>
	<title>This is the title of the webpage!</title>
</head>
<body>
<p>Example render styles</p>
<pre>
<?php $styler->render(); ?>
</pre>
</body>
</html>

