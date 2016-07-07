<?php

/**
 * Created by PhpStorm.
 * User: Ladislav.Niderle
 * Date: 28.06.2016
 * Time: 06:54
 */
class Person
{
    public function returnPerson($id)
    {
        return Db::queryOne('
                        SELECT `*`
                        FROM `persons`
                        WHERE `person_id` = ?
                ', array($id));
    }

    public function returnMailPerson($id)
    {
        return Db::queryOne('
                        SELECT `person_email`
                        FROM `persons`
                        WHERE `person_id` = ?
                ', array($id));
    }

    public function returnIdPerson($name)
    {
        return Db::queryOne('
                        SELECT `person_id`
                        FROM `persons`
                        WHERE `name` = ?
                ', array($name));
    }

    public function returnAllCategory()
    {
        return Db::queryAll('
                        SELECT `category_id`, `name`
                        FROM `persons`
                        ORDER BY `name`
                ');
    }
}