<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-05-31 18:07:12.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace Umg\EscuelaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Umg\EscuelaBundle\Entity\Responsable
 *
 * @ORM\Entity()
 * @ORM\Table(name="Responsable")
 */
class Responsable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="bigint")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    protected $Nombre;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $Documento;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $Dirección;

    /**
     * @ORM\OneToMany(targetEntity="AlumnoResponsable", mappedBy="responsable")
     * @ORM\JoinColumn(name="id", referencedColumnName="Responsable_id")
     */
    protected $alumnoResponsables;

    public function __construct()
    {
        $this->alumnoResponsables = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \Umg\EscuelaBundle\Entity\Responsable
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Nombre.
     *
     * @param string $Nombre
     * @return \Umg\EscuelaBundle\Entity\Responsable
     */
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    /**
     * Get the value of Nombre.
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * Set the value of Documento.
     *
     * @param string $Documento
     * @return \Umg\EscuelaBundle\Entity\Responsable
     */
    public function setDocumento($Documento)
    {
        $this->Documento = $Documento;

        return $this;
    }

    /**
     * Get the value of Documento.
     *
     * @return string
     */
    public function getDocumento()
    {
        return $this->Documento;
    }

    /**
     * Set the value of Dirección.
     *
     * @param string $Dirección
     * @return \Umg\EscuelaBundle\Entity\Responsable
     */
    public function setDirección($Dirección)
    {
        $this->Dirección = $Dirección;

        return $this;
    }

    /**
     * Get the value of Dirección.
     *
     * @return string
     */
    public function getDirección()
    {
        return $this->Dirección;
    }

    /**
     * Add AlumnoResponsable entity to collection (one to many).
     *
     * @param \Umg\EscuelaBundle\Entity\AlumnoResponsable $alumnoResponsable
     * @return \Umg\EscuelaBundle\Entity\Responsable
     */
    public function addAlumnoResponsable(AlumnoResponsable $alumnoResponsable)
    {
        $this->alumnoResponsables[] = $alumnoResponsable;

        return $this;
    }

    /**
     * Remove AlumnoResponsable entity from collection (one to many).
     *
     * @param \Umg\EscuelaBundle\Entity\AlumnoResponsable $alumnoResponsable
     * @return \Umg\EscuelaBundle\Entity\Responsable
     */
    public function removeAlumnoResponsable(AlumnoResponsable $alumnoResponsable)
    {
        $this->alumnoResponsables->removeElement($alumnoResponsable);

        return $this;
    }

    /**
     * Get AlumnoResponsable entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAlumnoResponsables()
    {
        return $this->alumnoResponsables;
    }

    public function __sleep()
    {
        return array('id', 'Nombre', 'Documento', 'Dirección');
    }
}