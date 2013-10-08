<?php

namespace sgii\sgiiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblDepartamento
 *
 * @ORM\Table(name="tbl_departamento")
 * @ORM\Entity
 */
class TblDepartamento
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
     * @ORM\Column(name="dep_nombre", type="string", length=45, nullable=false)
     */
    private $depNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="dep_descripcion", type="text", nullable=true)
     */
    private $depDescripcion;



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
     * Set depNombre
     *
     * @param string $depNombre
     * @return TblDepartamento
     */
    public function setDepNombre($depNombre)
    {
        $this->depNombre = $depNombre;
    
        return $this;
    }

    /**
     * Get depNombre
     *
     * @return string 
     */
    public function getDepNombre()
    {
        return $this->depNombre;
    }

    /**
     * Set depDescripcion
     *
     * @param string $depDescripcion
     * @return TblDepartamento
     */
    public function setDepDescripcion($depDescripcion)
    {
        $this->depDescripcion = $depDescripcion;
    
        return $this;
    }

    /**
     * Get depDescripcion
     *
     * @return string 
     */
    public function getDepDescripcion()
    {
        return $this->depDescripcion;
    }
}