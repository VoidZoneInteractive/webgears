<?php
/**
 * Created by PhpStorm.
 * User: grzegorzgurzeda
 * Date: 11.10.15
 * Time: 14:14
 */

namespace Webgears\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class for manage vouchers in database.
 * @ORM\Entity
 * @ORM\Table(name="voucher")
 */
class Voucher {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Voucher value.
     * @ORM\Column(type="string", length=255)
     */
    protected $shop;

    /**
     * Voucher code.
     * @ORM\Column(type="string", length=50)
     */
    protected $code;

    /**
     * Voucher value.
     * @ORM\Column(type="string", length=255)
     */
    protected $value;

    /**
     * Url to product.
     * @ORM\Column(type="string", length=255)
     */
    protected $url;

    /**
     * @ORM\Column(type="datetimez")
     */
    protected $valid_from;

    /**
     * @ORM\Column(type="datetimez")
     */
    protected $expire_date;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $found_date;

    /**
     * Calculated hash shortcut for Voucher entity
     * @ORM\Column(type="string", length=32)
     */
    protected $hash;
} 