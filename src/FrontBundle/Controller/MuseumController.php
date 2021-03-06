<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Controller\BaseController;
use AppBundle\Helper\Wikipedia;
use AppBundle\Entity\Museum;

class MuseumController extends BaseController
{
    
    /**
     * @Route("/museum/{id}", name="museum_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $museum = $em->getRepository('AppBundle:Museum')->find($id);
        $this->checkExists($museum);
        
        return [
            'museum' => $museum,
            'allLanguages' => Wikipedia::$ALL_LANGUAGES,
            'defaultLanguages' => Museum::$DEFAULT_LANGUAGES,
        ];
    }
    
    /**
     * @Route("/museum/{id}/updated_at", defaults={"name"=""}, name="museum_updated_at", options={"expose" = true})
     * @Template()
     */
    public function updatedAtAction($id) {
        $em = $this->getDoctrine()->getManager();
        $museum = $em->getRepository('AppBundle:Museum')->find($id);
        $this->checkExists($museum);
        
        return new Response($this->container->getParameter('assets_version') . '_' . $museum->getUpdatedAt()->format('Y-m-d'));
    }
    
}
