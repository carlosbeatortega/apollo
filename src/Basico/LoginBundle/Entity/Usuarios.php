<?php


namespace Basico\LoginBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Basico\EmpresaBundle\Entity\Empresas;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Basico\LoginBundle\Entity\Usuarios
 * 
 * @ORM\Entity
 * @ORM\Table(name="usuarios")
 * @ORM\Entity(repositoryClass="Basico\LoginBundle\Entity\UsuariosRepository")
 */
class Usuarios extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

/**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Introduce Nombre.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *      min = "2",
     *      max = "50",
     *      minMessage = "Nombre demasiado corto. {{ limit }} de longitud mínima",
     *      maxMessage = "Nombre demasiado largo. {{ limit }} de longitud máxima"
     * )
     */
    protected $name;
    
    /**
     * @var string $foto
     *
     * @ORM\Column(name="foto", type="string", length=255, nullable=true)
     */
    protected $foto;

    /**
     * @var string $dni
     *
     * @ORM\Column(name="dni", type="string", length=10)
     */
    protected $dni;

    /**
     * @var string $fechaalta
     *
     * @ORM\Column(name="fechaalta", type="datetime", nullable=false)
     */
    protected $fechaalta;

    /**
     * @var string $fechanacimiento
     *
     * @ORM\Column(name="fechanacimiento", type="datetime", nullable=false)
     */
    protected $fechanacimiento;

    /**
     * @var string $numero_cuenta
     *
     * @ORM\Column(name="numero_cuenta", type="string", length=20,nullable=true)
     */
    protected $numero_cuenta;

    /**
     * @var string $passwordCanonical
     *
     * @ORM\Column(name="passwordCanonical", type="string", length=100,nullable=true)
     */
    protected $passwordCanonical;

    /**
     * @var string $calendario
     *
     * @ORM\Column(name="calendario", type="string", length=100,nullable=true)
     */
    protected $calendario;
    
    /** @ORM\ManyToOne(targetEntity="Basico\EmpresaBundle\Entity\Empresas") */
    protected $empresas;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set sociedades_id
     *
     * @param integer $sociedadesId
     * @return Usuarios
     */
    public function setSociedadesId($sociedadesId)
    {
        $this->sociedades_id = $sociedadesId;
    
        return $this;
    }

    /**
     * Get sociedades_id
     *
     * @return integer 
     */
    public function getSociedadesId()
    {
        return $this->sociedades_id;
    }

    /**
     * Set foto
     *
     * @param string $foto
     * @return Usuarios
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
    
        return $this;
    }

    /**
     * Get foto
     *
     * @return string 
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set dni
     *
     * @param string $dni
     * @return Usuarios
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    
        return $this;
    }

    /**
     * Get dni
     *
     * @return string 
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set fechaalta
     *
     * @param \DateTime $fechaalta
     * @return Usuarios
     */
    public function setFechaalta($fechaalta)
    {
        $this->fechaalta = $fechaalta;
    
        return $this;
    }

    /**
     * Get fechaalta
     *
     * @return \DateTime 
     */
    public function getFechaalta()
    {
        return $this->fechaalta;
    }

    /**
     * Set fechanacimiento
     *
     * @param \DateTime $fechanacimiento
     * @return Usuarios
     */
    public function setFechanacimiento($fechanacimiento)
    {
        $this->fechanacimiento = $fechanacimiento;
    
        return $this;
    }

    /**
     * Get fechanacimiento
     *
     * @return \DateTime 
     */
    public function getFechanacimiento()
    {
        return $this->fechanacimiento;
    }

    /**
     * Set numero_cuenta
     *
     * @param string $numeroCuenta
     * @return Usuarios
     */
    public function setNumeroCuenta($numeroCuenta)
    {
        $this->numero_cuenta = $numeroCuenta;
    
        return $this;
    }

    /**
     * Get numero_cuenta
     *
     * @return string 
     */
    public function getNumeroCuenta()
    {
        return $this->numero_cuenta;
    }

    /**
     * Set empresas
     *
     * @param Basico\EmpresaBundle\Entity\Empresas $empresas
     * @return Usuarios
     */
    public function setEmpresas(\Basico\EmpresaBundle\Entity\Empresas $empresas = null)
    {
        $this->empresas = $empresas;
    
        return $this;
    }

    /**
     * Get empresas
     *
     * @return Basico\EmpresaBundle\Entity\Empresas 
     */
    public function getEmpresas()
    {
        return $this->empresas;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Usuarios
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Get expiresat
     *
     * @return \DateTime
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }
    
    /**
     * Get getcredentialsexpiresat
     *
     * @return \DateTime
     */
    public function getCredentialsExpireAt()
    {
        return $this->credentialsExpireAt;
    }
    
    public function subirFoto($directorioDestino,$imagendefecto)
    {
        if (null === $this->foto) {
            $this->setFoto($imagendefecto);
            return;
        }
        $nombreArchivoFoto = uniqid('usuario-').'-foto1.jpg';
        $this->foto->move($directorioDestino, $nombreArchivoFoto);
        $directorioDestino= substr($directorioDestino, strpos($directorioDestino, 'web')+3); //'/bundles/Basico/uploads/images/';
        $this->setFoto($directorioDestino.$nombreArchivoFoto);
    }    

    /**
     * Set passwordCanonical
     *
     * @param string $passwordCanonical
     * @return Usuarios
     */
    public function setPasswordCanonical($passwordCanonical)
    {
        $this->passwordCanonical = $passwordCanonical;
    
        return $this;
    }

    /**
     * Get passwordCanonical
     *
     * @return string 
     */
    public function getPasswordCanonical()
    {
        return $this->passwordCanonical;
    }

    /**
     * Set calendario
     *
     * @param string $calendario
     * @return Usuarios
     */
    public function setCalendario($calendario)
    {
        $this->calendario = $calendario;
    
        return $this;
    }

    /**
     * Get calendario
     *
     * @return string 
     */
    public function getCalendario()
    {
        return $this->calendario;
    }
}