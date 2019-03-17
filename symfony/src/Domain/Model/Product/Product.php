<?php
namespace App\Domain\Model\Product;
use Doctrine\ORM\Mapping as ORM;
/**
 * Class 
 * @ORM\Entity
 * @package App\Domain\Model\Product
 */
class Product
{
    /**
     * @ORM\ProductId
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    private $productId;
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $name;
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $price;
    /**
     * @ORM\@OneToOne(targetEntity="School")
     * @JoinColumn(name="schoolId", referencedColumnName="schoolId")
     * @var int
     */
    private $schoolId;

}