<?php
namespace frontend\components;

use yii\base\Widget;
use yii\helpers\Html;

class RctCommentsWidget extends Widget {
    public $recent_comments;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $commentsString = '';

        foreach ($this->recent_comments as $comment)
        {
            $commentsString .= '<div class="recent-comment">' .
                '<div class="title">' .
                '<p style="color:#777;font-style:italic;">' .
                nl2br($comment->content) . '</p>' .
                '<p class="text"><span class="glyphicon glyphicon-user" aria-hidden="true">' . Html::encode($comment->user->username) . '</span></p>' .
                '<p style="font-size:8pt;color:bule">《<a href="' . $comment->post->postUrl . '">' . Html::encode($comment->post->title) . '</a>》</p>' .
                '<hr></div></div>';
        }

        return $commentsString;
    }
}