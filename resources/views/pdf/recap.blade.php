<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notification</title>
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
                <img src="{{ asset('logo.svg') }}" width="200" height="100">
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
                <img src="{{ asset('branding.png') }}" width="100" height="50" style="float: right; padding:10px">
            </div>
        </div>

    </header>

    <main style="font-size: 14px">
        <div
            style="width: 70%; margin:auto; font-size:10px; text-align:center; padding:2px; margin-top:30px; background-color: rgb(108, 216, 108)">
            <h1>QUITTANCE COTISATION</h1>
        </div>


        <table style=" margin-top:15px;">
            <tbody>
                <tr>
                    <td style="width:25%; padding-bottom:10px"> N° QUITTANCE:</td>
                    <td style="width:60%">3004181920400202405</td>
                </tr>
                <tr style="">
                    <td style="padding-bottom:10px">RAISON SOCIALE:</td>
                    <td>CAISSE NATIONALE DE SECURITE SOCIALE</td>
                </tr>
                <tr style="">
                    <td style="padding-bottom:10px">ADRESSE:</td>
                    <td>KALOUM CENTRE VILLE</td>
                </tr>
                <tr style="">
                    <td style="padding-bottom:10px">N°EMPLOYEUR:</td>
                    <td>3004181920400</td>
                </tr>
                <tr style="">
                    <td style="padding-bottom:10px">CATEGORIE:</td>
                    <td>E+20</td>
                </tr>
                <tr style="">
                    <td style="padding-bottom:10px">SALARIÉS:</td>
                    <td>1000</td>
                </tr>

            </tbody>
        </table>
        <div style="display: flex;">
            <div style="width: 35%">
                <span>EMAIL:</span>
            </div>
            <div style="width: 35%">
                <span>contact@gmail.com</span>
            </div>
            <div style="width: 35%">
                <span>TÉLÉPHONE:</span>
            </div>
            <div style="width: 35%">
                <span>+225 623 67 78 90</span>
            </div>

        </div>
        <hr style="margin-bottom:0">
        <hr style="margin-top:1px">
        <table style=" width:100%;">
            <tbody>

                <tr style=" " ;>
                    <td style="padding-bottom:10px">MONTANT À PAYER</td>
                    <td style=" text-align:right ">
                        1 098 0987 0987 GNF</td>
                </tr>
                <tr style=" ">
                    <td style="padding-bottom:10px">PAIEMENT SUR</td>
                    <td style=" text-align:right ">
                        FACTURATION SUR PRINCIPAL</td>
                </tr>
                <tr style=" ">
                    <td style="padding-bottom:10px">MONTANT PAYÉ</td>
                    <td style=" text-align:right ">
                        1 098 0987 0987 GNF</td>
                </tr>
                <tr style=" ">
                    <td style="padding-bottom:10px">RESTE À PAYÉ</td>
                    <td style=" text-align:right ">
                        1 098 0987 0987 GNF</td>
                </tr>
                <tr style=" ">
                    <td style="padding-bottom:10px">DATE DE PAIEMENT</td>
                    <td style=" text-align:right ">
                        03/05/2024</td>
                </tr>
                <tr style=" ">
                    <td style="padding-bottom:10px">PERIODE DE PAIEMENT</td>
                    <td style=" text-align:right ">
                        03/05/2024</td>
                </tr>
                <tr style=" ">
                    <td style="padding-bottom:10px">DATE LIMITE PAIEMENT</td>
                    <td style=" text-align:right ">
                        -</td>
                </tr>
                <tr style=" ">
                    <td style="padding-bottom:10px">MODE DE PAIEMENT</td>
                    <td style=" text-align:right ">
                        VIREMENT</td>
                </tr>
                <tr style=" ">
                    <td style="padding-bottom:10px">REFERENCE</td>
                    <td style=" text-align:right ">
                        CNSS20240503.1909.BS344R</td>
                </tr>
                <tr style=" ">
                    <td style="padding-bottom:10px">BANQUE</td>
                    <td style=" text-align:right ">
                        UBA</td>
                </tr>
                <tr style=" ">
                    <td style="padding-bottom:10px">MAJORATION DUE SUR LA PÉRIODE</td>
                    <td style=" text-align:right ">
                        0 GNF</td>
                </tr>
            </tbody>
        </table>
        <div style=" ">
            <div style="">
                <P>EN TOUTE LETTRE</P>
            </div>
            <div style="">
                <P>CINQ CENT SOIXANTE-QUINZE MILLE FRANCS GUINÉENS</P>
            </div>


        </div>
        <div style="display: flex">
            <div style="text-align: left; width: 75%">
                <img src="{{ asset('qrcode.svg') }}" width="200" height="100">
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
