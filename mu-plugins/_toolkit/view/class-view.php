<?php
namespace CreativeFuse\PetsInStitches\Toolkit;
use RuntimeException;

class View implements View_Interface{

    private $view_dir;

    public function __construct( string $view_dir ){
        $this->view_dir = $view_dir;
    }

    private function get_view_dir() : string{
        return $this->view_dir;
    }

    private function build_full_file_path( $file_name ) : string{

        $file = sprintf( '%s.php', $file_name );

        $full_file_path = trailingslashit( $this->get_view_dir() ) . $file;

        return $full_file_path;

    }

    public function build( string $file_name, $data ){

        $path = $this->build_full_file_path( $file_name );

        if( \is_readable( $path ) ){

            $view_fragment = new View_Fragment( $path, $data );

            return $view_fragment->get_output();

        } else {

            throw new RuntimeException( "The View Fragment `{$file_name}` could not be retrieved from the attempted path: `{$path}`" );

        }

    }

}