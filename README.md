## Install
```
composer require yarops/inline-styler
```

## Usage
initialize breakpoints. To add css rules without media query use alias with empty string ("all" in example)
 
```php
$styler = new \Yarops\InlineStyler\Styler();
$styler->setMedia([
	'all' => '',
	'xs' => '@media (min-width: 520px)',
	'sm' => '@media (min-width: 768px)',
	'md' => '@media (min-width: 992px)',
	'lg' => '@media (min-width: 1200px)'
]);
```
Next add selectors and css rules to breakpoints. Rules with empty values are discarded.
```php
    $styler->media('all')->setRules('.block', [
	'padding-top' => '20px',
	'padding-bottom' => '20px',
]);

$styler->media('xs')->setRules('.block', [
	'padding-top' => '10px',
	'padding-bottom' => '10px',
	'padding-left' => '',
]);
```
Finally render ```<style>``` tags
```php
    <style>
        <?php $styler->render() ;?>
    </style>
```