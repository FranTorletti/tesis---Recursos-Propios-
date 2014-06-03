<?php
/**
 * ServiceType
 *
 * @Table(name="serviceType")
 * @Entity(repositoryClass="ServiceTypeRepository")
 */
class ServiceType {
    /**
     * @var integer
     *
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var $designation
     *
     * @Column(name="designation", type="string")
     */
    private $designation;

    /**
     * @var string
     *
     * @Column(name="note", type="string", length=255)
     */
    private $note;
    
    /**
     * @var string
     *
     * @Column(name="facRetention", type="float")
     */
    private $facRetention;

    /**
     * @var string
     *
     * @Column(name="uniRetention", type="float")
     */
    private $uniRetention;

    /**
     * @OneToMany(targetEntity="Service", mappedBy="serviceType")
     */
    private $services;

    // ------------ gets and set method ----------

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * Set designation
     *
     * @param string $designation
     * @return designation
     */
    public function setDesignation($designation) {
        $this->designation = $designation;
        return $this;
    }

    /**
     * Get designation
     *
     * @return designation
     */
    public function getDesignation() {
        return $this->designation;
    }

    /**
     * Set note
     *
     * @param string $note
     * @return note
     */
    public function setNote($note) {
        $this->note = $note;
        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote() {
        return $this->note;
    }


    /**
     * Set facRetention
     *
     * @param string $facRetention
     * @return facRetention
     */
    public function setFacRetention($facRetention) {
        $this->facRetention = $facRetention;
        return $this;
    }

    /**
     * Get facRetention
     *
     * @return string 
     */
    public function getFacRetention() {
        return $this->facRetention;
    }

    /**
     * Set uniRetention
     *
     * @param string $uniRetention
     * @return uniRetention
     */
    public function setUniRetention($uniRetention) {
        $this->uniRetention = $uniRetention;
        return $this;
    }

    /**
     * Get uniRetention
     *
     * @return string 
     */
    public function getUniRetention() {
        return $this->uniRetention;
    }
    

    /**
     * Get services
     *
     * @return services 
     */
    public function getServices() {
        return $this->services;
    }
}
 
?>