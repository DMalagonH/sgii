<?php

namespace sgii\sgiiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblUsuarioHerramienta
 *
 * @ORM\Table(name="tbl_usuario_herramienta")
 * @ORM\Entity
 */
class TblUsuarioHerramienta
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
     * @ORM\Column(name="herramienta_id", type="integer", nullable=false)
     */
    private $herramientaId;

    /**
     * @var integer
     *
     * @ORM\Column(name="usuario_id", type="integer", nullable=false)
     */
    private $usuarioId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ush_aplico", type="boolean", nullable=true)
     */
    private $ushAplico;



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
     * Set herramientaId
     *
     * @param integer $herramientaId
     * @return TblUsuarioHerramienta
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
     * Set usuarioId
     *
     * @param integer $usuarioId
     * @return TblUsuarioHerramienta
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
     * Set ushAplico
     *
     * @param boolean $ushAplico
     * @return TblUsuarioHerramienta
     */
    public function setUshAplico($ushAplico)
    {
        $this->ushAplico = $ushAplico;
    
        return $this;
    }

    /**
     * Get ushAplico
     *
     * @return boolean 
     */
    public function getUshAplico()
    {
        return $this->ushAplico;
    }
}