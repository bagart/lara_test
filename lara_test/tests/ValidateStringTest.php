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

    public function testMesting()
    {
        $this->assertTrue(
            $this->getValidator()->isValidNesting('123',[['1','2']])
        );
        $this->assertTrue(
            $this->getValidator()->isValidNesting('010203010',[['1','1'],['2','3']])
        );
        $this->assertFalse(
            $this->getValidator()->isValidNesting('010201030',[['1','1'],['2','3']])
        );
        $this->assertFalse(
            $this->getValidator()->isValidNesting('1123',[['1','2']])
        );
        $this->assertTrue(
            $this->getValidator()->isValidNesting('1123',[['1','1']])
        );

    }
    /**
     *  test brackets
     *
     * @return void
     */
    public function testBrackets()
    {
        $this->assertTrue(
            $this->getValidator()->isValidBrackets('')
        );
        $this->assertTrue(
            $this->getValidator()->isValidBrackets('00')
        );
        $this->assertTrue(
            $this->getValidator()->isValidBrackets('[]')
        );
        $this->assertTrue(
            $this->getValidator()->isValidBrackets('{}')
        );
        $this->assertTrue(
            $this->getValidator()->isValidBrackets('()')
        );

        $this->assertTrue(
            $this->getValidator()->isValidBrackets('0[]')
        );
        $this->assertTrue(
            $this->getValidator()->isValidBrackets('[0]')
        );
        $this->assertTrue(
            $this->getValidator()->isValidBrackets('[]0')
        );

        $this->assertTrue(
            $this->getValidator()->isValidBrackets('[0]0')
        );
        $this->assertTrue(
            $this->getValidator()->isValidBrackets('0[0]')
        );
        $this->assertTrue(
            $this->getValidator()->isValidBrackets('0[]0')
        );
        $this->assertTrue(
            $this->getValidator()->isValidBrackets('0[0]0')
        );


        $this->assertTrue(
            $this->getValidator()->isValidBrackets('{{{{}}}}')
        );
        $this->assertTrue(
            $this->getValidator()->isValidBrackets('{[{}]}')
        );
        $this->assertTrue(
            $this->getValidator()->isValidBrackets('({[{}]}({[{}]}{[{}]}))')
        );
        $this->assertTrue(
            $this->getValidator()->isValidBrackets('0{0[0{0}0]0}0{0[0{0}0]0}0{0[0{0}0]0}0')
        );
        $this->assertFalse(
            $this->getValidator()->isValidBrackets('[')
        );
        $this->assertFalse(
            $this->getValidator()->isValidBrackets('(')
        );
        $this->assertFalse(
            $this->getValidator()->isValidBrackets('{')
        );
        $this->assertFalse(
            $this->getValidator()->isValidBrackets(']')
        );
        $this->assertFalse(
            $this->getValidator()->isValidBrackets(')')
        );
        $this->assertFalse(
            $this->getValidator()->isValidBrackets('}')
        );
        $this->assertFalse(
            $this->getValidator()->isValidBrackets('[[]')
        );
        $this->assertFalse(
            $this->getValidator()->isValidBrackets('[{]')
        );
        $this->assertFalse(
            $this->getValidator()->isValidBrackets('0[0[0]0')
        );
        $this->assertFalse(
            $this->getValidator()->isValidBrackets('{[[]}')
        );
        $this->assertFalse(
            $this->getValidator()->isValidBrackets('[{[]}')
        );
        $this->assertFalse(
            $this->getValidator()->isValidBrackets(']{[]}')
        );
        $this->assertFalse(
            $this->getValidator()->isValidBrackets('][')
        );

        $this->assertFalse(
            $this->getValidator()->isValidBrackets('0][')
        );
        $this->assertFalse(
            $this->getValidator()->isValidBrackets(']0[')
        );
        $this->assertFalse(
            $this->getValidator()->isValidBrackets('][0')
        );

        $this->assertFalse(
            $this->getValidator()->isValidBrackets('0]0[')
        );
        $this->assertFalse(
            $this->getValidator()->isValidBrackets(']0[0')
        );
        $this->assertFalse(
            $this->getValidator()->isValidBrackets('0][0')
        );

        $this->assertFalse(
            $this->getValidator()->isValidBrackets('{][}')
        );
        $this->assertFalse(
            $this->getValidator()->isValidBrackets(']{}[')
        );
        $this->assertFalse(
            $this->getValidator()->isValidBrackets('[{]}')
        );
        $this->assertFalse(
            $this->getValidator()->isValidBrackets('0[0{0]0}0')
        );
        $this->assertFalse(
            $this->getValidator()->isValidBrackets('0[0{0]0}0')
        );
    }

    /**
     *  test brackets
     *
     * @return void
     */
    public function testQuotes()
    {
        $this->assertTrue(
            $this->getValidator()->isValidQuotes('')
        );
        $this->assertTrue(
            $this->getValidator()->isValidQuotes('""')
        );
        $this->assertTrue(
            $this->getValidator()->isValidQuotes('``')
        );
        $this->assertTrue(
            $this->getValidator()->isValidQuotes("''")
        );
        $this->assertTrue(
            $this->getValidator()->isValidQuotes('0""')
        );

        $this->assertTrue(
            $this->getValidator()->isValidQuotes('"0"')
        );
        $this->assertTrue(
            $this->getValidator()->isValidQuotes('""0')
        );
        $this->assertTrue(
            $this->getValidator()->isValidQuotes('""0')
        );

        $this->assertTrue(
            $this->getValidator()->isValidQuotes('0"0"')
        );
        $this->assertTrue(
            $this->getValidator()->isValidQuotes('"0"0')
        );
        $this->assertTrue(
            $this->getValidator()->isValidQuotes('0""0')
        );

        $this->assertTrue(
            $this->getValidator()->isValidQuotes('\'""\'')
        );
        $this->assertTrue(
            $this->getValidator()->isValidQuotes('"\'\'"')
        );
        $this->assertTrue(
            $this->getValidator()->isValidQuotes('`"\'\'"`')
        );


        $this->assertFalse(
            $this->getValidator()->isValidQuotes('"')
        );
        $this->assertFalse(
            $this->getValidator()->isValidQuotes("'")
        );
        $this->assertFalse(
            $this->getValidator()->isValidQuotes('`')
        );
        $this->assertFalse(
            $this->getValidator()->isValidQuotes('0`')
        );
        $this->assertFalse(
            $this->getValidator()->isValidQuotes('`0')
        );
        $this->assertFalse(
            $this->getValidator()->isValidQuotes('0`0')
        );

        $this->assertFalse(
            $this->getValidator()->isValidQuotes('`"`')
        );
        $this->assertFalse(
            $this->getValidator()->isValidQuotes('`"`"')
        );

        $this->assertFalse(
            $this->getValidator()->isValidQuotes('`""\'')
        );
        $this->assertFalse(
            $this->getValidator()->isValidQuotes('"""')
        );

        $this->assertFalse(
            $this->getValidator()->isValidQuotes('0"0"0"0')
        );

        $this->assertFalse(
            $this->getValidator()->isValidQuotes('0`0"0`0"0')
        );

    }
}
