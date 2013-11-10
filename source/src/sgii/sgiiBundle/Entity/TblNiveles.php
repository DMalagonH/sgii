<?php

namespace sgii\sgiiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblNiveles
 *
 * @ORM\Table(name="tbl_niveles")
 * @ORM\Entity
 */
class TblNiveles
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
     * @ORM\Column(name="niv_nombre", type="string", length=50, nullable=false)
     */
    private $nivNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="niv_descripcion", type="text", nullable=true)
     */
    private $nivDescripcion;



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
     * Set nivNombre
     *
     * @param string $nivNombre
     * @return TblNiveles
     */
    public function setNivNombre($nivNombre)
    {
        $this->nivNombre = $nivNombre;
    
        return $this;
    }

    /**
     * Get nivNombre
     *
     * @return string 
     */
    public function getNivNombre()
    {
        return $this->nivNombre;
    }

    /**
     * Set nivDescripcion
     *
     * @param string $nivDescripcion
     * @return TblNiveles
     */
    public function setNivDescripcion($nivDescripcion)
    {
        $this->nivDescripcion = $nivDescripcion;
    
        return $this;
    }

    /**
     * Get nivDescripcion
     *
     * @return string 
     */
    public function getNivDescripcion()
    {
        return $this->nivDescripcion;
    }
}