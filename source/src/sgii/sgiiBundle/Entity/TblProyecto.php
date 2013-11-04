<?php

namespace sgii\sgiiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblProyecto
 *
 * @ORM\Table(name="tbl_proyecto")
 * @ORM\Entity
 */
class TblProyecto
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
     * @ORM\Column(name="pro_nombre", type="string", length=250, nullable=false)
     */
    private $proNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_descripcion", type="string", length=2500, nullable=false)
     */
    private $proDescripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_problema", type="string", length=500, nullable=false)
     */
    private $proProblema;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pro_fecha_creacion", type="datetime", nullable=false)
     */
    private $proFechaCreacion;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_conclusiones", type="string", length=2500, nullable=false)
     */
    private $proConclusiones;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_demostraciones", type="string", length=2500, nullable=false)
     */
    private $proDemostraciones;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_recomendaciones", type="string", length=2500, nullable=false)
     */
    private $proRecomendaciones;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pro_estado", type="boolean", nullable=false)
     */
    private $proEstado;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado_proyecto_id", type="integer", nullable=false)
     */
    private $estadoProyectoId;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipo_investigacion_id", type="integer", nullable=false)
     */
    private $tipoInvestigacionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="linea_investigacion_id", type="integer", nullable=false)
     */
    private $lineaInvestigacionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="usuario_id", type="integer", nullable=false)
     */
    private $usuarioId;

    /**
     * toString
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->getProNombre();
    }

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
     * Set proNombre
     *
     * @param string $proNombre
     * @return TblProyecto
     */
    public function setProNombre($proNombre)
    {
        $this->proNombre = $proNombre;
    
        return $this;
    }

    /**
     * Get proNombre
     *
     * @return string 
     */
    public function getProNombre()
    {
        return $this->proNombre;
    }

    /**
     * Set proDescripcion
     *
     * @param string $proDescripcion
     * @return TblProyecto
     */
    public function setProDescripcion($proDescripcion)
    {
        $this->proDescripcion = $proDescripcion;
    
        return $this;
    }

    /**
     * Get proDescripcion
     *
     * @return string 
     */
    public function getProDescripcion()
    {
        return $this->proDescripcion;
    }

    /**
     * Set proProblema
     *
     * @param string $proProblema
     * @return TblProyecto
     */
    public function setProProblema($proProblema)
    {
        $this->proProblema = $proProblema;
    
        return $this;
    }

    /**
     * Get proProblema
     *
     * @return string 
     */
    public function getProProblema()
    {
        return $this->proProblema;
    }

    /**
     * Set proFechaCreacion
     *
     * @param \DateTime $proFechaCreacion
     * @return TblProyecto
     */
    public function setProFechaCreacion($proFechaCreacion)
    {
        $this->proFechaCreacion = $proFechaCreacion;
    
        return $this;
    }

    /**
     * Get proFechaCreacion
     *
     * @return \DateTime 
     */
    public function getProFechaCreacion()
    {
        return $this->proFechaCreacion;
    }

    /**
     * Set proConclusiones
     *
     * @param string $proConclusiones
     * @return TblProyecto
     */
    public function setProConclusiones($proConclusiones)
    {
        $this->proConclusiones = $proConclusiones;
    
        return $this;
    }

    /**
     * Get proConclusiones
     *
     * @return string 
     */
    public function getProConclusiones()
    {
        return $this->proConclusiones;
    }

    /**
     * Set proDemostraciones
     *
     * @param string $proDemostraciones
     * @return TblProyecto
     */
    public function setProDemostraciones($proDemostraciones)
    {
        $this->proDemostraciones = $proDemostraciones;
    
        return $this;
    }

    /**
     * Get proDemostraciones
     *
     * @return string 
     */
    public function getProDemostraciones()
    {
        return $this->proDemostraciones;
    }

    /**
     * Set proRecomendaciones
     *
     * @param string $proRecomendaciones
     * @return TblProyecto
     */
    public function setProRecomendaciones($proRecomendaciones)
    {
        $this->proRecomendaciones = $proRecomendaciones;
    
        return $this;
    }

    /**
     * Get proRecomendaciones
     *
     * @return string 
     */
    public function getProRecomendaciones()
    {
        return $this->proRecomendaciones;
    }

    /**
     * Set proEstado
     *
     * @param boolean $proEstado
     * @return TblProyecto
     */
    public function setProEstado($proEstado)
    {
        $this->proEstado = $proEstado;
    
        return $this;
    }

    /**
     * Get proEstado
     *
     * @return boolean 
     */
    public function getProEstado()
    {
        return $this->proEstado;
    }

    /**
     * Set estadoProyectoId
     *
     * @param integer $estadoProyectoId
     * @return TblProyecto
     */
    public function setEstadoProyectoId($estadoProyectoId)
    {
        $this->estadoProyectoId = $estadoProyectoId;
    
        return $this;
    }

    /**
     * Get estadoProyectoId
     *
     * @return integer 
     */
    public function getEstadoProyectoId()
    {
        return $this->estadoProyectoId;
    }

    /**
     * Set tipoInvestigacionId
     *
     * @param integer $tipoInvestigacionId
     * @return TblProyecto
     */
    public function setTipoInvestigacionId($tipoInvestigacionId)
    {
        $this->tipoInvestigacionId = $tipoInvestigacionId;
    
        return $this;
    }

    /**
     * Get tipoInvestigacionId
     *
     * @return integer 
     */
    public function getTipoInvestigacionId()
    {
        return $this->tipoInvestigacionId;
    }

    /**
     * Set lineaInvestigacionId
     *
     * @param integer $lineaInvestigacionId
     * @return TblProyecto
     */
    public function setLineaInvestigacionId($lineaInvestigacionId)
    {
        $this->lineaInvestigacionId = $lineaInvestigacionId;
    
        return $this;
    }

    /**
     * Get lineaInvestigacionId
     *
     * @return integer 
     */
    public function getLineaInvestigacionId()
    {
        return $this->lineaInvestigacionId;
    }

    /**
     * Set usuarioId
     *
     * @param integer $usuarioId
     * @return TblProyecto
     */
    public function setUsuarioId($usuarioId)
    {
        $this->usuarioId = $usuarioId;
    
        return $this;
    }

    /**
     * Get usuarioId
     *
     * @return integer 
     */
    public function getUsuarioId()
    {
        return $this->usuarioId;
    }
}