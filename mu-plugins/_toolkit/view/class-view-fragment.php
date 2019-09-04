<?php
namespace CreativeFuse\PetsInStitches\Toolkit;

class View_Fragment{

    private $fragment_location;

    private $data;

    private $output;

    public function __construct( string $fragment_location, array $data ){

        $this->fragment_location = $fragment_location;
        $this->data = $data;
        $this->output = $this->build_fragment_with_data();

    }

    /**
     * Undocumented function
     *
     * @return string
     */
    private function get_fragment_location() : string{
        return $this->fragment_location;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    private function build_fragment_with_data(){

        $props = $this->data;

        ob_start();

            include $this->get_fragment_location();

        $output = ob_get_clean();

        return $output;

    }

    public function get_output(){
        return $this->output;
    }

}