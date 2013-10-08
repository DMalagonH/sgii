<?php

namespace sgii\sgiiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblHipotesis
 *
 * @ORM\Table(name="tbl_hipotesis")
 * @ORM\Entity
 */
class TblHipotesis
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
     * @ORM\Column(name="hip_hipotesis", type="string", length=500, nullable=false)
     */
    private $hipHipotesis;

    /**
     * @var boolean
     *
     * @ORM\Column(name="hip_estado", type="boolean", nullable=false)
     */
    private $hipEstado;

    /**
     * @var string
     *
     * @ORM\Column(name="hip_srguimiento", type="text", nullable=false)
     */
    private $hipSrguimiento;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado_hipotesis_id", type="integer", nullable=false)
     */
    private $estadoHipotesisId;

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
     * Set hipHipotesis
     *
     * @param string $hipHipotesis
     * @return TblHipotesis
     */
    public function setHipHipotesis($hipHipotesis)
    {
        $this->hipHipotesis = $hipHipotesis;
    
        return $this;
    }

    /**
     * Get hipHipotesis
     *
     * @return string 
     */
    public function getHipHipotesis()
    {
        return $this->hipHipotesis;
    }

    /**
     * Set hipEstado
     *
     * @param boolean $hipEstado
     * @return TblHipotesis
     */
    public function setHipEstado($hipEstado)
    {
        $this->hipEstado = $hipEstado;
    
        return $this;
    }

    /**
     * Get hipEstado
     *
     * @return boolean 
     */
    public function getHipEstado()
    {
        return $this->hipEstado;
    }

    /**
     * Set hipSrguimiento
     *
     * @param string $hipSrguimiento
     * @return TblHipotesis
     */
    public function setHipSrguimiento($hipSrguimiento)
    {
        $this->hipSrguimiento = $hipSrguimiento;
    
        return $this;
    }

    /**
     * Get hipSrguimiento
     *
     * @return string 
     */
    public function getHipSrguimiento()
    {
        return $this->hipSrguimiento;
    }

    /**
     * Set estadoHipotesisId
     *
     * @param integer $estadoHipotesisId
     * @return TblHipotesis
     */
    public function setEstadoHipotesisId($estadoHipotesisId)
    {
        $this->estadoHipotesisId = $estadoHipotesisId;
    
        return $this;
    }

    /**
     * Get estadoHipotesisId
     *
     * @return integer 
     */
    public function getEstadoHipotesisId()
    {
        return $this->estadoHipotesisId;
    }

    /**
     * Set proyectoId
     *
     * @param integer $proyectoId
     * @return TblHipotesis
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