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
     * @ORM\Column(name="herramienta_id", type="integer", nullable=false)
     */
    private $herramientaId;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipo_pregunta_id", type="integer", nullable=false)
     */
    private $tipoPreguntaId;



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
     * Set herramientaId
     *
     * @param integer $herramientaId
     * @return TblPregunta
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
     * Set tipoPreguntaId
     *
     * @param integer $tipoPreguntaId
     * @return TblPregunta
     */
    public function setTipoPreguntaId($tipoPreguntaId)
    {
        $this->tipoPreguntaId = $tipoPreguntaId;
    
        return $this;
    }

    /**
     * Get tipoPreguntaId
     *
     * @return integer 
     */
    public function getTipoPreguntaId()
    {
        return $this->tipoPreguntaId;
    }
}