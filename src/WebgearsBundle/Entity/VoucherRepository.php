<?php
/**
 * Created by PhpStorm.
 * User: grzegorzgurzeda
 * Date: 13.10.15
 * Time: 22:41
 */

namespace WebgearsBundle\Entity;
use Doctrine\ORM\EntityRepository;

/**
 * Class VoucherRepository
 *
 * @package WebgearsBundle\Entity
 */
class VoucherRepository extends EntityRepository {
    /**
     * Find vouchers by provided hash list and return matched hashes
     *
     * @param array $voucherHashes
     * @return array
     */
    public function selectVouchersByHashes(array $vouchersHashes)
    {
        $query = $this->getEntityManager()->createQuery(
            'SELECT v.hash
    FROM WebgearsBundle:Voucher v
    WHERE v.hash IN (:hashes)'
        )->setParameter('hashes', $vouchersHashes);

        return $query->getResult();
    }

    /**
     * Find vouchers to update
     *
     * @param array $vouchersIds
     * @return array
     */
    public function selectVouchersToUpdate(array $vouchersIds)
    {
        $query = $this->getEntityManager()->createQuery(
            'SELECT v.id
    FROM WebgearsBundle:Voucher v
    WHERE v.id IN (:ids)'
        )->setParameter('ids', $vouchersIds);

        return $query->getResult();
    }
} 