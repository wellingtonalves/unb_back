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

/**
 * Gerador de hash curto para validação de certificado
 *
 * @return string hash de 8 caracteres para validar certificado
 */
if (! function_exists('hashCertificado')) {
    function hashCertificado($id_certificado)
    {
        $toReturn   = '';
        $numeros    = '1234567890';
        $minusculas = 'abcdefghijklmnopqrstuvwxyz';
        $maiusculas = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $lista = $minusculas . $numeros . $maiusculas;

        $strlen = strlen($lista);
        for ($i = 1; $i <= 8; $i++) {

            if($i == 5){
                $toReturn .= $id_certificado;
            }
            $toReturn .= $lista[(mt_rand(1, $strlen)) - 1];
        }
        return $toReturn;
    }
}
