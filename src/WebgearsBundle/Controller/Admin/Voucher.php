<?php
/**
 * Created by PhpStorm.
 * User: grzegorzgurzeda
 * Date: 14.10.15
 * Time: 21:38
 */

namespace WebgearsBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class Voucher extends Controller {

    /**
     * List vouchers
     * @Route("/admin/voucher")
     */
    public function listActiion()
    {
        return $this->render('webgears/admin/voucher/list.html.twig', array(
            'title' => 'Vouchers list',
        ));
    }
} 