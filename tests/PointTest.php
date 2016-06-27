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
     * Verify that vector() returns the same vector the point was constructed
     * with.
     *
     * @test
     * @covers ::__construct
     * @covers ::vector
     */
    public function vector()
    {
        $vector = new Vector([2, -1, -5]);
        $point = new Point($vector);

        $this->assertSame($vector, $point->vector());
    }

    /**
     * Verify that terms() returns the same terms the point was constructed
     * with.
     *
     * In particular, this makes sure that the keys are left alone.
     *
     * @test
     * @covers ::__construct
     * @covers ::terms
     * @uses \Nubs\Geometron\Point::vector
     */
    public function termsMaintainStructure()
    {
        $terms = [3, 1.8, 'z' => -4.712];
        $point = new Point(new Vector($terms));

        $this->assertSame($terms, $point->terms());
    }

    /**
     * Verify that createFromTerms creates the point correctly.
     *
     * In particular, this makes sure that the keys are left alone.
     *
     * @test
     * @covers ::createFromTerms
     * @covers ::terms
     * @uses \Nubs\Geometron\Point::__construct
     * @uses \Nubs\Geometron\Point::vector
     */
    public function createFromTermsMaintainStructure()
    {
        $terms = [3, 1.8, 'z' => -4.712];
        $point = Point::createFromTerms($terms);

        $this->assertSame($terms, $point->terms());
    }

    /**
     * Verify that the dimension of the point is correct.
     *
     * @test
     * @covers ::dimension
     * @uses \Nubs\Geometron\Point::__construct
     * @uses \Nubs\Geometron\Point::vector
     */
    public function dimensionIsCorrect()
    {
        $point = new Point(new Vector([5, 2, 1]));
        $this->assertSame(3, $point->dimension());
    }

    /**
     * Verify that 2 equal points are considered the same.
     *
     * @test
     * @uses \Nubs\Geometron\Point::__construct
     * @uses \Nubs\Geometron\Point::vector
     * @covers ::isEqual
     */
    public function isEqualWithSamePoints()
    {
        $a = new Point(new Vector([1, 2, 3]));
        $b = new Point(new Vector([1, 2, 3]));
        $this->assertTrue($a->isEqual($b), 'Points with same terms are equal');
    }

    /**
     * Verify that 2 different points are not considered the same.
     *
     * @test
     * @uses \Nubs\Geometron\Point::__construct
     * @uses \Nubs\Geometron\Point::vector
     * @covers ::isEqual
     */
    public function isEqualWithDifferentPoints()
    {
        $a = new Point(new Vector([1, 2, 3]));
        $b = new Point(new Vector([9, 2, 3]));
        $this->assertFalse($a->isEqual($b), 'Points with different terms are not equal');
    }

    /**
     * Verify that 2 same-space points are considered the same space.
     *
     * @test
     * @uses \Nubs\Geometron\Point::__construct
     * @uses \Nubs\Geometron\Point::vector
     * @covers ::isSameSpace
     */
    public function isSameSpaceWithSameSpacePoints()
    {
        $a = new Point(new Vector([1, 2, 3]));
        $b = new Point(new Vector([5, 7, 2]));
        $this->assertTrue($a->isSameSpace($b), 'Points with same space are of the same space');
    }

    /**
     * Verify that 2 different-dimension points are not considered the same
     * space.
     *
     * @test
     * @uses \Nubs\Geometron\Point::__construct
     * @uses \Nubs\Geometron\Point::vector
     * @covers ::isSameSpace
     */
    public function isSameSpaceWithDifferentDimensionPoints()
    {
        $a = new Point(new Vector([1, 2, 3]));
        $b = new Point(new Vector([5, 7]));
        $this->assertFalse($a->isSameSpace($b), 'Points with different dimension are not of the same space');
    }

    /**
     * Verify that 2 differently keyed points are not considered the same space.
     *
     * @test
     * @uses \Nubs\Geometron\Point::__construct
     * @uses \Nubs\Geometron\Point::vector
     * @covers ::isSameSpace
     */
    public function isSameSpaceWithDifferentlyKeyedPoints()
    {
        $a = new Point(new Vector([1, 2, 3]));
        $b = new Point(new Vector(['x' => 5, 'y' => 7, 'z' => 2]));
        $this->assertFalse($a->isSameSpace($b), 'Points with different keys are not of the same space');
    }

    /**
     * Verify that a point's center is the same point.
     *
     * @test
     * @uses \Nubs\Geometron\Point::__construct
     * @uses \Nubs\Geometron\Point::vector
     * @uses \Nubs\Geometron\Point::terms
     * @covers ::center
     */
    public function center()
    {
        $a = new Point(new Vector([5, 7, 9]));
        $center = $a->center();
        $this->assertSame($a->terms(), $center->terms());
    }
}
