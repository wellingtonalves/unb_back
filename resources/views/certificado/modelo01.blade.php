<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <title>Certificado</title>
    <link href="{{ base_path('/public/css/certificado.css') }}" rel="stylesheet">
</head>

<body>

<div class="certificado">
    <div class="unidade_certificadora">
        <img src="" height="65px" alt="#TODO Usar a variável no attr src: $certificado->logo_certificador" />
    </div>

    <h3>Certificado</h3>
    <p>A Escola Nacional de Administração Pública - Enap certifica que <strong>{{ $certificado['tx_nome_pessoa'] }}</strong>, concluiu o curso <span>{{ $certificado['tx_nome_curso'].' ('.$certificado['tx_nome_oferta'].')'}}</span>, com início em {{ date('d/m/Y', strtotime(@$certificado['dt_inscricao'])) }} e com carga-horária de {{ $certificado['qt_carga_horaria_oferta'] }} horas.</p>

    <div class="assinatura">
        <img src="{{ base_path('/public/img/certificados/assinatura-diogo-costa.png') }}" />
        <hr>
        <p>Diogo G. R. Costa</p>
        <p>Presidente</p>
        <p>Escola Nacional de Administração Pública - Enap</p>
    </div>
</div>

<div class="info">

    <h3>Histórico do Participante</h3>
    <table class="info">
        <tr>
            <td>Nome: <strong>{{ $certificado['tx_nome_social'] != '' ? $certificado['tx_nome_social'] : $certificado[ 'tx_nome_pessoa'] }}</strong></td>
            <td colspan="2">Curso: <strong>{{ $certificado['tx_nome_curso'] }}</strong></td>
        </tr>
        <tr>
            <td>Disponibilidade: <strong>{{ date('d/m/Y', strtotime(@$certificado['dt_inscricao'])) }} a {{ date('d/m/Y', strtotime(@$certificado['dt_fim_inscricao'])) }}</strong></td>
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
                    {!! DNS2D::getBarcodeHTML(url('/validacao-documentos?codigo_validador='.$certificado['nr_codigo_validador']), "QRCODE",3,3) !!}
            </td>
            <td class="obs">
                <p>Certificado registrado na Escola Virtual.Gov - EV.G sob o código <code>{{ $certificado['nr_codigo_validador'] }}</code>.</p>
                <p>Este certificado foi gerado em {{ date('d/m/Y')}} às {{ date('H:m')}} horas.</p>
                <p>O presente certificado pode ter a sua validade comprovada acessando o QRCode à esquerda, ou, caso desejar, informando o código acima na opção Validação de Documentos no endereço <a href='{{ url('/') }}'>{{ config('app.url', 'localhost') }}</a>.</p>
                <p>A data de emissão pode ser anterior à data final do curso nos casos em que o participante alcançou os requisitos mínimos para aprovação antecipadamente.</p>
            </td>
            <td>
                <img src="{{ base_path('/public/img/certificados/selo-enap.png') }}" />
            </td>
        </tr>
    </table>
</div>

</body>
</html>
