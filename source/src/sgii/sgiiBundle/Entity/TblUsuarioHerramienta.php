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
     * @var boolean
     *
     * @ORM\Column(name="ush_aplico", type="boolean", nullable=true)
     */
    private $ushAplico;

    /**
     * @var \TblHerramienta
     *
     * @ORM\ManyToOne(targetEntity="TblHerramienta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="herramienta_id", referencedColumnName="id")
     * })
     */
    private $herramienta;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
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

    /**
     * Set herramienta
     *
     * @param \sgii\sgiiBundle\Entity\TblHerramienta $herramienta
     * @return TblUsuarioHerramienta
     */
    public function setHerramienta(\sgii\sgiiBundle\Entity\TblHerramienta $herramienta = null)
    {
        $this->herramienta = $herramienta;
    
        return $this;
    }

    /**
     * Get herramienta
     *
     * @return \sgii\sgiiBundle\Entity\TblHerramienta 
     */
    public function getHerramienta()
    {
        return $this->herramienta;
    }

    /**
     * Set usuario
     *
     * @param \sgii\sgiiBundle\Entity\TblUsuario $usuario
     * @return TblUsuarioHerramienta
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
}