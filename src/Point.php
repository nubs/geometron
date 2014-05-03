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
     * Initalize the point with its terms.
     *
     * @api
     * @param array<int|float> $terms The terms (x, y, z, etc.) of the point.
     */
    public function __construct(array $terms)
    {
        $this->_vector = new Vector($terms);
    }

    /**
     * Get the terms of the point.
     *
     * @return array<int|float> The terms of the point.
     */
    public function terms()
    {
        return $this->_vector->components();
    }
}
