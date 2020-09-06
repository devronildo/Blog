<?php
namespace App\Support;

use CoffeeCode\Optimizer\Optimizer;

class Seo{
       private $optimize;

      public function __construct()
       {
           $this->optimizer = new Optimizer();
           $this->optimizer->openGraph(
               env('APP_NAME'),
               'pt_BR',
               'article'
            )->twitterCard(
                env('CLIENT_SOCIAL_TWITTER_CREATOR'),
                env('CLIENT_SOCIAL_TWITTER_PUBLISHER'),
                env('APP_URL'),
            )->publisher(
                env('CLIENT_SOCIAL_FACEBOOK_PAGE'),
                env('CLIENT_SOCIAL_GOOGLE_AUTHOR'),
                env('CLIENT_SOCIAL_GOOGLE_PAGE'),
                env('CLIENT_SOCIAL_GOOGLE_AUTHOR')
            );
       }

       public function render(string $title,
       string $description,
       string $url,
       string $image,
       bool $follow = true){
           return  $this->optimizer->optimize($title, $description, $url, $image, $follow)->render();
       }
}

?>
