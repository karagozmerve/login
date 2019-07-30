@extends('layouts.app')

@section('content')
    <head>
        <style>
            div.table{
                overflow-x: auto;
            }
            table {
                border-collapse: collapse;
                width: 100%;
            }

            th, td {
                padding: 8px;
                text-align:center;

            }

        </style>
    </head>
    @if($sorular)
        <table class="table" border="1">
            <thead>
            <tr>
                <th>Title</th>
                <th>Subject</th>
                <th>Text</th>
                <th>Oluşturulma Tarihi</th>
                <th>Eylem</th>
            </tr>
            </thead>
            <tbody>

                @foreach($sorular as $sorular)
                    <tr>
                        <td>{{$sorular->title}}</td>
                        <td>{{$sorular->subject}}</td>
                        <td>{{$sorular->text}}</td>
                        <td>{{$sorular->created_at}}</td>
                        <td>
                            <a href ="{{url('/sil',$sorular->id)}}"  class="btn btn-danger">Sil</a>
                            <a href ="{{url('/duzenle',$sorular->id)}}" class="btn btn-info">Düzenle</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endif
@stop