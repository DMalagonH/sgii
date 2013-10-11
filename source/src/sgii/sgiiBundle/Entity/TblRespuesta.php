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
     * @var boolean
     *
     * @ORM\Column(name="res_estado", type="boolean", nullable=false)
     */
    private $resEstado;

    /**
     * @var integer
     *
     * @ORM\Column(name="pregunta_id", type="integer", nullable=false)
     */
    private $preguntaId;



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
     * Set preguntaId
     *
     * @param integer $preguntaId
     * @return TblRespuesta
     */
    public function setPreguntaId($preguntaId)
    {
        $this->preguntaId = $preguntaId;
    
        return $this;
    }

    /**
     * Get preguntaId
     *
     * @return integer 
     */
    public function getPreguntaId()
    {
        return $this->preguntaId;
    }
}