<?php

namespace sgii\sgiiBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TblTipoInvestigacion
 *
 * @ORM\Table(name="tbl_tipo_investigacion")
 * @ORM\Entity
 */
class TblTipoInvestigacion
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
     * @ORM\Column(name="tin_nombre_tipo", type="string", length=250, nullable=false)
     * @Assert\NotNull()
     * @Assert\Length(min = 3,  max = "200")
     */
    private $tinNombreTipo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tin_estado", type="boolean", nullable=false)
     */
    private $tinEstado;



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
     * Set tinNombreTipo
     *
     * @param string $tinNombreTipo
     * @return TblTipoInvestigacion
     */
    public function setTinNombreTipo($tinNombreTipo)
    {
        $this->tinNombreTipo = $tinNombreTipo;
    
        return $this;
    }

    /**
     * Get tinNombreTipo
     *
     * @return string 
     */
    public function getTinNombreTipo()
    {
        return $this->tinNombreTipo;
    }

    /**
     * Set tinEstado
     *
     * @param boolean $tinEstado
     * @return TblTipoInvestigacion
     */
    public function setTinEstado($tinEstado)
    {
        $this->tinEstado = $tinEstado;
    
        return $this;
    }

    /**
     * Get tinEstado
     *
     * @return boolean 
     */
    public function getTinEstado()
    {
        return $this->tinEstado;
    }
}