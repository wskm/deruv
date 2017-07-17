<?php
namespace wskm\widgets;

use Yii;

/**
 * Alert widget renders a message from session flash. All flash messages are displayed
 * in the sequence they were assigned using setFlash. You can set message as following:
 *
 * ```php
 * Yii::$app->session->setFlash('error', 'This is the message');
 * Yii::$app->session->setFlash('success', 'This is the message');
 * Yii::$app->session->setFlash('info', 'This is the message');
 * ```
 *
 * Multiple messages could be set as follows:
 *
 * ```php
 * Yii::$app->session->setFlash('error', ['Error 1', 'Error 2']);
 * ```
 */
class Alert extends \yii\base\Widget
{
    public $funs = [];
    public $messages = [];
    
    public $alertTypes = [
        'error'   => 'error',
        'danger'  => 'error',
        'success' => 'success',
        'info'    => 'info',
        'warning' => 'warning'
    ];

    public function init()
    {
        parent::init();

        $session = Yii::$app->session;
        $flashes = $session->getAllFlashes();

        foreach ($flashes as $type => $data) {
            if (isset($this->alertTypes[$type])) {
                $fun = $this->alertTypes[$type];
                $data = (array) $data;
                
                foreach ($data as $i => $message) {
                    
                    if (is_array($message)) {
                        foreach ($message as $msg){
                            $this->funs[] = $fun;
                            $this->messages[] = $msg;
                        }
                    }else{
                        $this->funs[] = $fun;
                        $this->messages[] = $message;
                    }
                    
                }
                $session->removeFlash($type);
            }
        }
    }
    
    public function run()
    {
        $scripts = "<script>\n";
        foreach($this->funs as $k => $fun){
            $msg = isset($this->messages[$k]) ? $this->messages[$k] : '';
            if ($msg) {
                $scripts .= 'toastr.'.$fun.'("'.\yii\helpers\Html::encode($msg).'")'." \n";
            }
        }
        $scripts .= "\n</script>";
        
        return $scripts;
    }
}
