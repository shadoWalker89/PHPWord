<?php
/**
 * PHPWord
 *
 * @link        https://github.com/PHPOffice/PHPWord
 * @copyright   2014 PHPWord
 * @license     http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt LGPL
 */

namespace PhpOffice\PhpWord\Tests\Section;

use PhpOffice\PhpWord\Section\Settings;

/**
 * Test class for PhpOffice\PhpWord\Section\Settings
 *
 * @coversDefaultClass \PhpOffice\PhpWord\Section\Settings
 * @runTestsInSeparateProcesses
 */
class SettingsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Executed before each method of the class
     */
    public function testSettingValue()
    {
        // Section Settings
        $oSettings = new Settings();

        $oSettings->setSettingValue('_orientation', 'landscape');
        $this->assertEquals('landscape', $oSettings->getOrientation());
        $this->assertEquals(16838, $oSettings->getPageSizeW());
        $this->assertEquals(11906, $oSettings->getPageSizeH());

        $oSettings->setSettingValue('_orientation', null);
        $this->assertNull($oSettings->getOrientation());
        $this->assertEquals(11906, $oSettings->getPageSizeW());
        $this->assertEquals(16838, $oSettings->getPageSizeH());

        $iVal = rand(1, 1000);
        $oSettings->setSettingValue('_borderSize', $iVal);
        $this->assertEquals(array($iVal, $iVal, $iVal, $iVal), $oSettings->getBorderSize());
        $this->assertEquals($iVal, $oSettings->getBorderBottomSize());
        $this->assertEquals($iVal, $oSettings->getBorderLeftSize());
        $this->assertEquals($iVal, $oSettings->getBorderRightSize());
        $this->assertEquals($iVal, $oSettings->getBorderTopSize());

        $oSettings->setSettingValue('_borderColor', 'FF00AA');
        $this->assertEquals(array('FF00AA', 'FF00AA', 'FF00AA', 'FF00AA'), $oSettings->getBorderColor());
        $this->assertEquals('FF00AA', $oSettings->getBorderBottomColor());
        $this->assertEquals('FF00AA', $oSettings->getBorderLeftColor());
        $this->assertEquals('FF00AA', $oSettings->getBorderRightColor());
        $this->assertEquals('FF00AA', $oSettings->getBorderTopColor());

        $iVal = rand(1, 1000);
        $oSettings->setSettingValue('headerHeight', $iVal);
        $this->assertEquals($iVal, $oSettings->getHeaderHeight());
    }

    public function testMargin()
    {
        // Section Settings
        $oSettings = new Settings();

        $iVal = rand(1, 1000);
        $oSettings->setMarginTop($iVal);
        $this->assertEquals($iVal, $oSettings->getMarginTop());

        $iVal = rand(1, 1000);
        $oSettings->setMarginBottom($iVal);
        $this->assertEquals($iVal, $oSettings->getMarginBottom());

        $iVal = rand(1, 1000);
        $oSettings->setMarginLeft($iVal);
        $this->assertEquals($iVal, $oSettings->getMarginLeft());

        $iVal = rand(1, 1000);
        $oSettings->setMarginRight($iVal);
        $this->assertEquals($iVal, $oSettings->getMarginRight());
    }

    public function testOrientationLandscape()
    {
        // Section Settings
        $oSettings = new Settings();

        $oSettings->setLandscape();
        $this->assertEquals('landscape', $oSettings->getOrientation());
        $this->assertEquals(16838, $oSettings->getPageSizeW());
        $this->assertEquals(11906, $oSettings->getPageSizeH());
    }

    public function testOrientationPortrait()
    {
        // Section Settings
        $oSettings = new Settings();

        $oSettings->setPortrait();
        $this->assertNull($oSettings->getOrientation());
        $this->assertEquals(11906, $oSettings->getPageSizeW());
        $this->assertEquals(16838, $oSettings->getPageSizeH());
    }

    public function testBorderSize()
    {
        // Section Settings
        $oSettings = new Settings();

        $iVal = rand(1, 1000);
        $oSettings->setBorderSize($iVal);
        $this->assertEquals(array($iVal, $iVal, $iVal, $iVal), $oSettings->getBorderSize());
        $this->assertEquals($iVal, $oSettings->getBorderBottomSize());
        $this->assertEquals($iVal, $oSettings->getBorderLeftSize());
        $this->assertEquals($iVal, $oSettings->getBorderRightSize());
        $this->assertEquals($iVal, $oSettings->getBorderTopSize());

        $iVal = rand(1, 1000);
        $oSettings->setBorderBottomSize($iVal);
        $this->assertEquals($iVal, $oSettings->getBorderBottomSize());

        $iVal = rand(1, 1000);
        $oSettings->setBorderLeftSize($iVal);
        $this->assertEquals($iVal, $oSettings->getBorderLeftSize());

        $iVal = rand(1, 1000);
        $oSettings->setBorderRightSize($iVal);
        $this->assertEquals($iVal, $oSettings->getBorderRightSize());

        $iVal = rand(1, 1000);
        $oSettings->setBorderTopSize($iVal);
        $this->assertEquals($iVal, $oSettings->getBorderTopSize());
    }

    public function testBorderColor()
    {
        // Section Settings
        $oSettings = new Settings();

        $oSettings->setBorderColor('FF00AA');
        $this->assertEquals(array('FF00AA', 'FF00AA', 'FF00AA', 'FF00AA'), $oSettings->getBorderColor());
        $this->assertEquals('FF00AA', $oSettings->getBorderBottomColor());
        $this->assertEquals('FF00AA', $oSettings->getBorderLeftColor());
        $this->assertEquals('FF00AA', $oSettings->getBorderRightColor());
        $this->assertEquals('FF00AA', $oSettings->getBorderTopColor());

        $oSettings->setBorderBottomColor('BBCCDD');
        $this->assertEquals('BBCCDD', $oSettings->getBorderBottomColor());

        $oSettings->setBorderLeftColor('CCDDEE');
        $this->assertEquals('CCDDEE', $oSettings->getBorderLeftColor());

        $oSettings->setBorderRightColor('11EE22');
        $this->assertEquals('11EE22', $oSettings->getBorderRightColor());

        $oSettings->setBorderTopColor('22FF33');
        $this->assertEquals('22FF33', $oSettings->getBorderTopColor());
    }

    public function testNumberingStart()
    {
        // Section Settings
        $oSettings = new Settings();

        $this->assertNull($oSettings->getPageNumberingStart());

        $iVal = rand(1, 1000);
        $oSettings->setPageNumberingStart($iVal);
        $this->assertEquals($iVal, $oSettings->getPageNumberingStart());

        $oSettings->setPageNumberingStart();
        $this->assertNull($oSettings->getPageNumberingStart());
    }

    public function testHeader()
    {
        // Section Settings
        $oSettings = new Settings();

        $this->assertEquals(720, $oSettings->getHeaderHeight());

        $iVal = rand(1, 1000);
        $oSettings->setHeaderHeight($iVal);
        $this->assertEquals($iVal, $oSettings->getHeaderHeight());

        $oSettings->setHeaderHeight();
        $this->assertEquals(720, $oSettings->getHeaderHeight());
    }

    public function testFooter()
    {
        // Section Settings
        $oSettings = new Settings();

        $this->assertEquals(720, $oSettings->getFooterHeight());

        $iVal = rand(1, 1000);
        $oSettings->setFooterHeight($iVal);
        $this->assertEquals($iVal, $oSettings->getFooterHeight());

        $oSettings->setFooterHeight();
        $this->assertEquals(720, $oSettings->getFooterHeight());
    }

    public function testColumnsNum()
    {
        // Section Settings
        $oSettings = new Settings();

        // Default
        $this->assertEquals(1, $oSettings->getColsNum());

        $iVal = rand(1, 1000);
        $oSettings->setColsNum($iVal);
        $this->assertEquals($iVal, $oSettings->getColsNum());

        $oSettings->setColsNum();
        $this->assertEquals(1, $oSettings->getColsNum());
    }

    public function testColumnsSpace()
    {
        // Section Settings
        $oSettings = new Settings();

        // Default
        $this->assertEquals(720, $oSettings->getColsSpace());

        $iVal = rand(1, 1000);
        $this->assertInstanceOf('PhpOffice\\PhpWord\\Section\\Settings', $oSettings->setColsSpace($iVal));
        $this->assertEquals($iVal, $oSettings->getColsSpace());

        $this->assertInstanceOf('PhpOffice\\PhpWord\\Section\\Settings', $oSettings->setColsSpace());
        $this->assertEquals(720, $oSettings->getColsSpace());
    }

    public function testBreakType()
    {
        // Section Settings
        $oSettings = new Settings();

        $this->assertNull($oSettings->getBreakType());

        $oSettings->setBreakType('continuous');
        $this->assertEquals('continuous', $oSettings->getBreakType());

        $oSettings->setBreakType();
        $this->assertNull($oSettings->getBreakType());
    }
}
