<?php

/**
 * Created by PhpStorm.
 * User: matej
 * Date: 08/06/16
 * Time: 10:02
 */
class ArticleController extends Controller
{
    /**
     * @param $parameters
     */
    public function compile($parameters)
    {
        $articlesManager = new ArticlesManager();
        $usersManager = new UsersManager();
        $category = new Category();
        $user = $usersManager->returnUser();
        $this->data['admin'] = $user && $user['admin'];

            if (!empty($parameters[1]) && $parameters[1] == 'remove') {
                $this->verifyUser(true);
                $articlesManager->removeArticle($parameters[0]);
                $this->addMessage('Článek byl úspěšně odstraněn');
                $this->redirect('article');
            } elseif (!empty($parameters[0])) 
            {

                $article = $articlesManager->returnArticle($parameters[0]);
                if (!$article)
                    $this->redirect('error');

                $this->head = array(
                    'title' => $article['title'],
                    'keywords' => $article['keywords'],
                    'description' => $article['description'],
                    'create_date' => $article['create_date'],
                    'end_date' => $article['end_date'],
                    'priority' => $article['priority_id'],
                    'category' => $category->returnNameCategory($article['category_id']),
                );

                $this->data['title'] = $article['title'];
                $this->data['content'] = $article['content'];
                $this->data['date'] = $article['create_date'];
                $this->data['end_date'] = $article['end_date'];
                $this->data['priority'] = $article['priority_id'];
                $this->data['category_id'] = $category->returnNameCategory($article['category_id']);
                $this->data['assignee'] = $articlesManager->GetOneUser($article['assignee_id']);
                $this->data['create'] = $articlesManager->GetOneUser($article['user_id']);
                $this->data['url'] = $article['url'];
                $this->view = 'article';
            } else {
                $articles = $articlesManager->returnArticles();
                $klic = '2';
                $this->data['articles'] = $articles;
                $this->data['klic']=$klic;
                $this->view = 'articles';
            }


    }
}