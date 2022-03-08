# Laravel Repositories generator
 
[![Latest Stable Version](https://poser.pugx.org/nikidze/laravel-repository-generator/v/stable)](https://packagist.org/packages/nikidze/laravel-repository-generator)
[![Total Downloads](https://poser.pugx.org/nikidze/laravel-repository-generator/downloads)](https://packagist.org/packages/nikidze/laravel-repository-generator)
[![Monthly Downloads](https://poser.pugx.org/nikidze/laravel-repository-generator/d/monthly)](https://packagist.org/packages/nikidze/laravel-repository-generator)
[![License](https://poser.pugx.org/nikidze/laravel-repository-generator/license)](https://packagist.org/packages/nikidze/laravel-repository-generator)

Laravel Repositories generator is a package for Laravel 8 which is used to generate reposiotries from eloquent models.

## Installation

Run the following command from you terminal:


 ```bash
 composer require "nikidze/laravel-repository-generator"
 ```

## Usage

First, generate your repositories class from eloquent models in Models folder.
 ```bash
 php artisan make:repositories
 ```
And finally, use the repository in the controller:

```php
<?php namespace App\Http\Controllers;

use App\Repositories\PostRepository;

class PostController extends Controller {

    private $post;
    
    public function __construct(PostRepository $postRepository)
    {
        $this->post = $postRepository;
    }

    public function index() {
        return response()->json($this->post->all());
    }
}
```
## Available Methods

The following methods are available:

##### Nikidze\RepositoryGenerator\RepositoryInterface

```php
    public function all();

    public function trashOnly();

    public function find($id);

    public function findTrash($id);

    public function findBy($column, $value);

    public function recent($limit);

    public function store($data);

    public function update($data, $id);

    public function trash($id);

    public function restore($id);

    public function destroy($id);
```

### Example usage

Create a new post in repository:

```php
$post = $this->post->store($request->all());
```
Update existing post:

```php
$post = $this->post->update($request->all(), $post_id);
```

Delete post:
```php
$post = $this->post->destroy($id);
```

Get post by post_id:
```php
$post = $this->post->find($id);
```

you can also chose what relations to eager load:
```php
$post = $this->post->find($id);
```

## Credits

This package is inspired by [this](https://github.com/lab2view/laravel-repository-generator) great package by @tcharod.
