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
     * @ORM\Column(name="pregunta_id", type="integer", nullable=false)
     */
    private $pregunta;

    /**
     * @var \TblUsuario
     *
     * @ORM\Column(name="usuario_id", type="integer", nullable=false)
     */
    private $usuario;

    /**
     * @var \TblRespuesta
     *
     * @ORM\Column(name="respuesta_id", type="integer", nullable=true)
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
    public function setPregunta($pregunta = null)
    {
        $this->pregunta = $pregunta;
    
        return $this;
    }

    /**
     * Get pregunta
     *
     * @return integer 
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
    public function setUsuario($usuario = null)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return integer
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
    public function setRespuesta($respuesta = null)
    {
        $this->respuesta = $respuesta;
    
        return $this;
    }

    /**
     * Get respuesta
     *
     * @return integer 
     */
    public function getRespuesta()
    {
        return $this->respuesta;
    }
}