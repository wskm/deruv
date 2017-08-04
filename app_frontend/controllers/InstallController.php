<?php

namespace frontend\controllers;

use Yii;
use Wskm;
use yii\helpers\FileHelper;
use yii\web\HttpException;

ignore_user_abort(true);
set_time_limit(0);

class InstallController extends BaseController
{

    public $layout = '@app/themes/default/install/layout';

    public function load()
    {
        $this->viewPath = '@app/themes/default/install';
        $language = Wskm::session('language');
        if ($language) {
            Yii::$app->language = $language;
        }
    }

    public function actionIndex()
    {
        return $this->render('index', [
        ]);
    }

    public function actionDone()
    {
        $this->session('params', null);
        $this->session('user', null);
        $this->session('db', null);

        return $this->render('done', [
        ]);
    }

    public function actionRequire()
    {
        $language = Wskm::post('language');
        if ($language) {
            Yii::$app->language = $language;
            Wskm::session('language', Yii::$app->language);
        }


        $requires = $this->yiiCheck();
        $dirs = $this->dirCheck();

        return $this->render('require', [
                'requires' => $requires,
                'dirs' => $dirs,
        ]);
    }

    public function actionParam()
    {
        return $this->render('param');
    }

    public function actionStart()
    {
        $params = Wskm::post('params');
        $user = Wskm::post('user');
        $db = Wskm::post('db');
                
        if (!$params['webName']) {
            $this->flash('webName:'.Wskm::t('Can not be empty'));
            return $this->goReferer();
        }

        if (!$user['username']) {
            $this->flash('user name:'.Wskm::t('Can not be empty'));
            return $this->goReferer();
        }

        if ($user['newPassword'] != $user['newPasswordConfirm']) {
            $this->flash(Wskm::t('Passwords do not match', 'user'));
            return $this->goReferer();
        }

        if (!$db['username'] || !$db['dbname'] || !$db['host']) {
            $this->flash(Wskm::t('Invalid parameter', 'install'));
            return $this->goReferer();
        }

        $dbObj = new \yii\db\Connection([
            'dsn' => "mysql:host={$db['host']};port={$db['port']};dbname={$db['dbname']}",
            'username' => $db['username'],
            'password' => $db['password'],
            'charset' => 'utf8mb4',
        ]);
            
        try {
            $dbObj->open();
        } catch (\Exception $ex) {
            $this->flash($ex->getMessage());
            return $this->goReferer();
        }

        $this->session('params', $params);
        $this->session('user', $user);
        $this->session('db', $db);

        return $this->render('start');
    }

    public function actionInstallDb()
    {
        $db = $this->session('db');
        $config = [
            'db' => [
                'class' => 'yii\db\Connection',
                'dsn' => "mysql:host={$db['host']};port={$db['port']};dbname={$db['dbname']}",
                'username' => $db['username'],
                'password' => $db['password'],
                'charset' => 'utf8mb4',
                'tablePrefix' => 'de_',
                'enableSchemaCache' => true,
            ],
            'adminRequest' => [
                'cookieValidationKey' => $this->getCookieValidationKey(),
            ],
            'frontendRequest' => [
                'cookieValidationKey' => $this->getCookieValidationKey(),
            ],
        ];

        $phpstr = "<?php \nreturn ".var_export($config, true).';';
        file_put_contents(\yii\helpers\FileHelper::normalizePath(\Yii::getAlias('@common/config/setting.php')), $phpstr);
    }

    public function actionInstallSql()
    {
        $sqlFile = Yii::getAlias('@common/sql/deruv.sql');
        $sql = file_get_contents($sqlFile);
        $tables = \wskm\db\Helper::runSql($sql);
        $this->asJson($tables);
    }

    public function actionInstallParam()
    {
        $params = $this->session('params');
        $model = \admin\models\Setting::findOne([
                'k' => 'webName',
        ]);
        if ($model) {
            $model->v = $params['webName'];
            $ok = $model->save();
            if (!$ok) {
                throw new HttpException(500, 'Save webName error!');
            }
        }

        $model = \admin\models\Setting::findOne([
                'k' => 'webUrl',
        ]);
        if ($model) {
            $model->v = $params['webUrl'];
            $ok = $model->save();
            if (!$ok) {
                throw new HttpException(500, 'Save webUrl error!');
            }
        }
    }

    public function actionInstallUser()
    {
        $user = $this->session('user');
        $model = new \common\models\User();
        $model->scenario = 'register';
        $model->load($user, '');
        $ok = $model->save();
        if (!$ok) {
            throw new \yii\web\ServerErrorHttpException('create administrator :'.var_export($model->errors, true));
        }
        
        $auth = new \yii\rbac\DbManager();
        $role = $auth->getRole('admin');
        $auth->assign($role, $model->id);
        
        $this->asJson([
            $model->username
        ]);
    }

    public function actionInstallCache()
    {
        
    }

    private function getCookieValidationKey()
    {
        $length = 32;
        $bytes = openssl_random_pseudo_bytes($length);
        return strtr(substr(base64_encode($bytes), 0, $length), '+/=', '_-.');
    }

