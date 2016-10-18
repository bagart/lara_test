<?php

class ValidateStringTest extends TestCase
{
    protected $helper;
    public function getValidator()
    {
        if (!$this->helper) {
            $this->helper = new \App\Helpers\ValidateString;
        }

        return $this->helper;
    }

    /**
     *  test brackets
     *
     * @return void
     */
    public function testBrackets()
    {
        $this->assertTrue(
            $this->getValidator()->isValidBrackets('{{[[]]}}')
        );
    }
}
