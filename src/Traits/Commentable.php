<?php

namespace DraperStudio\Commentable\Traits;

use DraperStudio\Commentable\Models\Comment;
use Illuminate\Database\Eloquent\Model;

trait Commentable
{
    /**
     * This model has many comments.
     *
     * @return Comment
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Create a new comment.
     *
     * @param array      $data
     * @param Model      $creator
     * @param Model|null $parent
     *
     * @return Comment
     */
    public function comment($data, Model $creator, Model $parent = null)
    {
        $comment = (new Comment())->createComment($this, $data, $creator);

        if (!empty($parent)) {
            $comment->makeChildOf($parent);
        }

        return $comment;
    }

    /**
     * Number of comments an entity has.
     *
     * @return string
     */
    public function getCommentCount()
    {
        return $this->comments->count();
    }
}
