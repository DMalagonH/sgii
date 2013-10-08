<?php

namespace sgii\sgiiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblOrganizacion
 *
 * @ORM\Table(name="tbl_organizacion")
 * @ORM\Entity
 */
class TblOrganizacion
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
     * @ORM\Column(name="org_nombre", type="string", length=45, nullable=false)
     */
    private $orgNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="org_descripcion", type="text", nullable=true)
     */
    private $orgDescripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="org_sitio_web", type="text", nullable=true)
     */
    private $orgSitioWeb;



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
     * Set orgNombre
     *
     * @param string $orgNombre
     * @return TblOrganizacion
     */
    public function setOrgNombre($orgNombre)
    {
        $this->orgNombre = $orgNombre;
    
        return $this;
    }

    /**
     * Get orgNombre
     *
     * @return string 
     */
    public function getOrgNombre()
    {
        return $this->orgNombre;
    }

    /**
     * Set orgDescripcion
     *
     * @param string $orgDescripcion
     * @return TblOrganizacion
     */
    public function setOrgDescripcion($orgDescripcion)
    {
        $this->orgDescripcion = $orgDescripcion;
    
        return $this;
    }

    /**
     * Get orgDescripcion
     *
     * @return string 
     */
    public function getOrgDescripcion()
    {
        return $this->orgDescripcion;
    }

    /**
     * Set orgSitioWeb
     *
     * @param string $orgSitioWeb
     * @return TblOrganizacion
     */
    public function setOrgSitioWeb($orgSitioWeb)
    {
        $this->orgSitioWeb = $orgSitioWeb;
    
        return $this;
    }

    /**
     * Get orgSitioWeb
     *
     * @return string 
     */
    public function getOrgSitioWeb()
    {
        return $this->orgSitioWeb;
    }
}