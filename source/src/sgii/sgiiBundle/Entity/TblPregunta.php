<?php

namespace sgii\sgiiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblPregunta
 *
 * @ORM\Table(name="tbl_pregunta")
 * @ORM\Entity
 */
class TblPregunta
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
     * @ORM\Column(name="pre_pregunta", type="string", length=250, nullable=false)
     */
    private $prePregunta;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pre_obligatoria", type="boolean", nullable=false)
     */
    private $preObligatoria;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pre_estado", type="boolean", nullable=false)
     */
    private $preEstado;

    /**
     * @var integer
     *
     * @ORM\Column(name="pre_orden", type="integer", nullable=true)
     */
    private $preOrden;

    /**
     * @var \TblHerramienta
     *
     * @ORM\Column(name="herramienta_id", type="integer", nullable=false)
     */
    private $herramienta;

    /**
     * @var \TblTipoPregunta
     *
     * @ORM\Column(name="tipo_pregunta_id", type="integer", nullable=false)
     */
    private $tipoPregunta;



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
     * Set prePregunta
     *
     * @param string $prePregunta
     * @return TblPregunta
     */
    public function setPrePregunta($prePregunta)
    {
        $this->prePregunta = $prePregunta;
    
        return $this;
    }

    /**
     * Get prePregunta
     *
     * @return string 
     */
    public function getPrePregunta()
    {
        return $this->prePregunta;
    }

    /**
     * Set preObligatoria
     *
     * @param boolean $preObligatoria
     * @return TblPregunta
     */
    public function setPreObligatoria($preObligatoria)
    {
        $this->preObligatoria = $preObligatoria;
    
        return $this;
    }

    /**
     * Get preObligatoria
     *
     * @return boolean 
     */
    public function getPreObligatoria()
    {
        return $this->preObligatoria;
    }

    /**
     * Set preEstado
     *
     * @param boolean $preEstado
     * @return TblPregunta
     */
    public function setPreEstado($preEstado)
    {
        $this->preEstado = $preEstado;
    
        return $this;
    }

    /**
     * Get preEstado
     *
     * @return boolean 
     */
    public function getPreEstado()
    {
        return $this->preEstado;
    }

    /**
     * Set preOrden
     *
     * @param integer $preOrden
     * @return TblPregunta
     */
    public function setPreOrden($preOrden)
    {
        $this->preOrden = $preOrden;
    
        return $this;
    }

    /**
     * Get preOrden
     *
     * @return integer 
     */
    public function getPreOrden()
    {
        return $this->preOrden;
    }

    /**
     * Set herramienta
     *
     * @param \sgii\sgiiBundle\Entity\TblHerramienta $herramienta
     * @return TblPregunta
     */
    public function setHerramienta($herramienta = null)
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
     * Set tipoPregunta
     *
     * @param \sgii\sgiiBundle\Entity\TblTipoPregunta $tipoPregunta
     * @return TblPregunta
     */
    public function setTipoPregunta($tipoPregunta = null)
    {
        $this->tipoPregunta = $tipoPregunta;
    
        return $this;
    }

    /**
     * Get tipoPregunta
     *
     * @return \sgii\sgiiBundle\Entity\TblTipoPregunta 
     */
    public function getTipoPregunta()
    {
        return $this->tipoPregunta;
    }
}