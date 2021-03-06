<?php

namespace DraperStudio\Commentable\Contracts;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface Commentable.
 */
interface Commentable
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments();

    /**
     * @param $data
     * @param Model      $creator
     * @param Model|null $parent
     *
     * @return mixed
     */
    public function comment($data, Model $creator, Model $parent = null);

    /**
     * @param $id
     * @param $data
     * @param Model|null $parent
     *
     * @return mixed
     */
    public function updateComment($id, $data, Model $parent = null);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function deleteComment($id);

    /**
     * @return mixed
     */
    public function commentCount();
}
