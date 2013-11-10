<?php

namespace sgii\sgiiBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * controlador para importacion de registros desde excel
 * 
 * @Route("/import")
 * @author Diego Malagón <diego-software@hotmail.com>
 */
class ImportController extends Controller
{
    /**
     * Index para importacion de registros
     * 
     * carga el formulario para importacion de datos a diferentes tablas
     * por el momento solo importa a la tabla usuarios
     * 
     * @Route("/", name="import")
     * @Template("sgiiBundle:Import:index.html.twig")
     * @author Diego Malagón <diego-software@hotmail.com>
     * @return Resonse
     */
    public function indexAction(Request $request)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        // Formulario para importacion
        $tablas = array(
            1 => 'usuarios',
        );
        
        $dataForm = array(
            'file' => null,
            'tabla' => 1
        );
        
        $form = $this->createFormBuilder($dataForm)  
            ->add('file', 'file', array('required' => true))            
            ->add('tabla', 'choice', array('required' => true, 'choices'=>$tablas))            
            ->getForm(); 
        
        
        if($request->getMethod() == 'POST')
        {
            // Extensiones permitidas
            $exts = array('csv','xls','xlsx');
            
            $validate = false;
            $form->bind($request);
            if ($form->isValid())
            {
                $data = $form->getData();
                
                $file = $data['file'];
                
                if($file->getClientSize() > 0 && $file->getError() == 0)
                {
                    $name = $file->getClientOriginalName();
                    $exp_name = explode(".", $name);                    
                    $ext = $exp_name[count($exp_name) - 1];                    
                    
                    if(in_array($ext, $exts))
                    {
                        $validate = true;
                        
                        $import = $this->get('import');
                        
                        if($data['tabla'] == 1) // usuarios
                        {
                            $import->importUsuarios($file);
                        }
                        else
                        {
                            // ... otras tablas
                        }
                    }                    
                }
            }
            
            if(!$validate)
            {
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Verifique el tipo de archivo. Solo se permiten archivos ".implode(" ", $exts)));
            }
        }
        
        
        return array(
            'form' => $form->createView(),
        );
    }
    
    
    
}

?>

