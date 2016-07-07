<?php

/**
 * Created by PhpStorm.
 * User: ladislav
 * Date: 26.06.16
 * Time: 18:39
 */
class Category
{

    public function returnIdCategory($name)
    {
        return Db::queryOne('
                        SELECT `category_id`
                        FROM `category`
                        WHERE `name` = ?
                ', array($name));
    }

    public function returnNameCategory($id)
    {
        return Db::queryOne('
                        SELECT `name`
                        FROM `category`
                        WHERE `category_id` = ?
                ', array($id));
    }

    public function returnAllCategory()
    {
        return Db::queryAll('
                        SELECT `category_id`, `name`
                        FROM `category`
                        ORDER BY `name`
                ');
    }
}