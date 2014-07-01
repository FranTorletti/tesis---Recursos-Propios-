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

    /**
     * @OneToMany(targetEntity="ServiceUser", mappedBy="service")
     */
    private $serviceUsers;

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

    public function generateCode($serviceTypeCode,$resourceOriginCode,$dependenceCode){
        $activityType = Model::getEM()->getRepository("ServiceType")->getByCode($serviceTypeCode);
        $resourceOrigin = Model::getEM()->getRepository("ResourceOrigin")->getByCode($resourceOriginCode);
        $dependence = Model::getEM()->getRepository("Dependence")->getByCode($dependenceCode);

        $code = Model::getEM()->getRepository("Service")->getLastService($activityType->getId(),$resourceOrigin->getId(),$dependence->getId());
        if($code){
            $number = substr($code,1,3);
            if ($number == "99") {
                $char = $code[0];
                $char = ($char == "Z") ? "A" : ++$char;
                return $char."00";
            }else{
                if(strlen(++$number) == 1)
                    $number = "0".$number;
                    $char = $code[0];
                    return $char.$number;    
            }
        }
        return "A00";
    }
}
 
?>