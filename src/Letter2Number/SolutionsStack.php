<?php


namespace Letter2Number;

/**
 * @package   Letter2Number
 * @author    Filip Klimes <filip@filipklimes.cz>
 */
class SolutionsStack
{

	/** @var array|string[] */
	protected $solutions;

	/**
	 * SolutionsStack constructor.
	 * @param array|string[] $solutions
	 */
	public function __construct(array $solutions = [])
	{
		$this->solutions = $solutions;
	}

	/**
	 * Adds letter to all solutions.
	 * @param string $letter
	 */
	public function addLetter($letter)
	{
		$this->solutions = $this->addLetterToArray($letter, $this->solutions);
	}

	/**
	 * Adds alternatives to all solutions.
	 * @param array|string[] $letters
	 */
	public function addAlternatives($letters)
	{
		$solutions = [];
		foreach ($letters as $letter) {
			$newSolutions = $this->addLetterToArray($letter, $this->solutions);
			$solutions = array_merge($solutions, $newSolutions);
		}
		$this->solutions = $solutions;
	}

	/**
	 * Returns all the solutions.
	 * @return array|string[]
	 */
	public function getSolutions()
	{
		return $this->solutions;
	}

	/**
	 * @param string         $letter
	 * @param array|string[] $array
	 * @return array|string[]
	 */
	private function addLetterToArray($letter, array $array)
	{
		if (empty($array)) {
			return [$letter];
		}

		return array_map(function($solution) use ($letter) {
			return $solution . $letter;
		}, $array);
	}

}
