<?php
namespace Nubs\Geometron;

/**
 * This represents a finite geometrical object (e.g., points, line segments) and
 * what operations they support.
 */
interface Finite
{
    /**
     * Returns the point at the geometric center of the object.
     *
     * @api
     * @return \Nubs\Geometron\Point A center point of the object.
     */
    public function center();
}
