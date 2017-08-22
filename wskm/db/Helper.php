<?php

namespace wskm\db;

use Yii;

class Helper
{

    public static function showTables($database)
    {
        try {
            return Yii::$app->db->createCommand('SHOW TABLES FROM '.$database)
                    ->queryAll();
        } catch (\Exception $ex) {
            return false;
        }
    }

    public static function runSql($sql)
    {
        if (empty($sql))
            return;

        $ret = [];
        $num = 0;

        $sql = str_replace(["\r\n", "\r"], "\n", $sql);

        foreach (explode(";\n", trim($sql)) as $query) {
            if (!isset($ret[$num])) {
                $ret[$num] = '';
            }
            $queries = explode("\n", trim($query));
            foreach ($queries as $query) {
                $query = trim($query);
                $remark = !isset($query[0], $query[1]) ? '' : $query[0].$query[1];
                //$remark2 = !isset($query[2]) ? '' : $remark . $query[2];
                //if ($query && ($query[0] != '#') && ($remark != '--') && ($remark2 != '/* ') && ($remark2 != '/*!')) {
                if ($query && ($query[0] != '#') && ($remark != '--')) {
                    $ret[$num] .= $query;
                }
            }

            $num++;
        }
        unset($sql);

        $logs = [];
        foreach ($ret as $query) {
            if ($query) {
                if (substr($query, 0, 12) == 'CREATE TABLE') {
                    $name = preg_replace("/CREATE TABLE [`]?([a-z0-9_]+)[`]? .*/is", "\\1", $query);
                    $logs[] = $name;
                }

                Yii::$app->db->createCommand($query)->execute();
            }
        }
        return $logs;
    }

}
