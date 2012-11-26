<?php

namespace Phpfreaks\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SiteController extends Controller
{
    /**
     * Homepage
     *
     * @author Philip Lawrence
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction( )
    {
        // @TODO: Add in homepage widgets (see: #9)
        return $this->render('PhpfreaksSiteBundle:Site:index.html.twig');
    }

    /**
     * Static Page Loader
     *
     * @author Philip Lawrence
     * @param $page
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws NotFoundHttpException
     */
    public function pageAction( $page )
    {
        if(preg_match('/^[A-Z]+$/i', $page)) {
            $template = sprintf('PhpfreaksSiteBundle:Site:%s.html.twig', $page);

            if ($this->get('templating')->exists($template)) {
                return $this->render($template);
            }
        }

        // Invalid page passed in
        throw new NotFoundHttpException("The specified page could not be found.");
    }
}