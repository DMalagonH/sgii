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
     * @var \TblUsuario
     *
     * @ORM\ManyToOne(targetEntity="TblUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     * })
     */
    private $usuario;

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
     * Set usuario
     *
     * @param \sgii\sgiiBundle\Entity\TblUsuario $usuario
     * @return TblUsuarioProyecto
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
     * Set proyecto
     *
     * @param \sgii\sgiiBundle\Entity\TblProyecto $proyecto
     * @return TblUsuarioProyecto
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