<?php
namespace CreativeFuse\PetsInStitches;

class Blog{

    private $id;

    private $related_posts;

    public function __construct( int $id ){

        $this->id = $id;

        $this->related_posts = new Related_Posts(
            $this->id,
            new View_Handler,
            new Cache( 'pns_related_posts' )
        );

    }

    /***********************
     * Public Methods
     ***********************/

    public function display_related_posts(){

        if( $this->related_posts->has_related() ){
            $this->related_posts->display();
        }

    }

}