<?php

namespace Yarops\InlineStyler;

/**
 * Bootstrap class
 */
class Styler
{

	/**
	 * @var Rules[]
	 */
	private array $breakpoints = [];

	/**
	 * @param array $breakpoints
	 *
	 * @return void
	 */
	public function setMedia(array $breakpoints): void
	{
		array_walk($breakpoints, [$this, 'initializeBreakpoints']);
	}

	/**
	 * @param string $ruleName
	 *
	 * @return object Rules
	 */
	public function media(string $ruleName): object
	{
		return $this->breakpoints[$ruleName];
	}

	/**
	 * @param string $breakpointRule
	 * @param string $breakpointName
	 *
	 * @return void
	 */
	private function initializeBreakpoints(string $breakpointRule, string $breakpointName): void
	{
		$this->breakpoints[$breakpointName] = new Rules($breakpointName, $breakpointRule);
	}

	/**
	 * Render all styles
	 *
	 * @return void
	 */
	public function render(): void
	{
		$styles = $this->getStyles();

		if (!empty($styles)) {
			echo "<style>{$styles}</style>";
		}
	}

	/**
	 * Compose all styles
	 *
	 * @return string
	 */
	public function getStyles(): string
	{
		$styles = '';

		foreach ($this->breakpoints as $breakpoint) {
			if ($breakpoint->media_show) {
				$styles .= $breakpoint->media_rule . " {";
			}

			foreach ($breakpoint->selectors as $name => $rules) {
				$styles .= "{$name}{";
				foreach ($rules as $key => $value) {
					$styles .= $key . ': ' . $value . ';';
				}
				$styles .= '}';
			}

			if ($breakpoint->media_show) {
				$styles .= '}';
			}
		}

		return $styles;
	}
}