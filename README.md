# Laravel Commentable

Use At Your Own Risk - Not Maintained!

-----

## Installation

First, pull in the package through Composer.

```js
"require": {
    "draperstudio/laravel-commentable": "~1.0"
}
```

And then include the service provider within `app/config/app.php`.

```php
'providers' => [
    'DraperStudio\Commentable\CommentableServiceProvider'
];
```

At last you need to publish and run the migration.
```
php artisan vendor:publish && php artisan migrate
```

-----

### Create a comment
```php
$user = User::first();
$post = Post::first();

$comment = $post->comment([
    'title' => 'Some title',
    'body' => 'Some body',
], $user);

dd($comment);
```


### Create a comment as a child of another comment (e.g. an answer)
```php
$user = User::first();
$post = Post::first();

$parent = $post->comments->first();

$comment = $post->comment([
    'title' => 'Some title',
    'body' => 'Some body',
], $user, $parent);

dd($comment);
```

### Count comments an entity has
```php
$post = Post::first();

dd($post->getCommentCount());
```


