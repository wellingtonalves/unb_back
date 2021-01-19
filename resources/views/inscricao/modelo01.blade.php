<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <title>Comprovante de Inscrição</title>
    <link href="{{ asset('css/inscricao.css') }}" rel="stylesheet">
</head>

<body>

<h3>COMPROVANTE DE INSCRIÇÃO</h3>

<div class="info">
    <h4>CURSO</h4>
    <p>{{$inscricao['tx_nome_curso']}}</p>
    <h4>ALUNO</h4>
    <p>{{$inscricao['tx_nome_pessoa']}}</p>
    <h4>DADOS DO CURSO</h4>

    <table>
        <tr>
            <td>
                <p>Data da Inscrição</p>
                <p>{{$inscricao['dt_inscricao']}}</p>
            </td>
            <td>
                <p>Nome da Oferta</p>
                <p>{{$inscricao['tx_nome_oferta']}}</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p>Instituição Ofertante</p>
                <p>Instituição Ofertante</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p>Data para Termino do Curso</p>
                <p>{{$inscricao['dt_termino_oferta']}}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Carga Horária da Oferta</p>
                <p>{{$inscricao['qt_carga_horaria_oferta']}}</p>
            </td>
            <td>
                <p>Nota Mínima</p>
                <p>{{$inscricao['qt_nota_minima_aprovacao']}}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Modalidade</p>
                <p>{{$inscricao['tutoria']}}</p>
            </td>
            <td>
                <p>Duração da oferta</p>
                <p>{{$inscricao['qt_duracao_dias']}}</p>
            </td>
        </tr>
    </table>

</div>

<div class="rodape">
    <table>
        <tr>
            <td class="qrcode">
                {{--                {!! DNS2D::getBarcodeHTML(url('/documentos/validacao/certificadocheck/'.$inscricao->nr_codigo_validador), "QRCODE",3,3) !!}--}}
            </td>
            <td class="obs">
                <p>Certificado registrado na Escola Virtual.Gov - EV.G sob o
                    código {{ $inscricao['nr_codigo_validador'] }}
                    <br>Este certificado foi gerado em {{ date('d/m/Y')}} às {{ date('H:m')}} horas.
                    <br>O presente certificado pode ter a sua validade comprovada acessando o QRCode à esquerda, ou,
                    caso desejar, informando o código acima na opção Validação de Documentos no endereço:
                    <br>A data de emissão pode ser anterior à data final do curso nos casos em que o participante
                    alcançou os requisitos mínimos para aprovação antecipadamente.
                <div class="img-enap"></div>
            </td>
        </tr>
    </table>
</div>
