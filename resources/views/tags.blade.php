@extends('layouts.app')

<style>
    .selectRow {
        display : block;
        padding : 20px;
    }
    .select2-container {
        width: 200px;
    }
</style>
                        <form action="tags" method="POST">
                            {{ csrf_field() }}

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
                            <select id="multiple" class="form-control select2-multiple" name="name" multiple>
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
