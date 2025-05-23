<?php

namespace Clickbar\Magellan\Data\Geometries;

use Clickbar\Magellan\Cast\GeometryCast;

class MultiPoint extends PointCollection
{
    /**
     * @param  Point[]  $points
     */
    public static function make(array $points, ?int $srid = null, Dimension $dimension = Dimension::DIMENSION_2D): self
    {
        return new self($points, $srid, $dimension);
    }

    /** @return GeometryCast<MultiPoint> */
    public static function castUsing(array $arguments): GeometryCast
    {
        return new GeometryCast(MultiPoint::class);
    }
}
