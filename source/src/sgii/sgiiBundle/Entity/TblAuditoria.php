<?php

namespace sgii\sgiiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblAuditoria
 *
 * @ORM\Table(name="tbl_auditoria")
 * @ORM\Entity
 */
class TblAuditoria
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
     * @ORM\Column(name="aud_usuario_id", type="integer", nullable=false)
     */
    private $audUsuarioId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="aud_fecha", type="datetime", nullable=false)
     */
    private $audFecha;

    /**
     * @var string
     *
     * @ORM\Column(name="aud_accion", type="string", length=255, nullable=false)
     */
    private $audAccion;

    /**
     * @var string
     *
     * @ORM\Column(name="aud_ip_acceso", type="string", length=45, nullable=false)
     */
    private $audIpAcceso;



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
     * Set audUsuarioId
     *
     * @param integer $audUsuarioId
     * @return TblAuditoria
     */
    public function setAudUsuarioId($audUsuarioId)
    {
        $this->audUsuarioId = $audUsuarioId;
    
        return $this;
    }

    /**
     * Get audUsuarioId
     *
     * @return integer 
     */
    public function getAudUsuarioId()
    {
        return $this->audUsuarioId;
    }

    /**
     * Set audFecha
     *
     * @param \DateTime $audFecha
     * @return TblAuditoria
     */
    public function setAudFecha($audFecha)
    {
        $this->audFecha = $audFecha;
    
        return $this;
    }

    /**
     * Get audFecha
     *
     * @return \DateTime 
     */
    public function getAudFecha()
    {
        return $this->audFecha;
    }

    /**
     * Set audAccion
     *
     * @param string $audAccion
     * @return TblAuditoria
     */
    public function setAudAccion($audAccion)
    {
        $this->audAccion = $audAccion;
    
        return $this;
    }

    /**
     * Get audAccion
     *
     * @return string 
     */
    public function getAudAccion()
    {
        return $this->audAccion;
    }

    /**
     * Set audIpAcceso
     *
     * @param string $audIpAcceso
     * @return TblAuditoria
     */
    public function setAudIpAcceso($audIpAcceso)
    {
        $this->audIpAcceso = $audIpAcceso;
    
        return $this;
    }

    /**
     * Get audIpAcceso
     *
     * @return string 
     */
    public function getAudIpAcceso()
    {
        return $this->audIpAcceso;
    }
}