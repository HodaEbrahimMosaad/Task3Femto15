<?php

interface DBInterface
{
    static public function find_all();
    static public function find_by_id($id);
    public function create();
    public function update();
    public function delete();
    public function validate();
}


?>