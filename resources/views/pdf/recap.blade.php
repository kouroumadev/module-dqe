<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>recap</title>
    <style>
        @page {
            margin: 0cm 0cm;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
            font-family: 'Poppins', sans-serif;

        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 4cm;
        }

        main {
            position: relative;
            top: 80px !important;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            display: flex !important;
        }
    </style>
</head>

<body>

    <header>
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
                            style="position: relative; left:60px">

                    </td>

                </tr>
            </tbody>
        </table>

    </header>
    <main style="font-size: 14px">
        <div
            style="width: 50%; margin:auto; font-size:10px; text-align:center; padding:2px; margin-top:30px; background-color: rgb(108, 216, 108)">
            <h1>Resumé Rendez-vous</h1>
        </div>

        <div>
            <table style="width:100%; margin-bottom:20px;">
                <tr>
                    <td style="">
                        <p style="font-weight:bold;"> NATURE PRESTATION:</p>
                    </td>
                    <td style="">
                        <p style="font-weight:bold;">{{ $rendezvous[0]->nature }}</p>
                    </td>
                    <td style="">
                        <p style="text-align: right;font-weight:bold;">N° DOSSIER:</p>
                    </td>
                    <td style="">
                        <p style="text-align: right;font-weight:bold;">{{ $rendezvous[0]->no_conf }}</p>
                    </td>
                </tr>
            </table>
        </div>
        {{-- <table style="width: 100%; margin-top:30px">
            <tbody>
                <tr>
                    <td style="padding-bottom:10px; ">Référence:</td>
                    <td style=" text-align:right; width:35%">
                        <strong> {{ $rendezvous[0]->no_conf }}</strong>
                    </td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td style="padding-bottom:10px; ">Prenom et Nom:</td>
                    <td style=" text-align:right; width:35%">
                        {{ $rendezvous[0]->prenom }} {{ $rendezvous[0]->nom }}</td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td style="padding-bottom:10px">Adresse:
                    </td>
                    <td style=" text-align:right; width:35%  ">
                        {{ $rendezvous[0]->adresse }}</td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td style="padding-bottom:10px">E-mail:</td>
                    <td style=" text-align:right; width:35%  ">
                        {{ $rendezvous[0]->email }}</td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                <tr>
                    <td style="padding-bottom:10px">Telephone:</td>
                    <td style=" text-align:right; width:35%  ">
                        {{ $rendezvous[0]->telephone }}</td>
                </tr>

                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td style="padding-bottom:10px">Lieu de Rendez-vous:</td>
                    <td style=" text-align:right; width:35%  ">
                        {{ $rendezvous[0]->agence }}</td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td style="padding-bottom:10px">Nature du Rendez-vous:</td>
                    <td style=" text-align:right; width:35%  ">
                        {{ $rendezvous[0]->nature }}</td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td style="padding-bottom:10px">Prestation:</td>
                    <td style=" text-align:right; width:35%  ">
                        {{ $rendezvous[0]->prestation }}</td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td style="padding-bottom:10px">Date et heure du Rendez-vous:</td>
                    <td style=" text-align:right; width:35%  ">
                        {{ $rendezvous[0]->date_rendezvous }} à {{ $rendezvous[0]->heure_rendezvous }}</td>
                </tr>
            </tbody>
        </table> --}}
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
                    @if ($rendezvous[0]->no_immatriculation == null)
                        <td style="">
                            <p style="text-color: red">-</p>
                        </td>
                    @else
                        <td style="">
                            <p style="">{{ $rendezvous[0]->no_immatriculation }}</p>
                        </td>
                    @endif

                    <td style="">
                        <p style="text-align: right;font-weight:bold;">Nom:</p>
                    </td>
                    <td style="">
                        <p style="text-align: right;">{{ $rendezvous[0]->nom }}</p>
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
                        <p style="">{{ $rendezvous[0]->prenom }}</p>
                    </td>
                    <td style="">
                        <p style="text-align: right;font-weight:bold;">E-mail:</p>
                    </td>
                    <td style="">
                        <p style="text-align: right;">{{ $rendezvous[0]->email }}</p>
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
                        <p style="">{{ $rendezvous[0]->adresse }}</p>
                    </td>
                    <td style="">
                        <p style="text-align: right;font-weight:bold;">Téléphone:</p>
                    </td>
                    <td style="">
                        <p style="text-align: right;">{{ $rendezvous[0]->telephone }}</p>
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
                        <p style="font-weight:bold;">Date: {{ $rendezvous[0]->date_rendezvous }}</p>



                    </td>
                    <td style="width:50%" colspan="">
                        <p style="font-weight:bold;">Heure: {{ $rendezvous[0]->heure_rendezvous }}</p>

                    </td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr style="width:50%" colspan="">
                    <p style="font-weight:bold;">Prestation: {{ $rendezvous[0]->prestation }}</p>



                </tr>

            </table>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div style="display: flex;margin-top:60px">
            <div style="text-align: left; width: 75%; ">
                <img src="{{ public_path('qrcode.svg') }}" width="100" height="100">
            </div>

        </div>

    </main>

    <footer>

        <div style="text-align: center;font-size: 12px; width:100%">
            <span style="text-align: center; font-weight:bold">République de Guinée</span> <br>
            <span style="text-align: center;">Caisse Nationale de sécurité Sociale, Kouléwondy - Kaloum BP
                138</span> <br>
            <span>République de Guinée | www.cnss.gov.gn</span>
        </div>
    </footer>
</body>

</html>
