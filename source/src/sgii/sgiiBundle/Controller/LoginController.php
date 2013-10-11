<?php
namespace sgii\sgiiBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * controlador para el login de la aplicacion.
 * 
 * @Route("/")
 * @package CuentaBundle/Controller
 */
class LoginController extends Controller
{
    /**
     * Accion para login de la aplicacion
     * 
     * @Route("/", name="login")
     * @author Diego Malagón <diego-software@hotmail.com>
     * @return Resonse
     */
    public function indexAction()
    {
        $security = $this->get('security');
        
        $login = $security->login('DiegoMalagon', '1234');
        
        $security->debug($login);
        
        
        return $this->render('sgiiBundle:Login:index.html.twig', array());
    }
    
}
?>
