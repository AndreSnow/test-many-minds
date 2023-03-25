<?php defined('BASEPATH') or exit('No direct script access allowed');

function title()
{
    return url_title(uri_string(), 'dash', TRUE);
}
