<?php

namespace sgii\sgiiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblCargo
 *
 * @ORM\Table(name="tbl_cargo")
 * @ORM\Entity
 */
class TblCargo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="car_nombre", type="string", length=45, nullable=false)
     */
    private $carNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="car_descripcion", type="string", length=45, nullable=true)
     */
    private $carDescripcion;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set carNombre
     *
     * @param string $carNombre
     * @return TblCargo
     */
    public function setCarNombre($carNombre)
    {
        $this->carNombre = $carNombre;
    
        return $this;
    }

    /**
     * Get carNombre
     *
     * @return string 
     */
    public function getCarNombre()
    {
        return $this->carNombre;
    }

    /**
     * Set carDescripcion
     *
     * @param string $carDescripcion
     * @return TblCargo
     */
    public function setCarDescripcion($carDescripcion)
    {
        $this->carDescripcion = $carDescripcion;
    
        return $this;
    }

    /**
     * Get carDescripcion
     *
     * @return string 
     */
    public function getCarDescripcion()
    {
        return $this->carDescripcion;
    }
}