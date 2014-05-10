<?php
namespace Nubs\Geometron;

use Exception;

/**
 * This class represents an immutable line segment in euclidean geometry and its
 * associated operations.
 *
 * Instances of this class will not change state.  Any operations on the line
 * segment will return a new line segment with the new state.
 */
class LineSegment
{
    /** @type \Nubs\Geometron\Point One endpoint of the line segment. */
    protected $_a;

    /** @type \Nubs\Geometron\Point One endpoint of the line segment. */
    protected $_b;

    /**
     * Initalize the line segment with its two endpoints.
     *
     * @api
     * @param \Nubs\Geometron\Point $a One endpoint of the line segment.
     * @param \Nubs\Geometron\Point $b One endpoint of the line segment.
     */
    public function __construct(Point $a, Point $b)
    {
        if (!$a->isSameSpace($b)) {
            throw new Exception('The two points must be in the same geometric space');
        }

        $this->_a = $a;
        $this->_b = $b;
    }

    /**
     * Get an endpoint of the line segment.
     *
     * @api
     * @return \Nubs\Geometron\Point One endpoint of the line segment.
     */
    public function a()
    {
        return $this->_a;
    }

    /**
     * Get an endpoint of the line segment.
     *
     * @api
     * @return \Nubs\Geometron\Point One endpoint of the line segment.
     */
    public function b()
    {
        return $this->_b;
    }

    /**
     * Determine whether this line segment is degenerate.
     *
     * A line segment is degenerate if its two points are the same.
     *
     * @api
     * @return bool True if the line segment is degenerate, false otherwise.
     */
    public function isDegenerate()
    {
        return $this->a()->isEqual($this->b());
    }
}
