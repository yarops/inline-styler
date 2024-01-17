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
		foreach ($this->breakpoints as $breakpoint) {
			if ($breakpoint->media_show) {
				echo $breakpoint->media_rule . " {";
			}
			foreach ($breakpoint->selectors as $name => $rules) {
				echo "{$name}{";
				foreach ($rules as $key => $value) {
					echo $key . ': ' . $value . ';';
				}
				echo '}';
			}
			if ($breakpoint->media_show) {
				echo '}';
			}
		}
	}
}