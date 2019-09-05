<?php
namespace CreativeFuse\PetsInStitches\Toolkit;

class Cache implements Cache_Interface{

    /**
     * Undocumented variable
     *
     * @var [type]
     */
    private $prefix;

    public function __construct( string $prefix ){

        $this->prefix = $prefix;

    }

    /********************
     * Core Public Methods
     ********************/

    /**
     * Undocumented function
     *
     * @param string $key
     * @param $unique_key
     * @return boolean
     */
     public function has( string $key, $unique_key = '' ) : bool{

        if( empty( $this->get( $key, $unique_key ) ) ){
            return false;
        }

        return true;
    }

    /**
     * Undocumented function
     *
     * @param string $key
     * @param $unique_key
     * @return void
     */
    public function get( string $key, $unique_key = '' ){
        return \get_transient( $this->get_cache_key( $key, $unique_key ) );
    }

    /**
     * Undocumented function
     *
     * @param [type] $key
     * @param [type] $data
     * @param $unique_key
     * @param [type] $expires
     * @return void
     */
    public function add( string $key, $data, $unique_key = '', $expires = DAY_IN_SECONDS ){
        return \set_transient( $this->get_cache_key( $key, $unique_key ), $data, $expires );
    }

    /**
     * Undocumented function
     *
     * @param string $key
     * @param $unique_key
     * @return void
     */
    public function delete( string $key, $unique_key = '' ){
        return \delete_transient( $this->get_cache_key( $key, $unique_key ) );
    }

    /***************************
	 * Getters
	 **************************/

    /**
     * Undocumented function
     *
     * @return void
     */
    private function get_prefix() : string{
        return (string) $this->prefix;
    }

    /**
     * Undocumented function
     *
     * @param string $key
     * @param $unique_key
     * @return void
     */
    private function get_cache_key( string $key, $unique_key = '' ) : string{

        if( $unique_key ){

			return (string) $this->get_prefix() . $key . '_' . (string) $unique_key;
		}

        return (string) $this->get_prefix() . $key;

    }

}