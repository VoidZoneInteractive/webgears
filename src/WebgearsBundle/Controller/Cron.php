<?php
/**
 * Created by PhpStorm.
 * User: grzegorzgurzeda
 * Date: 12.10.15
 * Time: 17:35
 */

namespace WebgearsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use WebgearsBundle\External\Fetcher;
use WebgearsBundle\Store\Store;


class Cron extends Controller {


    /**
     * Action to
     * @Route("/cron/fetch_data")
     */
    public function fetchDataAction()
    {
        $fetcher = $this->get('webgears_fetcher');
        $data = $fetcher->construct()->getResult();

        $store = $this->get('webgears_store');
        $store->prepareShops($data->shops);
        $store->insertShops();

        $store->prepareVouchers($data->vouchers);
        $store->insertAndUpdateVouchers();

        $response = new Response('OK');
//        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}