    private function dirCheck()
    {
        $paths = [
            '@common/config/setting.php',
            '@admin/runtime',
            '@admin/web/assets',
            '@frontend/runtime',
            '@frontend/web/assets',
            '@frontend/web/uploads',
        ];

        $dirs = [];
        $error = 0;
        foreach ($paths as $path) {
            $path = FileHelper::normalizePath(Yii::getAlias($path));
            //$isw = @is_writable($path);
            $isw = \wskm\helpers\File::isReallyWritable($path);
            if (!$isw) {
                $error++;
            }
            $dirs[] = [
                'dir' => $path,
                'isw' => $isw,
            ];
        }

        return [
            'paths' => $dirs,
            'errors' => $error,
        ];
    }

    private function yiiCheck()
    {
        require_once Yii::getAlias('@yii/requirements/YiiRequirementChecker.php');
        $requirementsChecker = new \YiiRequirementChecker();


        $gdMemo = $imagickMemo = 'Either GD PHP extension with FreeType support or ImageMagick PHP extension with PNG support is required for image CAPTCHA.';
        $gdOK = $imagickOK = false;

        if (extension_loaded('imagick')) {
            $imagick = new Imagick();
            $imagickFormats = $imagick->queryFormats('PNG');
            if (in_array('PNG', $imagickFormats)) {
                $imagickOK = true;
            } else {
                $imagickMemo = 'Imagick extension should be installed with PNG support in order to be used for image CAPTCHA.';
            }
        }

        if (extension_loaded('gd')) {
            $gdInfo = gd_info();
            if (!empty($gdInfo['FreeType Support'])) {
                $gdOK = true;
            } else {
                $gdMemo = 'GD extension should be installed with FreeType support in order to be used for image CAPTCHA.';
            }
        }

        /**
         * Adjust requirements according to your application specifics.
         */
        $requirements = array(
            // Database :
            array(
                'name' => 'PDO extension',
                'mandatory' => true,
                'condition' => extension_loaded('pdo'),
                'by' => 'All DB-related classes',
            ),
            array(
                'name' => 'PDO SQLite extension',
                'mandatory' => false,
                'condition' => extension_loaded('pdo_sqlite'),
                'by' => 'All DB-related classes',
                'memo' => 'Required for SQLite database.',
            ),
            array(
                'name' => 'PDO MySQL extension',
                'mandatory' => false,
                'condition' => extension_loaded('pdo_mysql'),
                'by' => 'All DB-related classes',
                'memo' => 'Required for MySQL database.',
            ),
            array(
                'name' => 'PDO PostgreSQL extension',
                'mandatory' => false,
                'condition' => extension_loaded('pdo_pgsql'),
                'by' => 'All DB-related classes',
                'memo' => 'Required for PostgreSQL database.',
            ),
            // Cache :
            array(
                'name' => 'Memcache extension',
                'mandatory' => false,
                'condition' => extension_loaded('memcache') || extension_loaded('memcached'),
                'by' => '<a href="http://www.yiiframework.com/doc-2.0/yii-caching-memcache.html">MemCache</a>',
                'memo' => extension_loaded('memcached') ? 'To use memcached set <a href="http://www.yiiframework.com/doc-2.0/yii-caching-memcache.html#$useMemcached-detail">MemCache::useMemcached</a> to <code>true</code>.' : ''
            ),
            array(
                'name' => 'APC extension',
                'mandatory' => false,
                'condition' => extension_loaded('apc'),
                'by' => '<a href="http://www.yiiframework.com/doc-2.0/yii-caching-apccache.html">ApcCache</a>',
            ),
            // CAPTCHA:
            array(
                'name' => 'GD PHP extension with FreeType support',
                'mandatory' => false,
                'condition' => $gdOK,
                'by' => '<a href="http://www.yiiframework.com/doc-2.0/yii-captcha-captcha.html">Captcha</a>',
                'memo' => $gdMemo,
            ),
            array(
                'name' => 'ImageMagick PHP extension with PNG support',
                'mandatory' => false,
                'condition' => $imagickOK,
                'by' => '<a href="http://www.yiiframework.com/doc-2.0/yii-captcha-captcha.html">Captcha</a>',
                'memo' => $imagickMemo,
            ),
            // PHP ini :
            'phpExposePhp' => array(
                'name' => 'Expose PHP',
                'mandatory' => false,
                'condition' => $requirementsChecker->checkPhpIniOff("expose_php"),
                'by' => 'Security reasons',
                'memo' => '"expose_php" should be disabled at php.ini',
            ),
            'phpAllowUrlInclude' => array(
                'name' => 'PHP allow url include',
                'mandatory' => false,
                'condition' => $requirementsChecker->checkPhpIniOff("allow_url_include"),
                'by' => 'Security reasons',
                'memo' => '"allow_url_include" should be disabled at php.ini',
            ),
            'phpSmtp' => array(
                'name' => 'PHP mail SMTP',
                'mandatory' => false,
                'condition' => strlen(ini_get('SMTP')) > 0,
                'by' => 'Email sending',
                'memo' => 'PHP mail SMTP server required',
            ),
        );

        return $requirementsChecker->checkYii()->check($requirements);
    }

}
