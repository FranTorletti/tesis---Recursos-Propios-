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
     * @var $code
     *
     * @Column(name="code", type="string")
     */
    private $code;

    /**
     * @var string
     *
     * @Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @Column(name="note", type="string", length=255)
     */
    private $note;
    
    /**
     * @var string
     *
     * @Column(name="facRetention", type="string", length=255)
     */
    private $facRetention;

    /**
     * @var string
     *
     * @Column(name="uniRetention", type="string", length=255)
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
     * Set code
     *
     * @param string $code
     * @return code
     */
    public function setCode($code) {
        $this->code = $code;
        return $this;
    }

    /**
     * Get code
     *
     * @return code
     */
    public function getCode() {
        return $this->code;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return description
     */
    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription() {
        return $this->description;
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