<?php

namespace Yarops\InlineStyler;

/**
 * Css rules class
 */
class Rules
{
	/**
	 * @var string
	 */
	public string $name = '';


	/**
	 * @var string
	 */
	public string $media_rule = '';

	/**
	 * @var false
	 */
	public bool $media_show = false;

	/**
	 * @var array
	 */
	public array $selectors = [];

	/**
	 * @param string $name
	 * @param string $rule
	 *
	 * @return object InlineStyler
	 */
	public function __construct(string $name, string $rule)
	{
		$this->name = $name;
		$this->media_rule = $rule;

		return $this;
	}

	/**
	 * @param string $selector
	 * @param array $rules
	 *
	 * @return object $this
	 */
	public function setRules( string $selector, string $suffix, array $rules) : object
	{

		foreach ($rules as $key => $value) {
			if (!empty($value)) {
				$this->selectors[$selector][$key] = $value . $suffix;
			}
		}

		if (!empty($this->media_rule && !empty($this->selectors))) {
			$this->media_show = true;
		}

		return $this;
	}
}
