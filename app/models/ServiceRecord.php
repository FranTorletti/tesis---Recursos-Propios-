<?php
/**
 * Service
 *
 * @Table(name="serviceRecord")
 * @Entity(repositoryClass="ServiceRecordRepository")
 */
class ServiceRecord {
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
     * @ManyToOne(targetEntity = "Dependence", inversedBy="Dependence")
     * @JoinColumn(name="dependence_id", referencedColumnName="id",  onDelete="SET NULL")
     */
    private $dependence;

    /**
     * @ManyToOne(targetEntity = "ServiceType", inversedBy="ServiceType")
     * @JoinColumn(name="serviceType_id", referencedColumnName="id",  onDelete="SET NULL")
     */
    private $serviceType;
    
    /**
     * @ManyToOne(targetEntity = "ResourceOrigin", inversedBy="ResourceOrigin")
     * @JoinColumn(name="resourceOrigin_id", referencedColumnName="id",  onDelete="SET NULL")
     */
    private $resourceOrigin;

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
}
 
?>