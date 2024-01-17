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
Next add selectors and css rules to breakpoints. Rules with empty values are discarded. Function for add rules
```php
setRules(string $selector, string $suffix, array $rules);
```
where 
```$selector``` is string with css selector
```$suffix``` A suffix is a string that will be added to the end of the value for each rule in the set. For example it can be used to add 'px' to a numeric value if needed
```$rules``` is array of css rules as ```[$key => $value]```

Example usage:
```php
    // With suffix
$styler->media('all')->setRules('.block', 'px' [
	'padding-top' => '20',
	'padding-bottom' => '20',
]);

// Without suffix
$styler->media('xs')->setRules('.block', '', [
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