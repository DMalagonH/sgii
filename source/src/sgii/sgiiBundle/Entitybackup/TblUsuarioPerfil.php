<?php

namespace sgii\sgiiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblUsuarioPerfil
 *
 * @ORM\Table(name="tbl_usuario_perfil")
 * @ORM\Entity
 */
class TblUsuarioPerfil
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
     * @ORM\Column(name="perfil_id", type="integer", nullable=false)
     */
    private $perfilId;



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
     * @return TblUsuarioPerfil
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
     * Set perfilId
     *
     * @param integer $perfilId
     * @return TblUsuarioPerfil
     */
    public function setPerfilId($perfilId)
    {
        $this->perfilId = $perfilId;
    
        return $this;
    }

    /**
     * Get perfilId
     *
     * @return integer 
     */
    public function getPerfilId()
    {
        return $this->perfilId;
    }
}