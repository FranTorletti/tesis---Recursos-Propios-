<?php
/**
 * ActivityType
 *
 * @Table(name="activityType")
 * @Entity(repositoryClass="ActivityTypeRepository")
 */
class ActivityType {
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
     * @OneToMany(targetEntity="Service", mappedBy="activityType")
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
     * Get services
     *
     * @return string 
     */
    public function getServices() {
        return $this->services;
    }
}
 
?>