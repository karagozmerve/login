@if (session('status'))
    <div class="alert">
        {{ session('status') }}
    </div>
@endif

@extends('layouts.app')

    <style>
        .selectRow {
            display : block;
            padding : 20px;
        }
        .select2-container {
            width: 200px;
        }
        .alert{
            background:#aa4a24;
            color:#000000;
            padding:10px;
            margin-bottom: 10px;
        }
    </style>


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Bize Sorun
                    </div>

                    <div class="panel-body">

                            @if (session()->has('success'))
                                <div class="alert alert-{{ session('success') }}">
                                <h1>{{ session('success') }}</h1>
                                </div>
                            @endif

                        @if(isset($soruguncelle))
                            <form action="{{url('/duzenle')}}" method="POST">
                                {{ csrf_field() }}

                                <input type="hidden" name="id" value="{{$soruguncelle->id}}">
                                <br >Başlık<br>
                                <input type="text" name="title" placeholder="Konu Başlığı" value="{{$soruguncelle->title}}">
                                <br>
                                <br>Konu<br>

                                <select name="subject" >

                                    <option value="siparis" @if($soruguncelle->subject=="siparis") selected="true" @endif >Sipariş</option>
                                    <option value="secin" @if($soruguncelle->subject=="secin") selected="true" @endif >Lütfen Konu Seçin..</option>
                                    <option value="site" @if($soruguncelle->subject=="site") selected="true" @endif >Site Hakkında</option>
                                    <option value="oneri" @if($soruguncelle->subject=="oneri") selected="true" @endif >Öneri</option>
                                    <option value="diger" @if($soruguncelle->subject=="diger") selected="true" @endif >Diğer</option>

                                </select>
                                <br>
                                <br >Açıklama<br>

                                <textarea name="text" cols="90" rows="10">{{$soruguncelle->text}}</textarea>
                                <br>
                                <br>
                                <br>Etiket<br>
                                <!doctype html>
                                <html class="demo">
                                <head>
                                    <meta charset="utf-8">
                                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                                    <meta name="viewport" content="width=device-width, initial-scale=1">
                                    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
                                    <!--[if lt IE 9]>

                                    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                                    <script src="js/respond.min.js"></script>

                                    <![endif]-->
                                </head>

                                <body>
                                <label for="multiple" class="control-label"  ></label>
                                <select id="multiple" class="form-control select2-multiple" name="label[]"  multiple>

                                    <optgroup label="Label">

                                        <option value="bug" @if($soruguncelle->label=="bug") selected="true" @endif>Bug</option>
                                        <option value="kargo" @if($soruguncelle->label=="kargo") selected="true" @endif >Kargo</option>
                                        <option value="acil" @if($soruguncelle->label=="acil") selected="true" @endif>Acil</option>
                                        <option value="hasarli" @if($soruguncelle->label=="hasarli") selected="true" @endif>Hasarlı</option>
                                        <option value="iade" @if($soruguncelle->label=="iade") selected="true" @endif>İade</option>

                                    </optgroup>

                                    <optgroup label="Ekleyeceğiniz Etiketi Bulamadıysanız Burdan Ekleyebilirsiniz.."></optgroup>
                                </select>

                                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>

                                <script>
                                    var placeholder = "Select a State";
                                    $( ".select2-single, .select2-multiple" ).select2( {
                                        tags: true,
                                        tokenSeparators: [' ', ' '],
                                        placeholder: placeholder,
                                        containerCssClass: ':all:'
                                    } );

                                </script>
                                </body>
                                </html>
                                <br>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <br>
                                <input type="submit" class="btn btn-warning" value="Düzenle">

                            </form>

                        @else
                            <form action="store" method="POST">
                                {{ csrf_field() }}

                                <br >Başlık<br>
                                <input type="text" name="title" placeholder="Konu Başlığı">
                                <br>

                                <br>Konu<br>
                                <select name="subject">
                                    <option value="secin" disabled="true" selected="true">Lütfen Konu Seçin..</option>
                                    <option value="siparis">Sipariş</option>
                                    <option value="site">Site Hakkında</option>
                                    <option value="oneri">Öneri</option>
                                    <option value="diger">Diğer</option>
                                </select>
                                <br>

                                <br >Açıklama<br>
                                <textarea name="text" cols="90" rows="10">Lütfen Sorunuzla İlgili Bir Açıklama Giriniz..</textarea>
                                <br>

                                <br>Etiket<br>
                                <!doctype html>
                                <html class="demo">
                                <head>
                                    <meta charset="utf-8">
                                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                                    <meta name="viewport" content="width=device-width, initial-scale=1">
                                    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
                                    <!--[if lt IE 9]>

                                    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                                    <script src="js/respond.min.js"></script>

                                    <![endif]-->
                                </head>

                                <body>
                                <label for="multiple" class="control-label"  ></label>
                                <select id="multiple" class="form-control select2-multiple" name="label[]" multiple>
                                    <optgroup label="~Daha Önce Eklenmiş Etiketler~">

                                        <option value="bug" >Bug</option>
                                        <option value="kargo" >Kargo</option>
                                        <option value="acil">Acil</option>
                                        <option value="hasarli">Hasarlı</option>
                                        <option value="iade">İade</option>

                                    </optgroup>
                                    <optgroup label="Ekleyeceğiniz Etiketi Bulamadıysanız Burdan Ekleyebilirsiniz..">
                                    <option value="+" >+EKLE</option>
                                    </optgroup>
                                </select>
                                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>

                                <script>
                                    var placeholder = "Lütfen Etiket Seçiniz...";
                                    $( ".select2-single, .select2-multiple" ).select2( {
                                        tags: true,
                                        tokenSeparators: [' ', ' '],
                                        placeholder: placeholder,
                                        containerCssClass: ':all:'
                                    } );


                                </script>
                                </body>
                                </html>

                                <br>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <br>
                                <input type="submit" class="btn btn-warning" value="Gönder">

                            </form>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>




