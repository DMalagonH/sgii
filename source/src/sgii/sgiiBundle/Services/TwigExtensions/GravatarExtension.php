<?php

namespace sgii\sgiiBundle\Services\TwigExtensions;

class GravatarExtension extends \Twig_Extension
{
    
    public function getFunctions() {
        return array(
            'gravatar' => new \Twig_Function_Method($this, 'getGravatarUrl'),
        );
    }
    
    
    public function getGravatarUrl($email, $size='80')
    {
        $hash = md5(strtolower(trim($email)));
        $url = 'http://www.gravatar.com/avatar/'.$hash.'?s='.$size.'&d=mm';
        
        return $url;
    }
    
    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'GravatarExtension';
    }
}
?>
