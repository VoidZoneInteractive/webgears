<?php
/**
 * Created by PhpStorm.
 * User: grzegorzgurzeda
 * Date: 11.10.15
 * Time: 16:14
 */

namespace FeedBundle\Controller;

use Symfony\Component\Finder\Finder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class Api extends Controller{

    /**
     * Relative path to directory with vouchers json data.
     */
    const PATH_TO_DATA = '/../feed';

    /**
     * Get voucher data from files, and print them out.
     * If its a first call to api we print first voucher data, on any subsequent
     * request we print out the other one
     * @Route("/api/vouchers")
     */
    public function vouchersAction()
    {
        $data = array();

        $dir = $this->get('kernel')->getRootDir() . self::PATH_TO_DATA;
        $finder = new Finder();
        $finder->files()->in($dir);

        foreach ($finder as $file)
        {
            $data[] = $file->getContents();
        }

        $response = new Response($data[0]);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
} 