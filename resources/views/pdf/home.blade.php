<!-- resources/views/document.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <style>
        @page {
            margin: 40px;
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
        vertical-align: middle; /* Aligns the text vertically in the middle */
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
        <div>
            <table style="width:100%;margin-bottom:10px;">
                <tbody>
                    <tr style="width:100%;">
                       <td style="width:100%;height: 10px; text-align:left; background-color: red;"></td>
                       <td style="width:100%;height: 10px; text-align:left; background-color: yellow;"></td>
                       <td style="width:100%;height: 10px; text-align:left; background-color: green;"></td>
                    </tr>
                    <tr style="">
                        <td style="width:100%; text-align:left;">
                            <img src="{{ public_path('LOgo-CNSS.png') }}" width="260" height="100"> <br>
                        </td>
                        <td style="width:100%; text-align:center;">
                            <span style="font-weight:bold"> REPUBLIQUE DE GUINEE</span>
                            <div style="margin-left: 10px ; font-size:12px">
                                Travail-Justice-Solidarite
                            </div><br>
                        </td>
                        <td style="width:100%;">
                            <span style="float:right; margin:20px 10px 0 0;"> {!! DNS2D::getBarcodeHTML($reclamation->num_dossier , 'QRCODE', 3, 3) !!}</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="width:100%;text-align:center;font-weight:bold;font-size:18px;">FICHE DE RECLAMATION</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <table style="width:100%; margin-bottom:10px;">
                <tr>
                    <td style="">
                        <p style="font-weight:bold;">PRESTATION:</p>
                    </td>
                    <td style="">
                        <p style="font-weight:bold;">{{ $prestation }}</p>
                    </td>
                    <td style="">
                        <p style="text-align: right;font-weight:bold;">N° DOSSIER:</p>
                    </td>
                    <td style="">
                        <p style="text-align: right;font-weight:bold;">{{ $reclamation->num_dossier }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="width:100%;text-align:center;font-weight:bold;font-size:18px;background-color:rgb(193, 190, 190);text-transform: uppercase">Détails sur l'applicant(e)</td>
                </tr>
                <tr>
                    <td style="">
                        <p style="font-weight:bold;">Type d'Applicant(e):</p>
                    </td>
                    <td style="">
                        <p style="">{{ $reclamation->type }}</p>
                    </td>
                    <td style="">
                        <p style="text-align: right;font-weight:bold;">{{ $date_tex }}:</p>
                    </td>
                    <td style="">
                        <p style="text-align: right;">{{ $reclamation->date_naiss }}</p>
                    </td>
                </tr>
                <tr>
                    <td style="">
                        <p style="font-weight:bold;">{{ $num }} :</p>
                    </td>
                    <td style="">
                        <p style="">{{ $reclamation->numero }}</p>
                    </td>
                    <td style="">
                        <p style="text-align: right;font-weight:bold;">E-mail:</p>
                    </td>
                    <td style="">
                        <p style="text-align: right;">{{ $reclamation->add_email }}</p>
                    </td>
                </tr>
                <tr>
                    <td style="">
                        <p style="font-weight:bold;">Nom:</p>
                    </td>
                    <td style="">
                        <p style="">{{ $reclamation->nom }}</p>
                    </td>
                    <td style="">
                        <p style="text-align: right;font-weight:bold;">Téléphone:</p>
                    </td>
                    <td style="">
                        <p style="text-align: right;">{{ $reclamation->tel }}</p>
                    </td>
                </tr>
                <tr>
                    @if ($reclamation->type == 'Employeur')
                        <td style="">
                            <p style="text-align: left;font-weight:bold;">Adresse:</p>
                        </td>
                        <td style="" colspan="3">
                            <p style="text-align: left;">{{ $reclamation->adresse }}</p>
                        </td>
                    @else
                        <td style="">
                            <p style="font-weight:bold;">Prenom:</p>
                        </td>
                        <td style="">
                            <p style="">{{ $reclamation->prenom }}</p>
                        </td>
                        <td style="">
                            <p style="text-align: right;font-weight:bold;">Adresse:</p>
                        </td>
                        <td style="">
                            <p style="text-align: right;">{{ $reclamation->adresse }}</p>
                        </td>
                    @endif
                </tr>
                <tr>
                    <td colspan="4" style="width:100%;text-align:center;font-weight:bold;font-size:18px;background-color:rgb(193, 190, 190);text-transform: uppercase">Détails sur la réclamation</td>
                </tr>

            </table>
        </div>
        <div>
            <table style="width:100%;">
                <tr>
                    <td style="width:50%" colspan="">
                        <p style="font-weight:bold;">Motif(s):</p>
                        {{-- <div class="gray-bordered-div"> --}}
                            <ul>
                                @foreach ($motifs as $motif)
                                <li>{{ DB::table('motifs')->where('id',$motif)->value('value') }}</li>
                                @endforeach
                            </ul>
                        {{-- </div> --}}
                    </td>
                    <td style="width:50%" colspan="">
                        <p style="font-weight:bold;">Détails:</p>
                        <div class="gray-bordered-div">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates nam exercitationem voluptatum, voluptate odio dicta quos aliquid necessitatibus laborum odit. Numquam dolor quibusdam voluptatum doloribus non, officia dignissimos unde alias?
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="width:100%;text-align:center;font-weight:bold;font-size:18px;background-color:rgb(193, 190, 190);text-transform: uppercase">Feedback après traitement du dossier</td>
                </tr>
                <tr>
                    <td class="gray-bordered-div" colspan="2" style="width:100%; height: 300px;"></td>
                </tr>
            </table>
        </div>

        <div>
            <table style="width:100%;">
               <tr>
                <td style="width:50%">Le chef de service</td>
                <td style="width:50%; text-align: right">Conakry, le {{ $date }}</td>
               </tr>
            </table>
        </div>

        <div class="foot">
            <div>
                <img src="{{ public_path('branding.png') }}" width="100" height="70">
            </div>
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
