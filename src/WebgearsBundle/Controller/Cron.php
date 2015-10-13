<?php
/**
 * Created by PhpStorm.
 * User: grzegorzgurzeda
 * Date: 12.10.15
 * Time: 17:35
 */

namespace WebgearsBundle\Controller;

use FeedBundle\Input\VouchersAPI;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use WebgearsBundle\External\Fetcher;


class Cron extends Controller {


    /**
     * Action to
     * @Route("/cron/fetch_data")
     */
    public function fetchDataAction()
    {
        $externalSourceClass = $this->container->getParameter('external_source');
        $url = $this->container->getParameter('source_url');

        $externalSource = new $externalSourceClass($url);

        $fetcher = new Fetcher($externalSource);

        header('Content-type: application/json');
        $data = $fetcher->construct()->getResult();

        $response = new Response(json_encode($data));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}