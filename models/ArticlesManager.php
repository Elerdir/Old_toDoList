<?php

/**
 * Created by PhpStorm.
 * User: matej
 * Date: 08/06/16
 * Time: 09:56
 */
class ArticlesManager
{
    public function returnArticle($url)
    {
        return Db::queryOne('
                        SELECT `articles_id`, `title`, `content`, `url`, `description`, `keywords`, `create_date`, `user_id`, `priority_id`, `assignee_id`, `end_date`, `category_id`
                        FROM `articles`
                        WHERE `url` = ?
                ', array($url));
    }

    public function returnArticles()
    {
        return Db::queryAll('
                        SELECT `articles_id`, `title`, `url`, `description`, `create_date`, `user_id`, `priority_id`, `assignee_id`, `end_date`, `category_id`
                        FROM `articles`
                        ORDER BY `articles_id` DESC
                ');
    }

    public function returnUsers()
    {
        return Db::queryAll('
                        SELECT `name` , `users_id`
                        FROM  `users`
                        ORDER BY `users_id` DESC
                        ');
    }


    public function GetOneUser($usr)
    {
        return Db::queryOne('
                        SELECT `name`
                        FROM `users`
                        WHERE `users_id` = ?
                ', array($usr));
    }

    public function saveArticle($id, $article)
    {
        if (!$id)
            Db::insert('articles', $article);
        else
            Db::change('articles', $article, 'WHERE articles_id = ?', array($id));
    }

    public function removeArticle($url)
    {
        Db::query('
                DELETE FROM articles
                WHERE url = ?
        ', array($url));
    }
}