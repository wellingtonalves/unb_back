<?php

if (!function_exists('formataData')) {
    function formataData(String $data, $formato = 'd/m/Y')
    {
        if (!$data) {
            return null;
        }
        return \Illuminate\Support\Carbon::parse($data)->format($formato);
    }
}
