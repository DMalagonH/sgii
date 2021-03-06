<?php

namespace sgii\sgiiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblRespuestaUsuario
 *
 * @ORM\Table(name="tbl_respuesta_usuario")
 * @ORM\Entity
 */
class TblRespuestaUsuario
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
     * @ORM\Column(name="rus_respuesta_textual", type="text", nullable=true)
     */
    private $rusRespuestaTextual;

    /**
     * @var \TblPregunta
     *
     * @ORM\ManyToOne(targetEntity="TblPregunta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pregunta_id", referencedColumnName="id")
     * })
     */
    private $pregunta;

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
     * @var \TblRespuesta
     *
     * @ORM\ManyToOne(targetEntity="TblRespuesta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="respuesta_id", referencedColumnName="id")
     * })
     */
    private $respuesta;



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
     * Set rusRespuestaTextual
     *
     * @param string $rusRespuestaTextual
     * @return TblRespuestaUsuario
     */
    public function setRusRespuestaTextual($rusRespuestaTextual)
    {
        $this->rusRespuestaTextual = $rusRespuestaTextual;
    
        return $this;
    }

    /**
     * Get rusRespuestaTextual
     *
     * @return string 
     */
    public function getRusRespuestaTextual()
    {
        return $this->rusRespuestaTextual;
    }

    /**
     * Set pregunta
     *
     * @param \sgii\sgiiBundle\Entity\TblPregunta $pregunta
     * @return TblRespuestaUsuario
     */
    public function setPregunta(\sgii\sgiiBundle\Entity\TblPregunta $pregunta = null)
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

    /**
     * Set usuario
     *
     * @param \sgii\sgiiBundle\Entity\TblUsuario $usuario
     * @return TblRespuestaUsuario
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

    /**
     * Set respuesta
     *
     * @param \sgii\sgiiBundle\Entity\TblRespuesta $respuesta
     * @return TblRespuestaUsuario
     */
    public function setRespuesta(\sgii\sgiiBundle\Entity\TblRespuesta $respuesta = null)
    {
        $this->respuesta = $respuesta;
    
        return $this;
    }

    /**
     * Get respuesta
     *
     * @return \sgii\sgiiBundle\Entity\TblRespuesta 
     */
    public function getRespuesta()
    {
        return $this->respuesta;
    }
}