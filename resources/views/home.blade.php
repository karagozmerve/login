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
                        <form action="/home" method="POST">

                        <br >Başlık</br>
                            <input type="text" name="Konu Başlığı" placeholder="Konu Başlığı">
                            <br>
                        <br>Konu<br>
                            <select name="Konu">
                                <option value="0" disable="true"selected="true">Lütfen Konu Seçin..</option>
                                <option value="1">Sipariş</option>
                                <option value="2">Site Hakkında</option>
                                <option value="3">Öneri</option>
                                <option value="4">Diğer</option>
                            </select>
                            <br>
                            <br >Açıklama</br>
                            <textarea name="notes" cols="90" rows="10">Lütfen Sorunuzla İlgili Bir Açıklama Giriniz..</textarea>
                            <br>
                            <br>

                            <link href="css/select2.min.css" rel="stylesheet">
                            <link href="css/select2.css" rel="stylesheet">
                            <link href="css/select2-bootstrap.css" rel="stylesheet">
                            <br>
                            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
                            <link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" />
                            <script src="vendor/select2/dist/js/select2.min.js"></script>
                            <link href="path/to/select2.min.css" rel="stylesheet" />
                            <script src="path/to/select2.min.js"></script>



                            <label for="id_label_single">
                                Click this to highlight the single select element

                                <select class="js-example-basic-single js-states form-control" id="id_label_single">
                                <option value="one">First</option>
                                <option value="two">Two</option>
                                <option value="three">Third</option>

                                    $ ( ".js-örnek-temel-çoklu limit" ). select2 ({
                                    maximumSelectionLength : 3 });


                                    $ ( ".js-örnek şablonlama" ). select2 ({
                                    templateResult : formatState
                                    });


                                </select>
                            </label>
<br>
                            <label for="id_label_multiple">
                                Click this to highlight the multiple select element

                                <select class="js-example-basic-multiple js-states form-control" id="id_label_multiple" multiple="multiple">
                                    $('#mySelect2').select2({
                                    selectOnClose: true
                                    });
                                    $('#mySelect2').select2({
                                    dropdownParent: $('#myModal')
                                    });
                                    $ ( ".js-örnek-temel-çoklu limit" ). select2 ({
                                    maximumSelectionLength : 3 });
                                    <option value="one">First</option>
                                    <option value="two">Two</option>
                                    <option value="three">Third</option>
                                </select>
                            </label>
                            <br>

                            <html>
                            <body>
                            <form method = 'post'>
                                <h4>SELECT SUJECTS</h4>

                                <select name = 'subject[]' multiple size = 6>
                                    <option value = 'english'>ENGLISH</option>
                                    <option value = 'maths'>MATHS</option>
                                    <option value = 'computer'>COMPUTER</option>
                                    <option value = 'physics'>PHYSICS</option>
                                    <option value = 'chemistry'>CHEMISTRY</option>
                                    <option value = 'hindi'>HINDI</option>
                                </select>
                                <input type = 'submit' name = 'submit' value = Submit>
                            </form>
                            </body>
                            </html>
                            <?php

                            if(isset($_GET["submit"]))
                            {
                                if(isset($_GET["subject"]))
                                {
                                    // Retrieving each selected option
                                    foreach ($_GET['subject'] as $subject)
                                        print "You selected $subject<br/>";
                                }
                                else
                                    echo "Select an option first !!";
                            }
                            ?>

                            <br>
                        <input type="submit" value="Gönder">

                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
