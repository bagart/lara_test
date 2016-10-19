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
     * ready for multi-char
     * @var string[][]
     */
    protected $brackets = [
        ['[', ']'],
        ['{', '}'],
        ['(', ')'],
    ];

    protected $quotes = [
        ['"', '"'],
        ["'", "'"],
        ["`", "`"],
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
     * check valid quotes
     * @param $string
     * @return bool
     */
    public function isValidQuotes($string)
    {
        return $this->isValidNesting(
            $string,
            $this->quotes
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
        if (!is_string($string)) {
            return false;
        }
        $strlen = mb_strlen($string);

        if (!$tags_list || !$strlen) {
            return true;
        }
        $brackets = array_shift($tags_list);
        while ($brackets) {
            //find: last open before first end
            $pos_open = null;
            $pos_close = mb_strpos($string, $brackets[1]);
            if ($pos_close !== false) {
                if ($brackets[1] === $brackets[0]) {
                    $pos_open = $pos_close;
                    $pos_close = mb_strpos($string, $brackets[1], $pos_open + mb_strlen($brackets[0]));
                } else {
                    $pos_open = mb_strrpos(
                        $string,
                        $brackets[0],
                        $pos_close - $strlen
                    );
                }
            } else {
                if ($brackets[1] === $brackets[0]) {
                    $pos_open = $pos_close;
                } else {
                    $pos_open = mb_strpos(
                        $string,
                        $brackets[0]
                    );
                }
            }

            if ($pos_open === false || $pos_close === false) {
                if ($pos_open !== $pos_close) {
                    //var_dump('!<<< '.var_export($string, true).' >>> ' .implode(':', $brackets), $pos_open, $pos_close);
                    return false;
                }
                $brackets = array_shift($tags_list);
                continue;
            }
            // check middle for other nesting
            $pos_open_end = $pos_open + mb_strlen($brackets[0]);
            $middle = mb_substr(
                $string,
                $pos_open_end,
                $pos_close - $pos_open_end
            );
            if (!$this->isValidNesting($middle, $tags_list)) {
                return false;
            }
            unset($middle, $pos_open_end);
            // cut checked middle without recursive(optimizations)
            $string = (
                mb_substr(
                    $string,
                    0,
                    $pos_open
                )
                . mb_substr(
                    $string,
                    $pos_close + mb_strlen($brackets[1])
                )
            );
            $strlen = mb_strlen($string);
        }

        return true;
    }
}