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

    /**
     * Verify that isDegenerate detects degenerate points.
     *
     * @test
     * @uses \Nubs\Geometron\Point::__construct
     * @uses \Nubs\Geometron\Point::vector
     * @uses \Nubs\Geometron\Point::isSameSpace
     * @uses \Nubs\Geometron\Point::isEqual
     * @uses \Nubs\Geometron\LineSegment::__construct
     * @uses \Nubs\Geometron\LineSegment::a
     * @uses \Nubs\Geometron\LineSegment::b
     * @covers ::isDegenerate
     */
    public function isDegenerateWithDegenerateLine()
    {
        $a = new Point(new Vector(array(1, 7, 5)));
        $b = new Point(new Vector(array(1, 7, 5)));
        $line = new LineSegment($a, $b);

        $this->assertTrue($line->isDegenerate());
    }

    /**
     * Verify that isDegenerate detects nondegenerate points.
     *
     * @test
     * @uses \Nubs\Geometron\Point::__construct
     * @uses \Nubs\Geometron\Point::vector
     * @uses \Nubs\Geometron\Point::isSameSpace
     * @uses \Nubs\Geometron\Point::isEqual
     * @uses \Nubs\Geometron\LineSegment::__construct
     * @uses \Nubs\Geometron\LineSegment::a
     * @uses \Nubs\Geometron\LineSegment::b
     * @covers ::isDegenerate
     */
    public function isDegenerateWithNondegenerateLine()
    {
        $a = new Point(new Vector(array(1, 7, 5)));
        $b = new Point(new Vector(array(8, 7, 5)));
        $line = new LineSegment($a, $b);

        $this->assertFalse($line->isDegenerate());
    }

    /**
     * Verify that vector() returns the correct vector.
     *
     * @test
     * @uses \Nubs\Geometron\Point::__construct
     * @uses \Nubs\Geometron\Point::vector
     * @uses \Nubs\Geometron\Point::isSameSpace
     * @uses \Nubs\Geometron\LineSegment::__construct
     * @uses \Nubs\Geometron\LineSegment::a
     * @uses \Nubs\Geometron\LineSegment::b
     * @covers ::vector
     */
    public function vectorBetweenSimplePoints()
    {
        $a = new Point(new Vector(array(1, 3)));
        $b = new Point(new Vector(array(5, 7)));
        $line = new LineSegment($a, $b);

        $expected = new Vector(array(4, 4));
        $this->assertTrue($expected->isEqual($line->vector()));
    }

    /**
     * Verify that vector() returns the correct vector between a degenerate line
     * segment.
     *
     * @test
     * @uses \Nubs\Geometron\Point::__construct
     * @uses \Nubs\Geometron\Point::vector
     * @uses \Nubs\Geometron\Point::isSameSpace
     * @uses \Nubs\Geometron\LineSegment::__construct
     * @uses \Nubs\Geometron\LineSegment::a
     * @uses \Nubs\Geometron\LineSegment::b
     * @covers ::vector
     */
    public function vectorOfDegenerateLineSegment()
    {
        $a = new Point(new Vector(array(1, 3)));
        $b = new Point(new Vector(array(1, 3)));
        $line = new LineSegment($a, $b);

        $expected = new Vector(array(0, 0));
        $this->assertTrue($expected->isEqual($line->vector()));
    }

    /**
     * Verify that the length method works correctly.
     *
     * @test
     * @uses \Nubs\Geometron\Point::__construct
     * @uses \Nubs\Geometron\Point::terms
     * @uses \Nubs\Geometron\Point::vector
     * @uses \Nubs\Geometron\Point::isSameSpace
     * @uses \Nubs\Geometron\LineSegment::__construct
     * @uses \Nubs\Geometron\LineSegment::a
     * @uses \Nubs\Geometron\LineSegment::b
     * @uses \Nubs\Geometron\LineSegment::vector
     * @covers ::length
     */
    public function length()
    {
        $a = new Point(new Vector(array(7, 9)));
        $b = new Point(new Vector(array(4, 5)));
        $line = new LineSegment($a, $b);

        $this->assertEquals(5.0, $line->length(), '', 1e-10);
    }

    /**
     * Verify that center returns the center point of a line segment.
     *
     * @test
     * @uses \Nubs\Geometron\Point::__construct
     * @uses \Nubs\Geometron\Point::terms
     * @uses \Nubs\Geometron\Point::vector
     * @uses \Nubs\Geometron\Point::isSameSpace
     * @uses \Nubs\Geometron\LineSegment::__construct
     * @uses \Nubs\Geometron\LineSegment::a
     * @uses \Nubs\Geometron\LineSegment::b
     * @uses \Nubs\Geometron\LineSegment::vector
     * @covers ::center
     */
    public function center()
    {
        $a = new Point(new Vector(array(7, 9)));
        $b = new Point(new Vector(array(13, 17)));
        $line = new LineSegment($a, $b);
        $centerTerms = $line->center()->terms();

        $this->assertEquals(10.0, $centerTerms[0], '', 1e-10);
        $this->assertEquals(13.0, $centerTerms[1], '', 1e-10);
    }
}
