<?php
namespace CreativeFuse\PetsInStitches\Toolkit;

interface Cache_Interface{

    /**
     * Undocumented function
     *
     * @param string $key
     * @param $unique_key
     * @return void
     */
    public function get( string $key, $unique_key );

    /**
     * Undocumented function
     *
     * @param string $key
     * @param [type] $data
     * @param $unique_key
     * @param [type] $expires
     * @return void
     */
    public function add(  string $key, $data, $unique_key, $expires );

    /**
     * Undocumented function
     *
     * @param string $key
     * @param $unique_key
     * @return boolean
     */
    public function has( string $key, $unique_key ) : bool;

    /**
     * Undocumented function
     *
     * @param string $key
     * @param $unique_key
     * @return void
     */
    public function delete( string $key, $unique_key );

}