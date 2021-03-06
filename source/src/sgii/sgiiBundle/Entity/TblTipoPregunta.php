<?php

namespace sgii\sgiiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblTipoPregunta
 *
 * @ORM\Table(name="tbl_tipo_pregunta")
 * @ORM\Entity
 */
class TblTipoPregunta
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
     * @ORM\Column(name="tpr_tipo_pregunta", type="string", length=250, nullable=false)
     */
    private $tprTipoPregunta;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tpr_estado", type="boolean", nullable=false)
     */
    private $tprEstado;



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
     * Set tprTipoPregunta
     *
     * @param string $tprTipoPregunta
     * @return TblTipoPregunta
     */
    public function setTprTipoPregunta($tprTipoPregunta)
    {
        $this->tprTipoPregunta = $tprTipoPregunta;
    
        return $this;
    }

    /**
     * Get tprTipoPregunta
     *
     * @return string 
     */
    public function getTprTipoPregunta()
    {
        return $this->tprTipoPregunta;
    }

    /**
     * Set tprEstado
     *
     * @param boolean $tprEstado
     * @return TblTipoPregunta
     */
    public function setTprEstado($tprEstado)
    {
        $this->tprEstado = $tprEstado;
    
        return $this;
    }

    /**
     * Get tprEstado
     *
     * @return boolean 
     */
    public function getTprEstado()
    {
        return $this->tprEstado;
    }
}