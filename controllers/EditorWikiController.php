<?php

/**
 * Created by PhpStorm.
 * User: Ladislav.Niderle
 * Date: 29.06.2016
 * Time: 13:02
 */
class EditorWikiController extends Controller
{
    /**
     * @param $parameters
     */
    public function compile($parameters)
    {
        $this->verifyUser(true);
        $this->head['title'] = 'Editor článků';
        $articlesManager = new ArticlesManager();
        $article = array(
            'articles_id' => '',
            'title' => '',
            'content' => '',
            'url' => '',
            'description' => '',
            'keywords' => '',
            'user_id' => '',
            'priority_id' => '',
            'create_date' => '',
            'assignee_id' => '',
            'end_date' => '',
            'category_id' => '',
        );
        if ($_POST) {
            $keys = array('title', 'content', 'url', 'description', 'keywords', 'assignee_id', 'priority_id', 'create_date', 'end_date', 'category_id', 'user_id');
            $article = array_intersect_key($_POST, array_flip($keys));
            $category=new Category();
            $article['category_id'] ="1"; //$category->returnIdCategory('wiki');
            $usersManager = new UsersManager();
            if (!$article['articles_id'])
            {
                $user = $usersManager->returnUser();
                $article['user_id'] = $user['users_id'];
            }
            $article['end_date'] = DateUtils::parseDateTime($article['end_date'], DateUtils::DATE_FORMAT);
            $article['url'] = StringUtils::hyphenize($article['title']);
            $articleUrl = $articlesManager->returnArticle($article['url']);


            /*if (($articleUrl) && (empty($article['articles_id'])))
            {

                $this->addMessage('Titulek už existuje.');
            }
            else
            {*/
            if (!$_POST['articles_id'])
            {
                $datetime=DateUtils::dbNow();
                $article['create_date']=$datetime;
            }




            /**
             * Created by PhpStorm.
             * User: Ladislav.Niderle
             * Date: 28.06.2016
             * Time: 07:07
             * Message: Odeslání emailu s informací o novém úkolu
             */
            $person = new Person();
            $user=$usersManager->returnUser();
            $email=$person->returnMailPerson($user['user_id']);
            if ( $email )
            {
                $emailsSender = new EmailsSender();
                $year = date('Y');
                try
                {
                    $emailsSender->sendWithAntispam($year,"admin@adresa.cz", $article['title'], $article['content'], $email);
                    $this->addMessage('Email úspěšně odeslán.');
                }
                catch (Exception $e)
                {
                    $this->addMessage($e->getMessage());
                }
            }
            else
            {
                $this->addMessage('Email nebyl neodeslán.');
            }


            $articlesManager->saveArticle($_POST['articles_id'], $article);

            $this->addMessage('Článek byl úspěšně uložen.');
            $this->redirect('article/' . $article['url']);
        }



        //}
        else if (!empty($parameters[0]))
        {
            $loadedArticle = $articlesManager->returnArticle($parameters[0]);
            if ($loadedArticle)
                $article = $loadedArticle;
            else
                $this->addMessage('Článek nebyl nalezen');
        }
        $assignee = new Assignee();
        $priority = new Priorities();
        $category = new Category();
        $allPriorities = $priority->returnAllPriorities();
        $allLAN = $assignee->returnAllAssagnee();
        $allCategory = $category->returnAllCategory();
        $this->data['article'] = $article;
        $this->data['allUsers'] = $allLAN;
        $this->data['allCategory'] = $allCategory;
        $this->data['allPriorities'] = $allPriorities;
        $this->view = 'editorWiki';
    }
}