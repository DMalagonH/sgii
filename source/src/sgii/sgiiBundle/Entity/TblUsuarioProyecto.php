<?php

namespace sgii\sgiiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblUsuarioProyecto
 *
 * @ORM\Table(name="tbl_usuario_proyecto")
 * @ORM\Entity
 */
class TblUsuarioProyecto
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
     * @var integer
     *
     * @ORM\Column(name="usuario_id", type="integer", nullable=false)
     */
    private $usuarioId;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="proyecto_id", type="integer", nullable=false)
     */
    private $proyectoId;
    
    /**
     * @var string
     *
     * @ORM\Column(name="usuario_proyecto_tipo", type="string", length=2500, nullable=false)
     */
    private $usuarioProyectoTipo;
    
    
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
     * Set usuarioId
     *
     * @param integer $usuarioId
     * @return TblUsuarioProyecto
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
    
    /**
     * Set proyectoId
     *
     * @param integer $proyectoId
     * @return TblUsuarioProyecto
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
    
    /**
     * Set usuarioProyectoTipo
     *
     * @param string $usuarioProyectoTipo
     * @return TblUsuarioProyecto
     */
    public function setUsuarioProyectoTipo($usuarioProyectoTipo)
    {
        $this->usuarioProyectoTipo = $usuarioProyectoTipo;
    
        return $this;
    }

    /**
     * Get usuarioProyectoTipo
     *
     * @return string 
     */
    public function getUsuarioProyectoTipo()
    {
        return $this->usuarioProyectoTipo;
    }
}