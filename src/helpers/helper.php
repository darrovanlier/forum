<?php

function url($url)
{
    return 'http://' . $_SERVER['HTTP_HOST'] . '/' . $url;
}
