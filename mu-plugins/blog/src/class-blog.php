<?php
namespace CreativeFuse\PetsInStitches\Blog;
use CreativeFuse\PetsInStitches\Toolkit\View;

class Blog{

    private $id;

    private $views_dir;

    private $related_posts;

    public function __construct( int $id ){

        $this->id = $id;
        $this->views_dir = dirname( __DIR__ ) . '/views/';
        $this->view = new View( $this->views_dir );

        $this->related_posts = new Related_Posts(
            $this->id,
            $this->view
        );

    }

    /***********************
     * Public Methods
     ***********************/

    public function display_related_posts(){

        if( $this->related_posts->has_related() ){
            return $this->related_posts->display();
        }

    }

}