<?php
/**
 * User
 *
 * @Table(name="user")
 * @Entity(repositoryClass="UserRepository")
 */
class User {
    /**
     * @var integer
     *
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var $documentType
     *
     * @Column(name="documentType", type="string")
     */
    private $documentType;

    /**
     * @var string
     *
     * @Column(name="document", type="string", length=255)
     */
    private $document;

    /**
     * @var string
     *
     * @Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
     * @var string
     *
     * @Column(name="surname", type="string", length=255)
     */
    private $surname;
    
    /**
     * @var string
     *
     * @Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @OneToMany(targetEntity="ServiceUser", mappedBy="user")
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
     * Set documentType
     *
     * @param birthday $documentType
     * @return birthday
     */
    public function setDocumentType($documentType) {
        $this->documentType = $documentType;
        return $this;
    }

    /**
     * Get documentType
     *
     * @return documentType
     */
    public function getDocumentType() {
        return $this->documentType;
    }

    /**
     * Set document
     *
     * @param string $document
     * @return document
     */
    public function setDocument($document) {
        $this->document = $document;
        return $this;
    }

    /**
     * Get document
     *
     * @return string 
     */
    public function getDocument() {
        return $this->document;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return name
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
     * Set surname
     *
     * @param string $surname
     * @return surname
     */
    public function setSurname($surname) {
        $this->surname = $surname;
        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname() {
        return $this->surname;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return email
     */
    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return password
     */
    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getpassword() {
        return $this->password;
    }

    /**
     * Set Type
     *
     * @param string $type
     * @return type
     */
    public function setType($type) {
        $this->type = $type;
        return $this;
    }

    /**
     * Get Type
     *
     * @return string 
     */
    public function getType() {
        return $this->type;
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