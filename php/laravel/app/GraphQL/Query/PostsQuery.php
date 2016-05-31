<?php
namespace App\GraphQL\Query;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use App\Post;

class PostsQuery extends Query {

  protected $attributes = [
    'name' => 'Posts query'
  ];

  public function type()
  {
    return Type::listOf(GraphQL::type('post'));
  }

  public function args()
  {
    return [
      'id' => ['name' => 'id', 'type' => Type::string()],
    ];
  }

  public function resolve($root, $args)
  {
    if(isset($args['id']))
    {
      return Post::where('id' , $args['id'])->get();
    }
    else
    {
      return Post::all();
    }
  }

}
