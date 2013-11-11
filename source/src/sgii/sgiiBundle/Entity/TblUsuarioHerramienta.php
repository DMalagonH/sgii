<?php

namespace sgii\sgiiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblUsuarioHerramienta
 *
 * @ORM\Table(name="tbl_usuario_herramienta")
 * @ORM\Entity
 */
class TblUsuarioHerramienta
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
     * @var \DateTime
     *
     * @ORM\Column(name="ush_fecha_activo_inicio", type="datetime", nullable=true)
     */
    private $ushFechaActivoInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ush_fecha_activo_fin", type="datetime", nullable=true)
     */
    private $ushFechaActivoFin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ush_fecha_aplico", type="datetime", nullable=true)
     */
    private $ushFechaAplico;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ush_aplico", type="boolean", nullable=true)
     */
    private $ushAplico;

    /**
     * @var \TblHerramienta
     *
     * @ORM\ManyToOne(targetEntity="TblHerramienta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="herramienta_id", referencedColumnName="id")
     * })
     */
    private $herramienta;

    /**
     * @var \TblUsuario
     *
     * @ORM\ManyToOne(targetEntity="TblUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     * })
     */
    private $usuario;



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
     * Set ushFechaActivoInicio
     *
     * @param \DateTime $ushFechaActivoInicio
     * @return TblUsuarioHerramienta
     */
    public function setUshFechaActivoInicio($ushFechaActivoInicio)
    {
        $this->ushFechaActivoInicio = $ushFechaActivoInicio;
    
        return $this;
    }

    /**
     * Get ushFechaActivoInicio
     *
     * @return \DateTime 
     */
    public function getUshFechaActivoInicio()
    {
        return $this->ushFechaActivoInicio;
    }

    /**
     * Set ushFechaActivoFin
     *
     * @param \DateTime $ushFechaActivoFin
     * @return TblUsuarioHerramienta
     */
    public function setUshFechaActivoFin($ushFechaActivoFin)
    {
        $this->ushFechaActivoFin = $ushFechaActivoFin;
    
        return $this;
    }

    /**
     * Get ushFechaActivoFin
     *
     * @return \DateTime 
     */
    public function getUshFechaActivoFin()
    {
        return $this->ushFechaActivoFin;
    }

    /**
     * Set ushFechaAplico
     *
     * @param \DateTime $ushFechaAplico
     * @return TblUsuarioHerramienta
     */
    public function setUshFechaAplico($ushFechaAplico)
    {
        $this->ushFechaAplico = $ushFechaAplico;
    
        return $this;
    }

    /**
     * Get ushFechaAplico
     *
     * @return \DateTime 
     */
    public function getUshFechaAplico()
    {
        return $this->ushFechaAplico;
    }

    /**
     * Set ushAplico
     *
     * @param boolean $ushAplico
     * @return TblUsuarioHerramienta
     */
    public function setUshAplico($ushAplico)
    {
        $this->ushAplico = $ushAplico;
    
        return $this;
    }

    /**
     * Get ushAplico
     *
     * @return boolean 
     */
    public function getUshAplico()
    {
        return $this->ushAplico;
    }

    /**
     * Set herramienta
     *
     * @param \sgii\sgiiBundle\Entity\TblHerramienta $herramienta
     * @return TblUsuarioHerramienta
     */
    public function setHerramienta(\sgii\sgiiBundle\Entity\TblHerramienta $herramienta = null)
    {
        $this->herramienta = $herramienta;
    
        return $this;
    }

    /**
     * Get herramienta
     *
     * @return \sgii\sgiiBundle\Entity\TblHerramienta 
     */
    public function getHerramienta()
    {
        return $this->herramienta;
    }

    /**
     * Set usuario
     *
     * @param \sgii\sgiiBundle\Entity\TblUsuario $usuario
     * @return TblUsuarioHerramienta
     */
    public function setUsuario(\sgii\sgiiBundle\Entity\TblUsuario $usuario = null)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return \sgii\sgiiBundle\Entity\TblUsuario 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}