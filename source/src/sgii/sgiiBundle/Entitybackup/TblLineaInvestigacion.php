<?php

namespace sgii\sgiiBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TblLineaInvestigacion
 *
 * @ORM\Table(name="tbl_linea_investigacion")
 * @ORM\Entity
 */
class TblLineaInvestigacion
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
     * @ORM\Column(name="lin_nombre_investigacion", type="string", length=250, nullable=false)
     * @Assert\NotNull()
     * @Assert\Length(min = 3,  max = "200")
     */
    private $linNombreInvestigacion;

    /**
     * @var boolean
     * @ORM\Column(name="lin_estado", type="boolean", nullable=false)
     */
    private $linEstado;



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
     * Set linNombreInvestigacion
     *
     * @param string $linNombreInvestigacion
     * @return TblLineaInvestigacion
     */
    public function setLinNombreInvestigacion($linNombreInvestigacion)
    {
        $this->linNombreInvestigacion = $linNombreInvestigacion;
    
        return $this;
    }

    /**
     * Get linNombreInvestigacion
     *
     * @return string 
     */
    public function getLinNombreInvestigacion()
    {
        return $this->linNombreInvestigacion;
    }

    /**
     * Set linEstado
     *
     * @param boolean $linEstado
     * @return TblLineaInvestigacion
     */
    public function setLinEstado($linEstado)
    {
        $this->linEstado = $linEstado;
    
        return $this;
    }

    /**
     * Get linEstado
     *
     * @return boolean 
     */
    public function getLinEstado()
    {
        return $this->linEstado;
    }
}