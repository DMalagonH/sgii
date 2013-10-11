<?php

namespace sgii\sgiiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblHerramientaProyecto
 *
 * @ORM\Table(name="tbl_herramienta_proyecto")
 * @ORM\Entity
 */
class TblHerramientaProyecto
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
     * @var integer
     *
     * @ORM\Column(name="herramienta_id", type="integer", nullable=false)
     */
    private $herramientaId;

    /**
     * @var integer
     *
     * @ORM\Column(name="proyecto_id", type="integer", nullable=false)
     */
    private $proyectoId;



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
     * Set herramientaId
     *
     * @param integer $herramientaId
     * @return TblHerramientaProyecto
     */
    public function setHerramientaId($herramientaId)
    {
        $this->herramientaId = $herramientaId;
    
        return $this;
    }

    /**
     * Get herramientaId
     *
     * @return integer 
     */
    public function getHerramientaId()
    {
        return $this->herramientaId;
    }

    /**
     * Set proyectoId
     *
     * @param integer $proyectoId
     * @return TblHerramientaProyecto
     */
    public function setProyectoId($proyectoId)
    {
        $this->proyectoId = $proyectoId;
    
        return $this;
    }

    /**
     * Get proyectoId
     *
     * @return integer 
     */
    public function getProyectoId()
    {
        return $this->proyectoId;
    }
}