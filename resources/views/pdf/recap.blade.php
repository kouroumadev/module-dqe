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
        <div style="display: flex">
            <div style="width: 35%">
                <img src="{{ public_path('logo.svg') }}" width="200" height="100">
            </div>
            <div style="width: 40%; margin-top:15px; text-align:center">
                <span style="font-size: 20px">RÉPUBLIQUE DE GUINNÉE</span>
                <table style="width:100%">
                    <tr style="width: 100%">
                        <td style="width: 100%">Travail - Justice - Solidarité</td>
                    </tr>
                    <tr style="width: 100%">
                        <td style="width: 100%">Caisse Nationale de Sécurité Sociale</td>
                    </tr>

                </table>
                <table style="width:100%">
                    <tr>
                        <td style="background-color: red; width:15%; height:2px"></td>
                        <td style="background-color: yellow; width:15%"></td>
                        <td style="background-color: green; width:15%"></td>
                    </tr>
                </table>

            </div>
            <div style="width: 35%">
                <img src="{{ public_path('branding.png') }}" width="100" height="50"
                    style="float: right; padding:10px">
            </div>
        </div>

    </header>
    <main style="font-size: 14px">
        <div
            style="width: 50%; margin:auto; font-size:10px; text-align:center; padding:2px; margin-top:30px; background-color: rgb(108, 216, 108)">
            <h1>QUITUS</h1>
        </div>
        <table style="width: 100%; margin-top:30px">
            <tbody>
                <tr style=" " ;>
                    <td style="">Référence:</td>
                    <td style=" text-align:center;background-color:rgb(108, 216, 108); width:60%; padding:10px  ">
                        CNSS/DIRGA/5208/JANVIER-FEVRIER-MARS 24</td>
                </tr>
            </tbody>
        </table>
        <div>
            <p>Je soussigné Monsieur le DIRECTEUR GÉNÉRAL de la Caisse Nationale de Sécurité Sociale - CNSS - atteste
                que la société</p>
        </div>
        <div
            style="width: 100%; margin:auto; font-size:10px; text-align:center; padding:2px; margin-top:30px; background-color: rgb(108, 216, 108)">
            <h2>ENTREPRISE DE CONSTRUCTION ET GESTION IMMOBILIERE</h2>
        </div>

        <p>déclare et paye ses cotisations sociales à bonne date tous les mois ou tous les trimestres, et au plus tard à
            la date</p>
        <table style="width: 100%; margin-top:30px">
            <tbody>
                <tr>
                    <td style="padding-bottom:10px; ">d'exigibilité.</td>
                    <td style=" text-align:center;background-color:rgb(108, 216, 108); width:20%">
                        17/02/2024</td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td style="padding-bottom:10px">La dernière date d'acquittement de ses cotisations sociales est:
                    </td>
                    <td style=" text-align:center;background-color:rgb(108, 216, 108); width:20%  ">
                        17/02/2024</td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td style="padding-bottom:10px">Date d'expiration:</td>
                    <td style=" text-align:center;background-color:rgb(108, 216, 108); width:20%  ">
                        17/02/2024</td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td style="padding-bottom:10px">En foi de quoi le présent Quitus lui est établi pour servir et
                        valoir ce que de droit.</td>

                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td style="padding-bottom:10px">Ce document est valable pour une période de:</td>
                    <td style=" text-align:center;background-color:rgb(108, 216, 108); width:20%  ">
                        2 Mois</td>
                </tr>
            </tbody>
        </table>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div style="display: flex;margin-top:60px">
            <div style="text-align: left; width: 75%; ">
                <img src="{{ public_path('qrcode.svg') }}" width="200" height="100">
            </div>
            <div style="text-align: right">
                <p>Conakry 03 mai, 2024.</p>
                <p>Le Directeur Général</p>
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
