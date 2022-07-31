<h2>teste fornecedor</h2>
{{-- Comentário no Blade Teste --}}
@php
//teste
/*
     esse é padrão
     */
@endphp



@if (count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3> existem alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores) > 10)
    <h3> existem vários fornecedores cadastrados</h3>
@else
    <h3> ainda não existem fornecedores cadastrados</h3>
@endif

<hr>

Fornecedor: {{ $fornecedores[0]['nome'] }}
<br>
Status: {{ $fornecedores[0]['status'] }}
<br>
@if( !($fornecedores[0]['status'] == 'S') )
    Fornecedor inativo
@endif
<br>
@unless($fornecedores[0]['status'] == 'S') <!-- se o retorno da condição for false -->
    Fornecedor inativo
@endunless
<br>

<hr>
@isset($fornecedores)
    Fornecedor: {{ $fornecedores[0]['nome'] }}
    <br>
    Status: {{ $fornecedores[0]['status'] }}
    <br>
    CNPJ: {{ $fornecedores[0]['cnpj'] ?? '' }}
    <br>
    Telefone: ({{ $fornecedores[0]['ddd'] ?? '' }}) {{ $fornecedores[0]['telefone'] ?? '' }}
    @switch($fornecedores[0]['ddd'])
        @case ('11')
            São Paulo - SP
            @break
        @case ('32')
            Juiz de Fora - MG
            @break
        @case ('85')
            Fortaleza - CE
            @break
        @default
            Estado não indentificado
    @endswitch
@endisset
