<?php
/**
 * ServiceUser
 *
 * @Table(name="serviceUser")
 * @Entity(repositoryClass="ServiceUserRepository")
 */
class ServiceUser {
    /**
     * @var integer
     *
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ManyToOne(targetEntity = "Service", inversedBy="User" )
     */
    private $service;

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
     * Set service
     *
     * @param string $service
     * @return service
     */
    public function setService($service) {
        $this->service = $service;
        return $this;
    }

    /**
     * Get service
     *
     * @return service
     */
    public function getService() {
        return $this->service;
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