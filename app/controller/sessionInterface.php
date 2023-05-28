<?php

interface SessionInterface{

    public function get($value);

    public function set($session, $value);

    public function destroy();

}

?>