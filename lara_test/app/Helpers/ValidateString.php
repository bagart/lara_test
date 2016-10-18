<?php
namespace App\Helpers;

/**
 *  Task: validates string looking like this "[{}]"
 *  Every opening bracket should have corresponding closing bracket of same type
 *  "[{}]" is a correct string, "[{]}" is malformed one.
 *
 * work with multi-byte character set(UTF) and multi-char bracket(tags)
*/

class ValidateString
{
    /**
     * important: {{ }} must be before { } for correct work
     * @var string[][]
     */
    protected $brackets = [
        ['[[', ']]'],
        ['{{', '}}'],
        ['((', '))'],
    ];

    /**
     * check valid brackets
     * @param $string
     * @return bool
     */
    public function isValidBrackets($string)
    {
        return $this->isValidNesting(
            $string,
            $this->brackets
        );
    }

    /**
     * check valid nesting
     * @param $string
     * @param array $tags_list
     * @return bool
     */
    public function isValidNesting($string, array $tags_list)
    {
        //@todo
    }
}