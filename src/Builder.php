<?php declare(strict_types = 1);

namespace Azibom\EasyRegex;

use function preg_match;
use function preg_quote;

class Builder
{

	/** @var string */
	private $source = '';

	public function match(string $string): bool
	{
		return (bool) preg_match($this->getRegex(), $string);
	}

	public function getRegex(): string
	{
		return '/' . $this->source . '/';
	}

	public function start(): self
	{
		$this->source .= '^';

		return $this;
	}

	public function end(): self
	{
		$this->source .= '$';

		return $this;
	}

	public function any(): self
	{
		$this->source .= '.';

		return $this;
	}

	public function digit(): self
	{
		$this->source .= '\d';

		return $this;
	}

	public function word(): self
	{
		$this->source .= '\w';

		return $this;
	}

	public function whitespace(): self
	{
		$this->source .= '\s';

		return $this;
	}

	public function see(string $value): self
	{
		$this->source .= '(' . $this->cleanup($value) . ')';

		return $this;
	}

	public function maybeSee(string $value): self
	{
		$this->source .= '(' . $this->cleanup($value) . ')?';

		return $this;
	}

	public function cleanup(string $string): string
	{
		return preg_quote($string, '/');
	}

	public function letter(): self
	{
		$this->source .= '([a-zA-Z])';

		return $this;
	}

	public function something(): self
	{
		$this->source .= '(?:.+)';

		return $this;
	}

	public function multiple(): self
	{
		$this->source .= '*';

		return $this;
	}

	public function oneOrMore(): self
	{
		$this->source .= '+';

		return $this;
	}

	public function zeroOrMore(): self
	{
		$this->source .= '*';

		return $this;
	}

	public function optional(): self
	{
		$this->source .= '?';

		return $this;
	}

	public function group(): void
	{
		$this->source .= '(' . $this->source . ')';
	}

}
