<?php
/**
 * Dependence
 *
 * @Table(name="transactionType")
 * @Entity(repositoryClass="TransactionTypeRepository")
 */
class TransactionType {
    /**
     * @var integer
     *
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var $type
     *
     * @Column(name="type", type="string")
     */
    private $type;

    /**
     * @var string
     *
     * @Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @Column(name="description", type="string", length=255)
     */
    private $description;

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
     * Set type
     *
     * @param string $type
     * @return type
     */
    public function setType($type) {
        $this->type = $type;
        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return string
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
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
}
 
?>