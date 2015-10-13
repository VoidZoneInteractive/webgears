<?php
/**
 * Created by PhpStorm.
 * User: grzegorzgurzeda
 * Date: 13.10.15
 * Time: 20:54
 */

namespace WebgearsBundle\Store;
use Symfony\Bridge\Monolog\Logger;
use Symfony\Component\Config\Definition\Exception\Exception;
use WebgearsBundle\Entity\Shop;

/**
 * Class Store - used for storing data into database
 * @package WebgearsBundle\Store
 */
class Store {

    protected $entityManager;
    protected $logger;

    protected $shops = null;
    protected $vouchers;

    /**
     * Constructor class
     */
    public function __construct(\Doctrine\ORM\EntityManager $em, Logger $logger)
    {
        $this->entityManager = $em;
        $this->logger = $logger;
        return $this;
    }

    /**
     * Prepare shops to insert
     * @param array $shops
     */
    public function prepareShops(array &$shops)
    {
        if (!empty($shops))
        {
            $shopIds = array_keys($shops);
            foreach ($this->entityManager->getRepository('WebgearsBundle:Shop')->selectShopsByIds($shopIds) as $entry)
            {
                unset($shops[$entry['id']]);
            }
            $this->shops = $shops;
        }
    }

    public function insertShops()
    {
        if (is_null($this->shops))
        {
            throw new Exception(sprintf('There are no shops to insert. Did you run \'prepareShops\' beforehand?'));
        }

        $i = 0;

        foreach ($this->shops as $shop)
        {
            $shopEntity = new Shop();
            $shopEntity->assignFields($shop);

            $this->entityManager->persist($shopEntity);

            $metadata = $this->entityManager->getClassMetaData(get_class($shopEntity));
            $metadata->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadata::GENERATOR_TYPE_NONE);


            $this->entityManager->flush();

            ++$i;
        }
        $this->logger->info(sprintf('Finished inserting shops into database. New positions: %d.', $i));
    }
} 