@extends('layouts.app')

@section('content')
    <style>

        </style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  Bize Sorun
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form action="store" method="POST">
                            {{ csrf_field() }}

                        <br >Başlık</br>
                            <input type="text" name="title" placeholder="Konu Başlığı">
                            <br>
                        <br>Konu<br>

                            <select name="subject">
                                <option value="secin" disable="true"selected="true">Lütfen Konu Seçin..</option>
                                <option value="siparis">Sipariş</option>
                                <option value="site">Site Hakkında</option>
                                <option value="oneri">Öneri</option>
                                <option value="diger">Diğer</option>
                            </select>
                            <br>
                            <br >Açıklama</br>
                            <textarea name="text" cols="90" rows="10">Lütfen Sorunuzla İlgili Bir Açıklama Giriniz..</textarea>
                            <br>
                            <br>

                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <br>
                        <input type="submit" class="btn btn-warning" value="Gönder">

                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




