<?php
namespace CreativeFuse\PetsInStitches;

class Related_Posts{

    private $id;

    private $cache;

    private $view_handler;

    private $view_name = 'c-related-posts';

    private $has_related_posts = false;

    public function __construct( $id, View_Handler $view, Cache $cache ){

        // Bail if our dependencies are not active
        if( ! $this->is_dependency_active() ){
            return;
        }

        $this->id = $id;
        $this->view_handler = $view_handler;
        $this->cache = $cache;
    }

    /**
     * Undocumented function
     *
     * @return boolean
     */
    private function is_dependency_active(){

        if( ! class_exists( 'ACF' ) || ! function_exists( 'get_field' ) ){
            return false;
        }

        return true;

    }

    private function set_related_posts(){

        if( \get_field( 'related_posts', $this->id ) ){

            $this->has_related_posts = true;
            return \get_field( 'related_posts', $this->id );

        }

        return [];

    }

    private function has_related_posts(){
        return $this->has_related_posts;
    }

    /**
     * Undocumented function
     *
     * @return boolean
     */
    private function is_view_cached(){

        if( \get_transient( $this->get_transient_name() ) ){
            return true;
        }

        return false;

    }

    private function get_view_path(){
        return $this->view_path;
    }

    private function get_view(){

        if( ! $this->has_related_posts() ){
            return;
        }

        if( \get_transient( $this->get_transient_name() ) ){

        }

        $related_posts = $this->get_related_posts();

        return include_once $this->get_view_path();

    }

    private function get_transient_name(){
        return "{$this->transient_base_name}{$this->id}";
    }

    /***********************
     * Public Methods
     ***********************/

    /**
     * Undocumented function
     *
     * @return void
     */
    public function display(){

    }

}