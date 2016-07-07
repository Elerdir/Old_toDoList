<?php

/**
 * Created by PhpStorm.
 * User: Ladislav.Niderle
 * Date: 27.06.2016
 * Time: 10:36
 */
class Priorities
{
    public function returnIdPriority($name)
    {
        return Db::queryOne('
                        SELECT `priority_id`
                        FROM `priorities`
                        WHERE `name` = ?
                ', array($name));
    }

    public function returnNamePriority($id)
    {
        return Db::queryOne('
                        SELECT `name`
                        FROM `priorities`
                        WHERE `priority_id` = ?
                ', array($id));
    }

    public function returnAllPriorities()
    {
        return Db::queryAll('
                        SELECT `priority_id`, `name`
                        FROM `priorities`
                        ORDER BY `name`
                ');
    }
}