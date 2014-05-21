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
     * @var string
     *
     * @Column(name="dni", type="string", length=255)
     */
    private $dni;

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
     * @Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @Column(name="phone", type="string", length=255)
     */
    private $phone;

    /**
     * @var $birthday
     *
     * @Column(name="birthday", type="string")
     */
    private $birthday;

    /**
     * @var string
     *
     * @Column(name="type", type="string", length=255)
     */
    private $type;

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
     * Set dni
     *
     * @param string $dni
     * @return dni
     */
    public function setDni($dni) {
        $this->dni = $dni;
        return $this;
    }

    /**
     * Get dni
     *
     * @return string 
     */
    public function getDni() {
        return $this->dni;
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
     * Set address
     *
     * @param string $address
     * @return address
     */
    public function setAddress($address) {
        $this->address = $address;
        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return phone
     */
    public function setPhone($phone) {
        $this->phone = $phone;
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone() {
        return $this->phone;
    }

    /**
     * Set Birthday
     *
     * @param birthday $birthday
     * @return birthday
     */
    public function setBirthday($birthday) {
        $this->birthday = $birthday;
        return $this;
    }

    /**
     * Get Birthday
     *
     * @return birthday
     */
    public function getBirthday() {
        return $this->birthday;
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
}
 
?>