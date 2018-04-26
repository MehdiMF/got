<?php
// MyApp\FilmothequeBundle/Entity/AdvertRepository.php
namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;
// N'oubliez pas ce use
use Doctrine\ORM\QueryBuilder;

class VoitureRepository extends EntityRepository
{


  public function voituresDisponibles($disponibilite){
					
	$qb = $this->createQueryBuilder('v');
    $qb->where('v.disponibilite = :disponibilite')->setParameter('disponibilite', $disponibilite);

     return $qb->getQuery()->getResult();
}

}