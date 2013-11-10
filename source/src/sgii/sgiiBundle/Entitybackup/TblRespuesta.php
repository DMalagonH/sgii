<?php

namespace sgii\sgiiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblRespuesta
 *
 * @ORM\Table(name="tbl_respuesta")
 * @ORM\Entity
 */
class TblRespuesta
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
     * @ORM\Column(name="res_respuesta", type="string", length=250, nullable=false)
     */
    private $resRespuesta;

    /**
     * @var integer
     *
     * @ORM\Column(name="res_peso", type="integer", nullable=false)
     */
    private $resPeso;

    /**
     * @var boolean
     *
     * @ORM\Column(name="res_estado", type="boolean", nullable=false)
     */
    private $resEstado;

    /**
     * @var \TblPregunta
     *
     * @ORM\Column(name="pregunta_id", type="integer", nullable=false)
     */
    private $pregunta;



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
     * Set resRespuesta
     *
     * @param string $resRespuesta
     * @return TblRespuesta
     */
    public function setResRespuesta($resRespuesta)
    {
        $this->resRespuesta = $resRespuesta;
    
        return $this;
    }

    /**
     * Get resRespuesta
     *
     * @return string 
     */
    public function getResRespuesta()
    {
        return $this->resRespuesta;
    }

    /**
     * Set resPeso
     *
     * @param integer $resPeso
     * @return TblRespuesta
     */
    public function setResPeso($resPeso)
    {
        $this->resPeso = $resPeso;
    
        return $this;
    }

    /**
     * Get resPeso
     *
     * @return integer 
     */
    public function getResPeso()
    {
        return $this->resPeso;
    }

    /**
     * Set resEstado
     *
     * @param boolean $resEstado
     * @return TblRespuesta
     */
    public function setResEstado($resEstado)
    {
        $this->resEstado = $resEstado;
    
        return $this;
    }

    /**
     * Get resEstado
     *
     * @return boolean 
     */
    public function getResEstado()
    {
        return $this->resEstado;
    }

    /**
     * Set pregunta
     *
     * @param \sgii\sgiiBundle\Entity\TblPregunta $pregunta
     * @return TblRespuesta
     */
    public function setPregunta($pregunta = null)
    {
        $this->pregunta = $pregunta;
    
        return $this;
    }

    /**
     * Get pregunta
     *
     * @return \sgii\sgiiBundle\Entity\TblPregunta 
     */
    public function getPregunta()
    {
        return $this->pregunta;
    }
}