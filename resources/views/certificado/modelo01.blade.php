<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <title>Certificado</title>
    <link href="{{ asset('css/certificado.css') }}" rel="stylesheet">
</head>

<body>

<div class="certificado">
    <div class="unidade_certificadora">
        <div class="logo_certificador"></div>
    </div>

    <h3>Certificado</h3>
    <p>A Escola Nacional de Administração Pública - Enap certifica que <strong>{{ $certificado['tx_nome_pessoa']}}</strong>, concluiu o curso <span>{{ $certificado['tx_nome_curso'].' ('.$certificado['tx_nome_oferta'].')'}}</span>, disponível no período de {{$certificado['dt_inscricao']}} a {{ $certificado['dt_fim_inscricao'] }}, com carga-horária de {{ $certificado['qt_carga_horaria_oferta'] }} horas.</p>

    <div class="assinatura">
        <div class="assinatura-aline-soares"></div>
        <hr>
        <p>Aline Soares</p>
        <p>Presidente - Escola Nacional de Administração Pública</p>
    </div>

    <div class="rodaPeLogoBrasil">
{{--        @if($certificado->logo_conteudista!=null && $certificado->logo_conteudista!=' ' && $certificado->logo_conteudista!='')--}}
{{--            <img src="{{ $certificado->logo_conteudista }}" />--}}
{{--        @endif--}}
    </div>
</div>

<div class="info">

    <h3>Histórico do Participante</h3>
    <table class="info">
        <tr>
            <td>Nome: <strong>{{ $certificado['tx_nome_pessoa'] }}</strong></td>
            <td>CPF: <strong>{{ $certificado['nr_cpf'] }}</strong></td>
            <td>Data de Nascimento: <strong>{{ $certificado['dt_nascimento'] }}</strong></td>
            <td>País de Nascimento: <strong>{{ $certificado['sg_pais_nacionalidade'] }}</strong></td>
        </tr>
        <tr>
            <td>Curso: <strong>{{ $certificado['tx_nome_curso'] }}</strong></td>
            <td>Período: <strong>{{ $certificado['dt_inscricao'] }} a {{ $certificado['dt_fim_inscricao'] }}</strong></td>
            <td>Carga Horária: <strong>{{ $certificado['qt_carga_horaria_oferta'] }} horas</strong></td>
            <td>Nota Final: <strong>{{ $certificado['qt_nota_final'] }}</strong></td>
        </tr>
    </table>

    <h4>CONTEÚDO PROGRAMÁTICO</h4>
    <div class="rich-text">
        {!! $certificado['tx_conteudo_programatico'] !!}
    </div>

</div>

<div class="rodape">
    <table>
        <tr>
            <td class="qrcode">
{{--                {!! DNS2D::getBarcodeHTML(url('/documentos/validacao/certificadocheck/'.$certificado->nr_codigo_validador), "QRCODE",3,3) !!}--}}
            </td>
            <td class="obs">
                <p>Certificado registrado na Escola Virtual.Gov - EV.G sob o código {{ $certificado['nr_codigo_validador'] }}
                    <br>Este certificado foi gerado em {{ date('d/m/Y')}} às {{ date('H:m')}} horas.
                    <br>O presente certificado pode ter a sua validade comprovada acessando o QRCode à esquerda, ou, caso desejar, informando o código acima na opção Validação de Documentos no endereço:
                    <br>A data de emissão pode ser anterior à data final do curso nos casos em que o participante alcançou os requisitos mínimos para aprovação antecipadamente.
                    <div class="img-enap"></div>
            </td>
        </tr>
    </table>
</div>
