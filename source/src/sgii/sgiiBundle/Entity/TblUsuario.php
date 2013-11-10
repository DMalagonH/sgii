<?php

namespace sgii\sgiiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TblUsuario
 *
 * @ORM\Table(name="tbl_usuario")
 * @ORM\Entity
 */
class TblUsuario
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
     * @ORM\Column(name="usu_cedula", type="string", length=20, nullable=true)
     */
    private $usuCedula;

    /**
     * @var string
     *
     * @ORM\Column(name="usu_nombre", type="string", length=250, nullable=true)
     * @Assert\NotNull()
     */
    private $usuNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="usu_apellido", type="string", length=70, nullable=true)
     * @Assert\NotNull()
     */
    private $usuApellido;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="usu_fecha_creacion", type="datetime", nullable=true)
     */
    private $usuFechaCreacion;

    /**
     * @var string
     *
     * @ORM\Column(name="usu_log", type="string", length=250, nullable=true)
     * @Assert\NotNull()
     * @Assert\Email()
     */
    private $usuLog;

    /**
     * @var string
     *
     * @ORM\Column(name="usu_password", type="string", length=250, nullable=true)
     * @Assert\NotNull()
     */
    private $usuPassword;

    /**
     * @var boolean
     *
     * @ORM\Column(name="usu_estado", type="boolean", nullable=true)
     */
    private $usuEstado;

    /**
     * @var integer
     *
     * @ORM\Column(name="cargo_id", type="integer", nullable=true)
     */
    private $cargoId;

    /**
     * @var integer
     *
     * @ORM\Column(name="departamento_id", type="integer", nullable=true)
     */
    private $departamentoId;

    /**
     * @var integer
     *
     * @ORM\Column(name="organizacion_id", type="integer", nullable=true)
     */
    private $organizacionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="nivel_id", type="integer", nullable=true)
     */
    private $nivelId;


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
     * Set usuCedula
     *
     * @param string $usuCedula
     * @return TblUsuario
     */
    public function setUsuCedula($usuCedula)
    {
        $this->usuCedula = $usuCedula;
    
        return $this;
    }

    /**
     * Get usuCedula
     *
     * @return string 
     */
    public function getUsuCedula()
    {
        return $this->usuCedula;
    }

    /**
     * Set usuNombre
     *
     * @param string $usuNombre
     * @return TblUsuario
     */
    public function setUsuNombre($usuNombre)
    {
        $this->usuNombre = $usuNombre;
    
        return $this;
    }

    /**
     * Get usuNombre
     *
     * @return string 
     */
    public function getUsuNombre()
    {
        return $this->usuNombre;
    }

    /**
     * Set usuApellido
     *
     * @param string $usuApellido
     * @return TblUsuario
     */
    public function setUsuApellido($usuApellido)
    {
        $this->usuApellido = $usuApellido;
    
        return $this;
    }

    /**
     * Get usuApellido
     *
     * @return string 
     */
    public function getUsuApellido()
    {
        return $this->usuApellido;
    }

    /**
     * Set usuFechaCreacion
     *
     * @param \DateTime $usuFechaCreacion
     * @return TblUsuario
     */
    public function setUsuFechaCreacion($usuFechaCreacion)
    {
        $this->usuFechaCreacion = $usuFechaCreacion;
    
        return $this;
    }

    /**
     * Get usuFechaCreacion
     *
     * @return \DateTime 
     */
    public function getUsuFechaCreacion()
    {
        return $this->usuFechaCreacion;
    }

    /**
     * Set usuLog
     *
     * @param string $usuLog
     * @return TblUsuario
     */
    public function setUsuLog($usuLog)
    {
        $this->usuLog = $usuLog;
    
        return $this;
    }

    /**
     * Get usuLog
     *
     * @return string 
     */
    public function getUsuLog()
    {
        return $this->usuLog;
    }

    /**
     * Set usuPassword
     *
     * @param string $usuPassword
     * @return TblUsuario
     */
    public function setUsuPassword($usuPassword)
    {
        $this->usuPassword = $usuPassword;
    
        return $this;
    }

    /**
     * Get usuPassword
     *
     * @return string 
     */
    public function getUsuPassword()
    {
        return $this->usuPassword;
    }

    /**
     * Set usuEstado
     *
     * @param boolean $usuEstado
     * @return TblUsuario
     */
    public function setUsuEstado($usuEstado)
    {
        $this->usuEstado = $usuEstado;
    
        return $this;
    }

    /**
     * Get usuEstado
     *
     * @return boolean 
     */
    public function getUsuEstado()
    {
        return $this->usuEstado;
    }

    /**
     * Set cargoId
     *
     * @param integer $cargoId
     * @return TblUsuario
     */
    public function setCargoId($cargoId)
    {
        $this->cargoId = $cargoId;
    
        return $this;
    }

    /**
     * Get cargoId
     *
     * @return integer 
     */
    public function getCargoId()
    {
        return $this->cargoId;
    }

    /**
     * Set departamentoId
     *
     * @param integer $departamentoId
     * @return TblUsuario
     */
    public function setDepartamentoId($departamentoId)
    {
        $this->departamentoId = $departamentoId;
    
        return $this;
    }

    /**
     * Get departamentoId
     *
     * @return integer 
     */
    public function getDepartamentoId()
    {
        return $this->departamentoId;
    }

    /**
     * Set organizacionId
     *
     * @param integer $organizacionId
     * @return TblUsuario
     */
    public function setOrganizacionId($organizacionId)
    {
        $this->organizacionId = $organizacionId;
    
        return $this;
    }

    /**
     * Get organizacionId
     *
     * @return integer 
     */
    public function getOrganizacionId()
    {
        return $this->organizacionId;
    }
    
    /**
     * Set nivelId
     *
     * @param integer $nivelId
     * @return TblUsuario
     */
    public function setNivelId($nivelId)
    {
        $this->nivelId = $nivelId;
    
        return $this;
    }

    /**
     * Get nivelId
     *
     * @return integer 
     */
    public function getNivelId()
    {
        return $this->nivelId;
    }
}