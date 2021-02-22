<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <title>Comprovante de Inscrição</title>
    <link href="{{ base_path('/public/css/inscricao.css') }}" rel="stylesheet">
</head>

<body>

<header></header>

<h3>Comprovante de Inscrição</h3>

<dl>
    <dt>Curso</dt>
    <dd>{{$inscricao['tx_nome_curso']}}</dd>
    <dt>Aluno</dt>
    <dd>{{$inscricao['tx_nome_pessoa']}}</dd>
</dl>

<div class="clear"></div>

<h2>Dados do Curso</h2>
<table>
    <tr>
        <td><strong>Data da Inscrição</strong> {{$inscricao['dt_inscricao']}}</td>
        <td><strong>Nome da Oferta</strong> {{$inscricao['tx_nome_oferta']}}</td>
    </tr>
    <tr>
        <td colspan="2"><strong>Instituição Ofertante</strong> TODO</td>
    </tr>
    <tr>
        <td colspan="2"><strong>Data para Término do Curso</strong> {{$inscricao['dt_termino_oferta']}}</td>
    </tr>
    <tr>
        <td><strong>Carga Horária da Oferta</strong> {{$inscricao['qt_carga_horaria_oferta']}}</td>
        <td><strong>Nota Mínima</strong> {{$inscricao['qt_nota_minima_aprovacao']}}</td>
    </tr>
    <tr>

     <td><strong>Modalidade</strong> {{$inscricao['tutoria']}}</td>
     <td><strong>Duração da oferta</strong> {{$inscricao['qt_duracao_dias']}} dias</td>

    </tr>
</table>

<div class="clear"></div>

<footer>

    <h2>EV.G | Escola Virtual.Gov</h2>
    <p>Uma proposta de solução para a oferta de capacitação a distância no serviço público brasileiro.</p>

    <div>
        <table>
            <tr>
                <td class="qrcode">
                    {{--                {!! DNS2D::getBarcodeHTML(url('/documentos/validacao/certificadocheck/'.$inscricao->nr_codigo_validador), "QRCODE",3,3) !!}--}}
                </td>
                <td class="organization">O presente documento pode ter a sua validade comprovada acessando o QRCode à esquerda, ou, caso desejar, informando o código <code>{{ $inscricao['nr_codigo_validador'] }}</code> na página da <a href='{{ url('/') }}'>EVG</a>, opção "Validação de Documentos".</td>
            </tr>
        </table>
    </div>

</footer>

</body>
</html>
