<?php

namespace DraperStudio\Commentable\Traits;

use DraperStudio\Commentable\Models\Comment;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Commentable.
 */
trait Commentable
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * @param $data
     * @param Model      $creator
     * @param Model|null $parent
     *
     * @return static
     */
    public function comment($data, Model $creator, Model $parent = null)
    {
        $comment = (new Comment())->createComment($this, $data, $creator);

        if (!empty($parent)) {
            $comment->appendTo($parent)->save();
        }

        return $comment;
    }

    /**
     * @param $id
     * @param $data
     * @param Model|null $parent
     *
     * @return mixed
     */
    public function updateComment($id, $data, Model $parent = null)
    {
        $comment = (new Comment())->updateComment($id, $data);

        if (!empty($parent)) {
            $comment->appendTo($parent)->save();
        }

        return $comment;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function deleteComment($id)
    {
        return (new Comment())->deleteComment($id);
    }

    /**
     * @return mixed
     */
    public function commentCount()
    {
        return $this->comments->count();
    }
}
