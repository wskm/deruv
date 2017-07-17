<?php

namespace admin\controllers;

use Yii;
use yii\base\Model;
use admin\models\Setting;
use service\Setting as SettingService;

class SettingController extends CoreController
{

    public function load()
    {
        $this->assign('siteNav', 'setting');
    }

    public function actionIndex($type = 'param')
    {
        if (!$type) {
            $type = 'param';
        }

        return $this->render('index', [
            'type' => $type,
            'settings' => Setting::find()->where([
                'type' => $type
            ])->indexBy('k')->orderBy('sorting DESC')->all(),
        ]);
    }

    public function actionUpdate()
    {
        $type = $_POST['type'] ? $_POST['type'] : 'sys';

        $settings = Setting::find()->where([
            'type' => $type
        ])->indexBy('k')->all();

        if (Model::loadMultiple($settings, Yii::$app->request->post()) && Model::validateMultiple($settings)) {
            foreach ($settings as $setting) {
                $setting->save(false);
            }
        }

        SettingService::setCache();

        $this->redirect(['index', 'type' => $type]);
    }

    public function actionSetCache()
    {
        SettingService::setCache();
        $this->asJson([
            'msg' => 'ok',
        ]);
    }

    public function actionUpdateCache()
    {
        return $this->render('update-cache');
    }

}
