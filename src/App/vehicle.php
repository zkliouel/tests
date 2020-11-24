<?php
namespace App;

/** @todo create interface */
/** @todo use const for keys */
/** @todo geoloc as object */
class Vehicle
{
    /** @var string */
    protected $licencePlate;
    /** @var string */
    protected $name;
    /** @var string */
    protected $type;
    /** @var string */
    protected $geoLoc;

    /**
     * @return string
     */
    public function getLicencePlate():string
    {
        return $this->licencePlate;
    }

    /**
     * @param string $licencePlate
     *
     * @return $this
     */
    public function setLicencePlate(string $licencePlate)
    {
        $this->licencePlate = $licencePlate;

        return $this;
    }

    /**
     * @return string
     */
    public function getName():string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getType():string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return array
     */
    public function getGeoLoc(): array
    {
        return explode('|', $this->geoLoc);
    }

    /**
     * @param mixed $geoLoc
     *
     * @return $this
     */
    public function setGeoLoc($geoLoc)
    {
        if (is_array($geoLoc)) {
            $geoLoc = implode('|', $geoLoc);
        }
        $this->geoLoc = $geoLoc;

        return $this;
    }

    /**
     * @param $data
     *
     * @return bool
     */
    public static function validateData($data):bool
    {
        if(empty($data) || !isset($data['type']) || !isset($data['licence_plate']) || !isset($data['name'])) {
            return false;
        }

        return true;
    }

    /**
     * @param $data
     *
     * @return $this
     */
    public function populateFromArray($data)
    {
        $this->setName($data['name'])
            ->setLicencePlate($data['licence_place'])
            ->setType($data['type']);

        return $this;
    }
}
