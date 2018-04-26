<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\VoitureRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Voiture
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string",length=255)
     * @Assert\NotBlank()
     */    
    private $marque;

    /**
     * @ORM\Column(type="string",length=255)
     * @Assert\NotBlank()
     */    
    private $modele;

    /**
     * @ORM\Column(type="string",length=255)
     * @Assert\NotBlank()
     */    
    private $matricule;

    /**
     * @ORM\Column(type="string",length=255)
     * @Assert\NotBlank()
     */    
    private $couleur;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank()
     */    
    private $date_circu;

    /**
     * @ORM\Column(type="integer")
     */    
    private $prix_jour;

    /**
     * @ORM\Column(type="string",length=255)
     * @Assert\NotBlank()
     */    
    private $disponibilite;


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
     * Set marque
     *
     * @param string $marque
     *
     * @return Voiture
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return string
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set modele
     *
     * @param string $modele
     *
     * @return Voiture
     */
    public function setModele($modele)
    {
        $this->modele = $modele;

        return $this;
    }

    /**
     * Get modele
     *
     * @return string
     */
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * Set matricule
     *
     * @param string $matricule
     *
     * @return Voiture
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get matricule
     *
     * @return string
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set couleur
     *
     * @param string $couleur
     *
     * @return Voiture
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return string
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set dateCircu
     *
     * @param \DateTime $dateCircu
     *
     * @return Voiture
     */
    public function setDateCircu($dateCircu)
    {
        $this->date_circu = $dateCircu;

        return $this;
    }

    /**
     * Get dateCircu
     *
     * @return \DateTime
     */
    public function getDateCircu()
    {
        return $this->date_circu;
    }

    /**
     * Set prixJour
     *
     * @param \integer $prixJour
     *
     * @return Voiture
     */
    public function setPrixJour(\integer $prixJour)
    {
        $this->prix_jour = $prixJour;

        return $this;
    }

    /**
     * Get prixJour
     *
     * @return \integer
     */
    public function getPrixJour()
    {
        return $this->prix_jour;
    }

    /**
     * Set disponibilite
     *
     * @param string $disponibilite
     *
     * @return Voiture
     */
    public function setDisponibilite($disponibilite)
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    /**
     * Get disponibilite
     *
     * @return string
     */
    public function getDisponibilite()
    {
        return $this->disponibilite;
    }

    public function hello($text){return $text;}
}
