<?php
/**
 * Service
 *
 * @Table(name="service")
 * @Entity(repositoryClass="ServiceRepository")
 */
class Service {
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
     * @var $designation
     *
     * @Column(name="designation", type="string")
     */
    private $designation;

    /**
     * @ManyToOne(targetEntity = "Dependence", inversedBy="Dependence" )
     */
    private $dependence;

    /**
     * @ManyToOne(targetEntity = "ServiceType", inversedBy="ServiceType" )
     */
    private $serviceType;
    
    /**
     * @ManyToOne(targetEntity = "ResourceOrigin", inversedBy="ResourceOrigin" )
     */
    private $resourceOrigin;

    /**
     * @OneToMany(targetEntity="ServiceUser", mappedBy="service")
     */
    private $serviceUsers;

    /**
     * @ManyToOne(targetEntity = "ActivityType", inversedBy="ActivityType" )
     */
    private $activityType;

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
     * Set dependence
     *
     * @param string $dependence
     * @return dependence
     */
    public function setDependence($dependence) {
        $this->dependence = $dependence;
        return $this;
    }

    /**
     * Get dependence
     *
     * @return dependence 
     */
    public function getDependence() {
        return $this->dependence;
    }

    /**
     * Set serviceType
     *
     * @param string $serviceType
     * @return serviceType
     */
    public function setServiceType($serviceType) {
        $this->serviceType = $serviceType;
        return $this;
    }

    /**
     * Get serviceType
     *
     * @return serviceType 
     */
    public function getServiceType() {
        return $this->serviceType;
    }

    /**
     * Set resourceOrigin
     *
     * @param string $resourceOrigin
     * @return resourceOrigin
     */
    public function setResourceOrigin($resourceOrigin) {
        $this->resourceOrigin = $resourceOrigin;
        return $this;
    }

    /**
     * Get resourceOrigin
     *
     * @return resourceOrigin 
     */
    public function getResourceOrigin() {
        return $this->resourceOrigin;
    }
    
    /**
     * Get serviceUsers
     *
     * @return serviceUsers 
     */
    public function getServiceUsers() {
        return $this->serviceUsers;
    }

    /**
     * Set activityType
     *
     * @param string $activityType
     * @return activityType
     */
    public function setActivityType($activityType) {
        $this->activityType = $activityType;
        return $this;
    }

    /**
     * Get activityType
     *
     * @return string 
     */
    public function getActivityType() {
        return $this->activityType;
    }


    private function generateCode($lastService){
        if($lastService){
            $code = $lastService->getCode();
            $char = ++$code[0];
            $number = intval(substr($code,1,3)) +1;
            return $code.strval($number);
        }
        return "A00";
    }
}
 
?>