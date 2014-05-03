<?php
namespace Nubs\Geometron;

use Nubs\Vectorix\Vector;
use PHPUnit_Framework_TestCase;

/**
 * @coversDefaultClass \Nubs\Geometron\Point
 */
class PointTest extends PHPUnit_Framework_TestCase
{
    /**
     * Verify that terms() returns the same terms the point was constructed
     * with.
     *
     * In particular, this makes sure that the keys are left alone.
     *
     * @test
     * @covers ::__construct
     * @covers ::terms
     */
    public function termsMaintainStructure()
    {
        $terms = array(3, 1.8, 'z' => -4.712);
        $point = new Point(new Vector($terms));

        $this->assertSame($terms, $point->terms());
    }
}
