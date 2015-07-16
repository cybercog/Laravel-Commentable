<?php

namespace DraperStudio\Commentable\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\Node;

/**
 * Class Comment.
 */
class Comment extends Node
{
    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * @return bool
     */
    public function hasChildren()
    {
        return $this->children()->count() > 0;
    }

    /**
     * @return mixed
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    /**
     * @param Model $commentable
     * @param $data
     * @param Model $creator
     *
     * @return static
     */
    public function createComment(Model $commentable, $data, Model $creator)
    {
        $comment = new static();
        $comment->fill(array_merge($data, [
            'creator_id' => $creator->id,
            'creator_type' => get_class($creator),
        ]));

        $commentable->comments()->save($comment);

        return $comment;
    }

    /**
     * @param $id
     * @param $data
     *
     * @return static
     */
    public function updateComment($id, $data)
    {
        $comment = static::find($id);
        $comment->update($data);

        return $comment;
    }

    /**
     * @param $id
     *
     * @return static
     */
    public function deleteComment($id)
    {
        return static::find($id)->delete();
    }
}
