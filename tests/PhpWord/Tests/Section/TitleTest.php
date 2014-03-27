<?php
/**
 * PHPWord
 *
 * @link        https://github.com/PHPOffice/PHPWord
 * @copyright   2014 PHPWord
 * @license     http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt LGPL
 */

namespace PhpOffice\PhpWord\Tests\Section;

use PhpOffice\PhpWord\Section\Title;

/**
 * Test class for PhpOffice\PhpWord\Section\Title
 *
 * @coversDefaultClass \PhpOffice\PhpWord\Section\Title
 * @runTestsInSeparateProcesses
 */
class TitleTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $oTitle = new Title('text');

        $this->assertInstanceOf('PhpOffice\\PhpWord\\Section\\Title', $oTitle);
        $this->assertEquals($oTitle->getText(), 'text');
    }

    public function testStyleNull()
    {
        $oTitle = new Title('text');

        $this->assertEquals($oTitle->getStyle(), null);
    }

    public function testStyleNotNull()
    {
        $oTitle = new Title('text', 1, 'style');

        $this->assertEquals($oTitle->getStyle(), 'style');
    }

    public function testAnchor()
    {
        $oTitle = new Title('text');

        $iVal = rand(1, 1000);
        $oTitle->setAnchor($iVal);
        $this->assertEquals($oTitle->getAnchor(), $iVal);
    }

    public function testBookmarkID()
    {
        $oTitle = new Title('text');

        $iVal = rand(1, 1000);
        $oTitle->setBookmarkId($iVal);
        $this->assertEquals($oTitle->getBookmarkId(), $iVal);
    }
}
