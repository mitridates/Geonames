<?php

namespace App\Geonames\Repository;
use App\Geonames\lib\Boundary;
use App\Coordinates\lib\Geoconstants;
use Doctrine\ORM\EntityRepository;

/**
 * Class GeonamesRepository
 * @package App\Mitridates\Geonames\Repository
 */
class GeonamesRepository extends EntityRepository
{
    use RepositoryTrait;

    /**
     * Get results within radius.
     * @param $lat
     * @param $lng
     * @param $radius
     * @param $unit
     * @return array;
     */
    public function findNearByLatLng($lat, $lng, $radius, $unit)
    {
        $alias = 'g';
        $qb = $this->createQueryBuilder($alias);
        $qb->select($alias);

        $boundary = Boundary::getBoundary($lat,$lng,$radius,$unit);

        /** HAVERSINE FORMULA **/
        $qb->addSelect('(:EarthRadius * DISTANCE_HAVERSINE(' . $alias . '.latitude, ' . $alias . '.longitude, :thatlat, :thatlng)) AS distance')
            ->setParameter('thatlat', $lat)
            ->setParameter('thatlng', $lng)
            ->having('distance <= :distance')
            ->setParameter('distance', $radius)
            ->setParameter('EarthRadius', Geoconstants::getEarthRadius($unit));

        $qb->where($alias . '.latitude >= :MinLatitude')
            ->andWhere($alias . '.latitude <= :MaxLatitude')
            ->andWhere($alias . '.longitude >= :MinLongitude')
            ->andWhere($alias . '.longitude <= :MaxLongitude')
            ->setParameter('MaxLatitude', $boundary['north'])
            ->setParameter('MinLatitude', $boundary['south'])
            ->setParameter('MaxLongitude', $boundary['east'])
            ->setParameter('MinLongitude', $boundary['west']);

        //ADD FILTER EXPRESSION

        //ADD ORDER BY
        $qb->orderBy('distance', 'ASC');

        //ADD MAX ROWS

        $query = $qb->getQuery();
        return $query->getResult();
    }

}