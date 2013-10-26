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
     * @Template("sgiiBundle:Login:login.html.twig")
     * @author Diego Malagón <diego-software@hotmail.com>
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return Resonse
     */
    public function loginAction(Request $request)
    {
        $security = $this->get('security');
        if($security->autentication()){ return $this->redirect($this->generateUrl('homepage'));}        
        
        $formData = array('user' => '', 'pass' => '');
        $form = $this->createFormBuilder($formData)
           ->add('user', 'email', array('required' => true))
           ->add('pass', 'password', array('required' => true))
           ->getForm(); 
                
        $acceso_denegado = true;
        if($request->getMethod() == 'POST')
        {
            $form->bind($request);
            if ($form->isValid())
            {
                $data = $form->getData();
                
                if(!empty($data['user']) && !empty($data['pass']))
                {
                    if($security->login($data['user'], $data['pass']))
                    {
                        $acceso_denegado = false;
                        
                        $security->setAuditoria('login');
                        return $this->redirect($this->generateUrl('homepage'));
                    }
                }
            }
            
            if($acceso_denegado)
            {
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Verifique su usuario o contraseña"));
                $security->setError('login error '.$data['user']);
            }
        }
        
        return array(
            'form'=>$form->createView(), 
        );
    }
    
    /**
     * Accion para eliminar la session 
     * 
     * @Route("/logout", name="logout")
     * @author Diego Malagón <diego-software@hotmail.com>
     */
    public function logoutAction()
    {
        $security = $this->get('security');
        
        $security->logout();
        
        return $this->redirect($this->generateUrl('login'));
    }
    
}
?>
