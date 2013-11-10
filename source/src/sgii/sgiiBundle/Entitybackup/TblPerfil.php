<?php

namespace sgii\sgiiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblPerfil
 *
 * @ORM\Table(name="tbl_perfil")
 * @ORM\Entity
 */
class TblPerfil
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
     * @ORM\Column(name="per_perfil", type="string", length=250, nullable=false)
     */
    private $perPerfil;

    /**
     * @var boolean
     *
     * @ORM\Column(name="per_estado", type="boolean", nullable=false)
     */
    private $perEstado;



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
     * Set perPerfil
     *
     * @param string $perPerfil
     * @return TblPerfil
     */
    public function setPerPerfil($perPerfil)
    {
        $this->perPerfil = $perPerfil;
    
        return $this;
    }

    /**
     * Get perPerfil
     *
     * @return string 
     */
    public function getPerPerfil()
    {
        return $this->perPerfil;
    }

    /**
     * Set perEstado
     *
     * @param boolean $perEstado
     * @return TblPerfil
     */
    public function setPerEstado($perEstado)
    {
        $this->perEstado = $perEstado;
    
        return $this;
    }

    /**
     * Get perEstado
     *
     * @return boolean 
     */
    public function getPerEstado()
    {
        return $this->perEstado;
    }
}