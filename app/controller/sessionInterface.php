<?php

interface SessionInterface{

    public function get();

    public function set($session, $value);

    public function destroy();

}

?>