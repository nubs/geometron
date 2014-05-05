<?php
namespace Nubs\Geometron;

use Nubs\Vectorix\Vector;
use PHPUnit_Framework_TestCase;

/**
 * @coversDefaultClass \Nubs\Geometron\LineSegment
 */
class LineSegmentTest extends PHPUnit_Framework_TestCase
{
    /**
     * Verify that a() returns the first point the line segment was constructed
     * with.
     *
     * @test
     * @uses \Nubs\Geometron\Point::__construct
     * @uses \Nubs\Geometron\Point::vector
     * @uses \Nubs\Geometron\Point::isSameSpace
     * @covers ::__construct
     * @covers ::a
     */
    public function a()
    {
        $a = new Point(new Vector(array(2, -1, -5)));
        $b = new Point(new Vector(array(3, 2, -7)));
        $lineSegment = new LineSegment($a, $b);

        $this->assertSame($a, $lineSegment->a());
    }

    /**
     * Verify that b() returns the second point the line segment was constructed
     * with.
     *
     * @test
     * @uses \Nubs\Geometron\Point::__construct
     * @uses \Nubs\Geometron\Point::vector
     * @uses \Nubs\Geometron\Point::isSameSpace
     * @covers ::__construct
     * @covers ::b
     */
    public function b()
    {
        $a = new Point(new Vector(array(2, -1, -5)));
        $b = new Point(new Vector(array(3, 2, -7)));
        $lineSegment = new LineSegment($a, $b);

        $this->assertSame($b, $lineSegment->b());
    }

    /**
     * Verify that the constructor fails if the points don't belong to the same
     * space.
     *
     * @test
     * @uses \Nubs\Geometron\Point::__construct
     * @uses \Nubs\Geometron\Point::vector
     * @uses \Nubs\Geometron\Point::isSameSpace
     * @covers ::__construct
     * @expectedException Exception
     * @expectedExceptionMessage The two points must be in the same geometric space
     */
    public function constructWithPointsOfDifferentSpace()
    {
        $a = new Point(new Vector(array(2, -1, -5)));
        $b = new Point(new Vector(array('x' => 3, 'y' => 2, 'z' => -7)));

        new LineSegment($a, $b);
    }
}
