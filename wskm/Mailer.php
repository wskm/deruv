<?php

namespace wskm;

use service\Setting;

class Mailer
{

    private static $obj;
    private static $config;

    public static function getMailer()
    {
        if (!is_object(self::$obj)) {
            $conf = Setting::getConf('email');
            if (!$conf) {
                throw new \Exception('Configure email in the backend');
            }
            
            self::$config = [
                'class' => 'Swift_SmtpTransport',
                'host' => $conf['emailHost'],
                'username' => $conf['emailUserName'],
                'password' => $conf['emailPassword'],
                'port' => $conf['emailPort'],
                'encryption' => $conf['emailEncryption'], //ssl tls
            ];

            self::$obj = \Yii::createObject([
                'class' => 'yii\swiftmailer\Mailer',
                'viewPath' => '@common/mail',
                'useFileTransport' => false,
                'transport' => self::$config,
            ]);
        }

        return self::$obj;
    }

    /**
     *  send mail
     * 	demo :\wskm\Mailer::send('xxx@xxx.com', 'test', ['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'], ['user' => \Wskm::getUser() ]);
     * @param type $toEmail
     * @param type $subject
     * @param array $compose
     * @param type $isfile
     * @return type
     * @throws \Exception
     */
    public static function send($toEmail, $subject, array $compose, array $params = [], $isfile = true)
    {
        if (!Setting::getConf('email', 'emailEnabled')) {
            return false;
        }
        
        if (!isset($compose['html']) && !isset($compose['text'])) {
            throw new \Exception('Please set the HTML or Text !');
        }

        $message = null;
        if ($isfile) {
            $message = self::getMailer()->compose($compose, $params);
        } else {
            $message = self::getMailer()->compose();

            if (isset($compose['html'])) {
                $message->setHtmlBody($compose['html']);
            }

            if (isset($compose['text'])) {
                $message->setTextBody($compose['text']);
            }
        }

        if (isset($compose['cc'])) {
            $message->setCc($compose['cc']);
        }

        if (isset($compose['bcc'])) {
            $message->setBcc($compose['bcc']);
        }

        return $message->setFrom([ self::$config['username'] => Setting::getConf('email', 'emailFromName') ])
            ->setTo($toEmail)
            ->setSubject($subject)
            ->send();
    }

}
