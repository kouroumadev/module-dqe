<!-- resources/views/document.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Document</title>
    <style>
        @page {
            margin: 20px;
            margin-top: 10px;
        }

        body {
            /* margin-top: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm; */
            font-family: 'Poppins', sans-serif;
            font-size: 13px;

        }

        .foot {
            position: fixed;
            bottom: -60px;
            left: 0;
            right: 0;

        }


        .detail table,
        .detail th,
        .detail td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center !important;
            padding: 2px !important;
        }

        .inline-text {
            display: inline-block;
            vertical-align: middle;
            /* Aligns the text vertically in the middle */
        }

        p {
            margin: 0;
        }

        .gray-bordered-div {
            border: 1px solid #cbcaca;
            border-radius: 4px;
            padding: 2px;
        }
    </style>
</head>

<body>
    <main>


        <table style="width: 100%;margin-bottom:10px">
            <tbody>
                <tr style="margin-top: 0 !important">

                    <td style="width:35%">
                        <img src="{{ public_path('logo.svg') }}" width="200" height="100">

                    </td>
                    <td>

                        <table style="width:100%">
                            <tr style="width: 100%">>
                                <td style="width: 100%; font-size: 14px; text-align:center;">RÉPUBLIQUE DE GUINNÉE</td>
                            </tr>
                            <tr style="width: 100%">
                                <td style="width: 100%; text-align:center; font-size: 12px;">Travail - Justice -
                                    Solidarité</td>
                            </tr>
                            <tr style="width: 100%">
                                <td style="width: 100%; font-size: 12px; text-align:center;">Caisse Nationale de
                                    Sécurité Sociale</td>
                            </tr>

                        </table>
                        <table style="width:100%">
                            <tr>
                                <td style="background-color: red; width:5%; height:2px"></td>
                                <td style="background-color: yellow; width:5%"></td>
                                <td style="background-color: green; width:5%"></td>
                            </tr>
                        </table>
                    </td>
                    <td style="width:35%;">
                        <img src="{{ public_path('branding.png') }}" width="100" height="70"
                            style="position: relative; left:80px">

                    </td>

                </tr>
            </tbody>
        </table>

        <div>
            <table style="width:100%; margin-bottom:20px;">
                <tr>
                    <td style="">
                        <p style="font-weight:bold;"> NATURE PRESTATION: {{ $rendezvous->nature }} </p>
                    </td>
                    {{-- <td style="">
                        <p style="font-weight:bold;">{{ $rendezvous->nature }}</p>
                    </td> --}}
                    <td style="">
                        <p style="text-align: right;font-weight:bold;">N° DOSSIER: {{ $rendezvous->no_conf }}</p>
                    </td>
                    {{-- <td style="">
                        <p style="text-align: right;font-weight:bold;">{{ $rendezvous->no_conf }}</p>
                    </td> --}}
                </tr>
            </table>
        </div>
        <div>
            <table style="width:100%; margin-bottom:10px;">

                <tr>
                    <td colspan="4"
                        style="width:100%;text-align:center;font-weight:bold;font-size:18px;background-color:rgb(193, 190, 190);text-transform: uppercase">
                        Détails sur l'applicant(e)</td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td style="">
                        <p style="font-weight:bold;">Type d'Applicant(e):</p>
                    </td>
                    @if ($rendezvous->no_immatriculation == null)
                        <td style="">
                            <p style="text-color: red">-</p>
                        </td>
                    @else
                        <td style="">
                            <p style="">{{ $rendezvous->no_immatriculation }}</p>
                        </td>
                    @endif

                    <td style="">
                        <p style="text-align: right;font-weight:bold;">Nom:</p>
                    </td>
                    <td style="">
                        <p style="text-align: right;">{{ $rendezvous->nom }}</p>
                    </td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td style="">
                        <p style="font-weight:bold;">Prenom:</p>
                    </td>
                    <td style="">
                        <p style="">{{ $rendezvous->prenom }}</p>
                    </td>
                    <td style="">
                        <p style="text-align: right;font-weight:bold;">E-mail:</p>
                    </td>
                    <td style="">
                        <p style="text-align: right;">{{ $rendezvous->email }}</p>
                    </td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td style="">
                        <p style="font-weight:bold;">Adresse:</p>
                    </td>
                    <td style="">
                        <p style="">{{ $rendezvous->adresse }}</p>
                    </td>
                    <td style="">
                        <p style="text-align: right;font-weight:bold;">Téléphone:</p>
                    </td>
                    <td style="">
                        <p style="text-align: right;">{{ $rendezvous->telephone }}</p>
                    </td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td colspan="4"
                        style="width:100%;text-align:center;font-weight:bold;font-size:18px;background-color:rgb(193, 190, 190);text-transform: uppercase">
                        Détails sur le Rendez-vous</td>
                </tr>

            </table>
        </div>
        <div>
            <table style="width:100%;">
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td style="width:50%" colspan="">
                        <p style="font-weight:bold;">Date: {{ $rendezvous->date_rendezvous }}</p>



                    </td>
                    <td style="width:50%" colspan="">
                        <p style="font-weight:bold;">Heure: {{ $rendezvous->heure_rendezvous }}</p>

                    </td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr style="width:50%" colspan="">
                    <p style="font-weight:bold;">Prestation: {{ $rendezvous->prestation }}</p>



                </tr>

            </table>
        </div>

        <div>
            <table style="width:100%;">
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td style="width:50%">Le chef de service</td>
                    <td style="width:50%; text-align: right">Reçu, le {{ date('Y.m.d') }}</td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
            </table>
        </div>

        <div style="display: flex;margin-top:60px">
            <div style="text-align: left; width: 75%; ">
                <img src="{{ public_path('qrcode.svg') }}" width="100" height="100">
            </div>

        </div>
        <div class="foot">

            <div style="text-align: center;font-size: 12px; position: relative; bottom:40">
                <span style="text-align: center; font-weight:bold">République de Guinée</span> <br>
                <span style="text-align: center;">Caisse Nationale de sécurité Sociale, Kouléwondy - Kaloum BP
                    138</span> <br>
                <span>République de Guinée | www.cnss.gov.gn</span>
            </div>
        </div>
    </main>

    <script type="text/php">
        if (isset($pdf)) {
            $x = 400;
            $y = 10;
            $text = "Page {PAGE_NUM} / {PAGE_COUNT}";
            $font = null;
            $size = 12;
            $color = array(255,0,0);
            $word_space = 0.0;  //  default
            $char_space = 0.0;  //  default
            $angle = 0.0;   //  default
            $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        }
    </script>


</body>

</html>
