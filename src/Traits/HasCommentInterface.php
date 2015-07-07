<?php

namespace DraperStudio\Commentable\Traits;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface HasCommentInterface.
 */
interface HasCommentInterface
{
    /**
     * @return mixed
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
     * @return mixed
     */
    public function getCommentCount();
}
