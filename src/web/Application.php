<?php 
namespace izi\opencart\web;

use Yii;
class Application extends \izi\opencart\base\Application
{
	
    
    public function __construct($config = [])
    {
        Yii::$app = $this;
//         static::setInstance($this);
        
//         $this->state = self::STATE_BEGIN;
        
//         $this->preInit($config);
        
//         $this->registerErrorHandler($config);
        
//         Component::__construct($config);
    }
    
    public function run(){
        echo __FUNCTION__;
    }
    
    private $_mailer;
    public function getMailer() {
        if($this->_mailer == null){
            $this->_mailer = new \izi\mailer\Mailer();
        }
        return $this->_mailer;
    }
    
}