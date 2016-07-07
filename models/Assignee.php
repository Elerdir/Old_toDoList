<?php

/**
 * Created by PhpStorm.
 * User: ladislav
 * Date: 26.06.16
 * Time: 20:45
 */
class Assignee
{

    public function returnIdAssagnee($name)
    {
        return Db::queryOne('
                        SELECT `assignee_id`
                        FROM `assignee`
                        WHERE `name` = ?
                ', array($name));
    }

    public function returnNameAssagnee($id)
    {
        return Db::queryOne('
                        SELECT `name`
                        FROM `assignee`
                        WHERE `assignee_id` = ?
                ', array($id));
    }

    public function returnAllAssagnee()
    {
        return Db::queryAll('
                        SELECT `assignee_id`, `name`
                        FROM `assignee`
                        ORDER BY `name`
                ');
    }
}