<?php
namespace CreativeFuse\PetsInStitches\Blog;
use CreativeFuse\PetsInStitches\Toolkit\View_Interface;

class Related_Posts{

    private $current_post_id;

    private $view;

    private $view_name = 'o-related-posts';

    private $related_ids = [];

    private $has_related = false;

    public function __construct( int $current_post_id, View_Interface $view ){

        // Bail if our dependencies are not active
        if( ! $this->is_dependency_active() ){
            return;
        }

        $this->current_post_id = $current_post_id;
        $this->view = $view;

        $this->init_class();
        $this->init_events();

    }

    public function init_class(){
        $this->related_ids = $this->set_related_ids();
    }

    public function init_events(){
    }

    /**
     * Undocumented function
     *
     * @return boolean
     */
    private function is_dependency_active() : bool{

        if( ! class_exists( 'ACF' ) || ! function_exists( 'get_field' ) ){
            return false;
        }

        return true;

    }

    /**
     * Undocumented function
     *
     * @return array
     */
    private function set_related_ids() : array{

        if( \get_field( 'related_posts', $this->get_current_post_id() ) ){

            $this->has_related = true;
            return \get_field( 'related_posts', $this->get_current_post_id() );

        }

        return [];

    }

    /**
     * Undocumented function
     *
     * @return array
     */
    private function get_related() : array{
        return $this->related_ids;
    }

    /**
     * Undocumented function
     *
     * @return integer
     */
    private function get_current_post_id() : int{
        return (int) $this->current_post_id;
    }

    /***********************
     * Public Methods
     ***********************/

    /**
     * Undocumented function
     *
     * @return boolean
     */
    public function has_related() : bool{
        return $this->has_related;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function display(){

        $props = [

            'current_post_id' => $this->get_current_post_id(),
            'title' => 'Continue Reading',
            'posts' => $this->get_related()

        ];

        $rendered_view = $this->view->build( $this->view_name, $props );

        return $rendered_view;

    }

}