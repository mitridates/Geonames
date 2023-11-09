<?php
namespace App\Geonames;

use App\Geonames\DQL\DistanceHaversine;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class Geonames extends Bundle
{
    public function boot()
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $em->getConfiguration()->addCustomNumericFunction(
            "DISTANCE_HAVERSINE", DistanceHaversine::class
        );
    }
}
