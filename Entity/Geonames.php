<?php

namespace App\Geonames\Entity;

use App\Geonames\Repository\GeonamesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Geonames
 */
#[ORM\Table(name: 'geonames_geonames')]
#[ORM\Entity(repositoryClass: GeonamesRepository::class)]
class Geonames implements \Stringable
{
    /**
     * @var integer Geonameid
     */
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private int $id;

    /**
     * @var string Name of geographical point (utf8) varchar(200)
     */
    #[ORM\Column(name: 'name', type: 'string', length: 200, nullable: false)]
    private ?string $name = null;

    /**
     * @var string Name of geographical point in plain ascii characters, varchar(200)
     */
    #[ORM\Column(name: 'asciiname', type: 'string', length: 200, nullable: true)]
    private ?string $asciiname = null;

    #[ORM\Column(name: 'latitude', type: 'decimal', precision: 10, scale: 7, nullable: true)]
    private ?float $latitude = null;

    #[ORM\Column(name: 'longitude', type: 'decimal', precision: 10, scale: 7, nullable: true)]
    private ?float $longitude = null;

    /**
     * @var string feature class
     */
    #[ORM\Column(name: 'featureclass', type: 'string', length: 1, nullable: true)]
    private ?string $featureclass = null;

    /**
     * @var string feature code
     */
    #[ORM\Column(name: 'featurecode', type: 'string', length: 8, nullable: true)]
    private ?string $featurecode = null;

    /**
     * @var string Country cc2
     */
    #[ORM\Column(name: 'country_id', type: 'string', length: 2, nullable: true)]
    private ?string $country = null;

    /**
     * Alternate country codes, comma separated, ISO-3166 2-letter country code (cc2)
     */
    #[ORM\Column(name: 'cc2', type: 'string', length: 60, nullable: true)]
    private ?string $cc2 = null;

    /**
     * @var string ADM1
     */
    #[ORM\Column(name: 'admin1_id', type: 'string', length: 20, nullable: true)]
    private ?string $admin1 = null;

    /**
     * @var string ADM2
     */
    #[ORM\Column(name: 'admin2_id', type: 'string', length: 25, nullable: true)]
    private ?string $admin2 = null;

    /**
     * @var string ADM3
     */
    #[ORM\Column(name: 'admin3_id', type: 'string', length: 30, nullable: true)]
    private ?string $admin3 = null;

    /**
     * @var string ADM4
     */
    #[ORM\Column(name: 'admin4_id', type: 'string', length: 40, nullable: true)]
    private ?string $admin4 = null;

    #[ORM\Column(name: 'population', type: 'integer', nullable: true)]
    private ?int $population = null;

    #[ORM\Column(name: 'elevation', type: 'integer', nullable: true)]
    private ?int $elevation = null;

    /**
     * @var int  Digital elevation model, srtm3 or gtopo30, average elevation of 3''x3'' (ca 90mx90m)
     *      or 30''x30'' (ca 900mx900m) area in meters, integer. srtm processed by cgiar/ciat.
     */
    #[ORM\Column(name: 'dem', type: 'integer', nullable: true)]
    private ?int $dem = null;

    #[ORM\ManyToOne(targetEntity: 'Timezone')]
    #[ORM\Column(name: 'timezone_id', type: 'string', length: 200, nullable: true)]
    private ?string $timezone = null;

    /**
     * @var string comma separated, ascii names
     */
    #[ORM\Column(name: 'alternatenames', type: 'text', nullable: true)]
    private ?string $alternatenames = null;

    #[ORM\Column(name: 'modificationdate', type: 'date', nullable: true)]
    private ?\DateTime $modificationdate = null;

    /**
     * @return ?int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param string|null $name
     * @return $this
     */
    public function setName(?string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $asciiname
     * @return $this
     */
    public function setAsciiname(?string $asciiname)
    {
        $this->asciiname = $asciiname;
        return $this;
    }

    /**
     * @return string
     */
    public function getAsciiname()
    {
        return $this->asciiname;
    }

    /**
     * @param string|null $alternatenames
     * @return $this
     */
    public function setAlternatenames(?string $alternatenames)
    {
        $this->alternatenames = $alternatenames;
        return $this;
    }

    /**
     * @return string
     */
    public function getAlternatenames()
    {
        return $this->alternatenames;
    }

    /**
     * @param float|null $latitude
     * @return $this
     */
    public function setLatitude(?float $latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float|null $longitude
     * @return $this
     */
    public function setLongitude(?float $longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param string|null $featureclass
     * @return $this
     */
    public function setFeatureclass(?string $featureclass)
    {
        $this->featureclass = $featureclass;
        return $this;
    }

    /**
     * @return string
     */
    public function getFeatureclass()
    {
        return $this->featureclass;
    }

    /**
     * @param string|null $featurecode
     * @return $this
     */
    public function setFeaturecode(?string $featurecode)
    {
        $this->featurecode = $featurecode;
        return $this;
    }

    /**
     * @return string
     */
    public function getFeaturecode()
    {
        return $this->featurecode;
    }

    /**
     * @param string|null $country cc2
     * @return $this
     */
    public function setCountry(?string $country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string Country cc2
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string|null $cc2 alternate country codes cc2
     * @return $this
     */
    public function setCc2(?string $cc2)
    {
        $this->cc2 = $cc2;
        return $this;
    }

    /**
     * @return string alternatecountrycodes cc2
     */
    public function getCc2()
    {
        return $this->cc2;
    }

    /**
     * @param string|null $admin1
     * @return $this
     */
    public function setAdmin1(?string $admin1)
    {
        $this->admin1 = $admin1;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdmin1()
    {
        return $this->admin1;
    }

    /**
     * @param string|null $admin2
     * @return $this
     */
    public function setAdmin2(?string $admin2)
    {
        $this->admin2 = $admin2;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdmin2()
    {
        return $this->admin2;
    }

    /**
     * @param string|null $admin3
     * @return $this
     */
    public function setAdmin3(?string $admin3)
    {
        $this->admin3 = $admin3;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdmin3()
    {
        return $this->admin3;
    }

    /**
     * @param string|null $admin4
     * @return $this
     */
    public function setAdmin4(?string $admin4)
    {
        $this->admin4 = $admin4;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdmin4()
    {
        return $this->admin4;
    }

    /**
     * @param int|null $population
     * @return $this
     */
    public function setPopulation(?int $population)
    {
        $this->population = (int)$population;
        return $this;
    }

    /**
     * @return int
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * @param int|null $elevation
     * @return $this
     */
    public function setElevation(?int $elevation)
    {
        $this->elevation = (int)$elevation;
        return $this;
    }

    /**
     * @return int
     */
    public function getElevation()
    {
        return $this->elevation;
    }

    /**
     * @param int|null $dem
     * @return $this
     */
    public function setDem(?int $dem)
    {
        $this->dem = (int)$dem;
        return $this;
    }

    /**
     * @return int
     */
    public function getDem()
    {
        return $this->dem;
    }

    /**
     * @param string|null $timezone
     * @return $this
     */
    public function setTimezone(?string $timezone)
    {
        $this->timezone = $timezone;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * @return $this
     */
    public function setModificationdate(\DateTime $modificationdate)
    {
        $this->modificationdate = $modificationdate;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getModificationdate()
    {
        return $this->modificationdate;
    }

    public function __toString(): string
    {
        return (string) $this->name;
    }
}
