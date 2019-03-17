<?php
namespace App\Domain\Model\School;
use Doctrine\ORM\Mapping as ORM;
/**
 * Class School
 * @ORM\Entity
 * @package App\Domain\Model\School
 */
class School
{
    /**
     * @ORM\SchoolId
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    private $schoolId;
    /**
     * @ORM\Column(type="name")
     * @var string
     */
    private $name;
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $city;
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $state;
    /**
     * @ORM\Column(type="string")
     * @var integer
     */
    private $zip;

    /**
     * @return int
     */
    public function getSchoolId(): int
    {
        return $this->schoolId;
    }
    /**
     * @param int $schoolId
     */
    public function setId(int $schoolId): void
    {
        $this->id = $schoolId;
    }
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * @param string 
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }
    /**
     * @param string $content
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }
}