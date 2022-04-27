<?php
function db_connect()
{
    // return new mysqli(
    //     "localhost",
    //     "sienasel_sbxusr",
    //     "Sandbox@)!&",
    //     "sienasel_sandbox"
    // );
    return new mysqli(
        ini_get("mysqli.default_host"),
        "root",
        "root",
        "webclass"
    );
}
