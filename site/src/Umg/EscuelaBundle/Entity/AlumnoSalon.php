<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-05-31 18:07:12.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace Umg\EscuelaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Umg\EscuelaBundle\Entity\AlumnoSalon
 *
 * @ORM\Entity()
 * @ORM\Table(name="AlumnoSalon", indexes={@ORM\Index(name="fk_AlumnoSalon_Alumno1_idx", columns={"Alumno_id"}), @ORM\Index(name="fk_AlumnoSalon_Salon1_idx", columns={"Salon_id"})})
 */
class AlumnoSalon
{
    /**
     * @ORM\Id
     * @ORM\Column(type="bigint")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="bigint")
     */
    protected $Alumno_id;

    /**
     * @ORM\Column(type="bigint")
     */
    protected $Salon_id;

    /**
     * @ORM\ManyToOne(targetEntity="Alumno", inversedBy="alumnoSalons")
     * @ORM\JoinColumn(name="Alumno_id", referencedColumnName="id")
     */
    protected $alumno;

    /**
     * @ORM\ManyToOne(targetEntity="Salon", inversedBy="alumnoSalons")
     * @ORM\JoinColumn(name="Salon_id", referencedColumnName="id")
     */
    protected $salon;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \Umg\EscuelaBundle\Entity\AlumnoSalon
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
     * Set the value of Alumno_id.
     *
     * @param integer $Alumno_id
     * @return \Umg\EscuelaBundle\Entity\AlumnoSalon
     */
    public function setAlumnoId($Alumno_id)
    {
        $this->Alumno_id = $Alumno_id;

        return $this;
    }

    /**
     * Get the value of Alumno_id.
     *
     * @return integer
     */
    public function getAlumnoId()
    {
        return $this->Alumno_id;
    }

    /**
     * Set the value of Salon_id.
     *
     * @param integer $Salon_id
     * @return \Umg\EscuelaBundle\Entity\AlumnoSalon
     */
    public function setSalonId($Salon_id)
    {
        $this->Salon_id = $Salon_id;

        return $this;
    }

    /**
     * Get the value of Salon_id.
     *
     * @return integer
     */
    public function getSalonId()
    {
        return $this->Salon_id;
    }

    /**
     * Set Alumno entity (many to one).
     *
     * @param \Umg\EscuelaBundle\Entity\Alumno $alumno
     * @return \Umg\EscuelaBundle\Entity\AlumnoSalon
     */
    public function setAlumno(Alumno $alumno = null)
    {
        $this->alumno = $alumno;

        return $this;
    }

    /**
     * Get Alumno entity (many to one).
     *
     * @return \Umg\EscuelaBundle\Entity\Alumno
     */
    public function getAlumno()
    {
        return $this->alumno;
    }

    /**
     * Set Salon entity (many to one).
     *
     * @param \Umg\EscuelaBundle\Entity\Salon $salon
     * @return \Umg\EscuelaBundle\Entity\AlumnoSalon
     */
    public function setSalon(Salon $salon = null)
    {
        $this->salon = $salon;

        return $this;
    }

    /**
     * Get Salon entity (many to one).
     *
     * @return \Umg\EscuelaBundle\Entity\Salon
     */
    public function getSalon()
    {
        return $this->salon;
    }

    public function __sleep()
    {
        return array('id', 'Alumno_id', 'Salon_id');
    }
}