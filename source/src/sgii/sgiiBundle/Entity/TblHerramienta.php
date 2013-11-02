<?php

namespace sgii\sgiiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblHerramienta
 *
 * @ORM\Table(name="tbl_herramienta")
 * @ORM\Entity
 */
class TblHerramienta
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
     * @ORM\Column(name="her_nombre_herramienta", type="string", length=250, nullable=false)
     */
    private $herNombreHerramienta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="her_fecha_inicio", type="datetime", nullable=false)
     */
    private $herFechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="her_fecha_fn", type="datetime", nullable=false)
     */
    private $herFechaFn;

    /**
     * @var boolean
     *
     * @ORM\Column(name="her_estado", type="boolean", nullable=false)
     */
    private $herEstado;

    /**
     * @var \TblTipoHerramienta
     *
     * @ORM\ManyToOne(targetEntity="TblTipoHerramienta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_herramienta_id", referencedColumnName="id")
     * })
     */
    private $tipoHerramienta;

    /**
     * @var \TblProyecto
     *
     * @ORM\ManyToOne(targetEntity="TblProyecto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="proyecto_id", referencedColumnName="id")
     * })
     */
    private $proyecto;



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
     * Set herNombreHerramienta
     *
     * @param string $herNombreHerramienta
     * @return TblHerramienta
     */
    public function setHerNombreHerramienta($herNombreHerramienta)
    {
        $this->herNombreHerramienta = $herNombreHerramienta;
    
        return $this;
    }

    /**
     * Get herNombreHerramienta
     *
     * @return string 
     */
    public function getHerNombreHerramienta()
    {
        return $this->herNombreHerramienta;
    }

    /**
     * Set herFechaInicio
     *
     * @param \DateTime $herFechaInicio
     * @return TblHerramienta
     */
    public function setHerFechaInicio($herFechaInicio)
    {
        $this->herFechaInicio = $herFechaInicio;
    
        return $this;
    }

    /**
     * Get herFechaInicio
     *
     * @return \DateTime 
     */
    public function getHerFechaInicio()
    {
        return $this->herFechaInicio;
    }

    /**
     * Set herFechaFn
     *
     * @param \DateTime $herFechaFn
     * @return TblHerramienta
     */
    public function setHerFechaFn($herFechaFn)
    {
        $this->herFechaFn = $herFechaFn;
    
        return $this;
    }

    /**
     * Get herFechaFn
     *
     * @return \DateTime 
     */
    public function getHerFechaFn()
    {
        return $this->herFechaFn;
    }

    /**
     * Set herEstado
     *
     * @param boolean $herEstado
     * @return TblHerramienta
     */
    public function setHerEstado($herEstado)
    {
        $this->herEstado = $herEstado;
    
        return $this;
    }

    /**
     * Get herEstado
     *
     * @return boolean 
     */
    public function getHerEstado()
    {
        return $this->herEstado;
    }

    /**
     * Set tipoHerramienta
     *
     * @param \sgii\sgiiBundle\Entity\TblTipoHerramienta $tipoHerramienta
     * @return TblHerramienta
     */
    public function setTipoHerramienta(\sgii\sgiiBundle\Entity\TblTipoHerramienta $tipoHerramienta = null)
    {
        $this->tipoHerramienta = $tipoHerramienta;
    
        return $this;
    }

    /**
     * Get tipoHerramienta
     *
     * @return \sgii\sgiiBundle\Entity\TblTipoHerramienta 
     */
    public function getTipoHerramienta()
    {
        return $this->tipoHerramienta;
    }

    /**
     * Set proyecto
     *
     * @param \sgii\sgiiBundle\Entity\TblProyecto $proyecto
     * @return TblHerramienta
     */
    public function setProyecto(\sgii\sgiiBundle\Entity\TblProyecto $proyecto = null)
    {
        $this->proyecto = $proyecto;
    
        return $this;
    }

    /**
     * Get proyecto
     *
     * @return \sgii\sgiiBundle\Entity\TblProyecto 
     */
    public function getProyecto()
    {
        return $this->proyecto;
    }
}