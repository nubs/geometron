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
     * Creates a point from its terms.
     *
     * @api
     * @param array<int|float> $terms The terms (x, y, z, etc.) of the point.
     * @return self The point with the given terms.
     */
    public static function createFromTerms(array $terms)
    {
        return new static(new Vector($terms));
    }

    /**
     * Get the vector representing the point's location.
     *
     * @api
     * @return \Nubs\Vectorix\Vector The vector representing the point.
     */
    public function vector()
    {
        return $this->_vector;
    }

    /**
     * Get the terms of the point.
     *
     * @api
     * @return array<int|float> The terms of the point.
     */
    public function terms()
    {
        return $this->vector()->components();
    }
}
