<?php

namespace App\Repository;

use App\Entity\Option;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Option|null find($id, $lockMode = null, $lockVersion = null)
 * @method Option|null findOneBy(array $criteria, array $orderBy = null)
 * @method Option[]    findAll()
 * @method Option[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Option::class);
    }

    public function getAllOptions(): array
    {
        $options = $this->findAll();
        $opts = [];
        foreach($options as $opt){
            if(!$opt instanceof Option) continue;
            $opts[$opt->getName()] = $opt->getValue();
        }
        return $opts;
    }

    public function save(Option $entity): void
    {
        $em = $this->getEntityManager();
        $em->persist($entity);
        $em->flush();
    }
}
