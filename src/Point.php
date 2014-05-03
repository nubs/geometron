<?php
namespace Nubs\Geometron;

use Nubs\Vectorix\Vector;

/**
 * This class represents an immutable point in euclidean geometry and its
 * associated operations.
 *
 * Instances of this class will not change state.  Any operations on the point
 * will return a new vector with the new state.
 */
class Point
{
    /** @type \Nubs\Vectorix\Vector A vector representing the point. */
    protected $_vector;

    /**
     * Initalize the point from a vector.
     *
     * @api
     * @param \Nubs\Vectorix\Vector $vector The vector representing the point's terms.
     */
    public function __construct(Vector $vector)
    {
        $this->_vector = $vector;
    }

    /**
     * Get the terms of the point.
     *
     * @api
     * @return array<int|float> The terms of the point.
     */
    public function terms()
    {
        return $this->_vector->components();
    }
}
