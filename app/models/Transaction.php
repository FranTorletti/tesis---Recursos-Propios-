<?php
/**
 * Transaction
 *
 * @Table(name="transaction")
 * @Entity(repositoryClass="TransactionRepository")
 */
class Transaction {

//    public function __construct(){
  //      $this->date = new \DateTime();
    //} 

    /**
     * @var integer
     *
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var $string
     *
     * @Column(name="type", type="string")
     */
    private $type;

    /**
     * @var string
     *
     * @Column(name="transactionType", type="string", length=255)
     */
    private $transactionType;

    /**
     * @var date
     *
     * @Column(name="date", type="date")
     */
    private $date;

    /**
     * @var $string
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
     * @Column(name="amount", type="string", length=255)
     */
    private $amount;

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
     * @ManyToOne(targetEntity = "User", inversedBy="User" )
     */
    private $user;

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
     * @return type
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Set transactionType
     *
     * @param string $transactionType
     * @return string
     */
    public function setTransactionType($transactionType) {
        $this->transactionType = $transactionType;
        return $this;
    }

    /**
     * Get transactionType
     *
     * @return type
     */
    public function getTransactionType() {
        return $this->transactionType;
    }

    /**
     * Set Date
     *
     * @param date $date
     * @return date
     */
    public function setDate($date) {
        $this->date = $date;
        return $this;
    }
    /**
     * Get Date
     *
     * @return date
     */
    public function getDate() {
        return $this->date;
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
     * @return string 
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
     * Set amount
     *
     * @param string $amount
     * @return amount
     */
    public function setAmount($amount) {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Get amount
     *
     * @return string 
     */
    public function getAmount() {
        return $this->amount;
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
     * Set user
     *
     * @param string $user
     * @return user
     */
    public function setUser($user) {
        $this->user = $user;
        return $this;
    }

    /**
     * Get user
     *
     * @return user 
     */
    public function getUser() {
        return $this->user;
    }
}
 
?>