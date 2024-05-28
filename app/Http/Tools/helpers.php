<?php


if (!function_exists('getUuid'))
{
    function getUuid()
    {
        return \Illuminate\Support\Str::uuid()->toString();
    }
}
