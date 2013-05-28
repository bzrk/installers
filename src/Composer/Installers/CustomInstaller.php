<?php
namespace Composer\Installers;

use Composer\Package\PackageInterface;

class CustomInstaller extends BaseInstaller
{
    protected $locations = array();
        
    /**
     * Return the install path based on package type.
     *
     * @param  PackageInterface $package
     * @param  string           $frameworkType
     * @return string
     */
    public function getInstallPath(PackageInterface $package, $frameworkType = '')
    {
        $type = $this->package->getType();
        
        try{
            return parent::getInstallPath($package, $frameworkType);
        }catch(\InvalidArgumentException $e){
            throw new \InvalidArgumentException(sprintf('Package type "%s" must set a custom install paths', $type));
        }
    }
}
