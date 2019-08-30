<?php
namespace CreativeFuse\PetsInStitches;

class View{

    private $data;

    private $echo;

    public function __construct( $data, $echo = true ){

        $this->data = $data;
        $this->echo = $echo;

    }

}