<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fiche Decompte</title>
</head>
<body style="font-family: 'Poppins',sans-serif">
    
    <table style="width: 100%;margin-bottom:10px">
        <tbody>
           <tr style="margin-top: 0 !important">
               
               <td>
                <img src="{{ public_path('LOgo-CNSS.png') }}" width="200" height="100">
                
                </td>
               <td>
                  {{-- <span style="position: relative; top: -35"> REPUBLIQUE DE GUINEE</span>
    
                   <div style="width:75%; margin-left:0px;position: relative; top: -30">
                     <table style="width: 100%">
                        <tr>
                            <td style="background-color: red; width:85%; height:2px"></td>
                            <td style="background-color: yellow; width:75%"></td>
                            <td style="background-color: green; width:75%"></td>
                        </tr>
                     </table>
                  </div> --}}
                    {{-- <div style="margin-left: 20px;position: relative; top: -25"> Travail-Justice-Solidarite </div><br><br> --}}
    
               </td>
               <td>
                <img src="{{ public_path('branding.png') }}" width="150" height="70">
                
                </td>
               
           </tr>
        </tbody>
    </table>

    <div style="font-family: cursive; text-align:center">DIRECTION DES PRESTATIONS SOCIALES</div>

    <div style="width: 70%; margin:auto; font-size:10px; text-align:center; padding:1px; margin-top:30px; background-color:rgb(49, 191, 49)">
        <h1>FICHE DE DECOMPTE</h1>
    </div>
    
    
    <img src="{{public_path('b.jpg')}}" style="width:100px; height:100px; position:relative; top:10px;left:300px" alt="" srcset="">
    

    <p style="text-align: right; margin-top:10px">
        Conakry {{$date}}. <br> <br>
        
    </p>
    <div style="width: 30%;  margin:auto; border: 1px solid black; text-align:center; padding:1px; margin-top:10px;">
        <h3 style="color: red;">N°01-504587</h3>
    </div>
<div style="display:inline-flex;">
    <table style="margin-top: 20px">
        <tbody>
            <tr>
                <th style="width: 30%; text-align:left; font-size: 11px">PRENOMS:</th>
                <td style="font-size: 11px">Issiaga BINTOU MANDIAMA</td>
            </tr>
            <tr>
                <th style="width: 30%; font-size: 11px; text-align:left">NOM:</th>
                <td style="font-size: 11px">Camara</td>
            </tr>
            <tr>
                <th style="width: 30%; font-size: 11px; text-align:left">N° ASSURE:</th>
                <td style="color: red; font-weight:bold;font-size: 11px"> 16120000046899</td>
            </tr>
            <tr>
                <th style="width: 30%; font-size: 11px; text-align:left">DATE NAISSANCE:</th>
                <td style="font-size: 11px"> {{$date}}</td>
            </tr>
            
        </tbody>
        
    </table>
    
</div>
   <div>
    <table style="position:absolute; top:360; left:250">
        <tbody>
            
            <tr>
                <th style="width: 30%; font-size: 11px; text-align:left">AGENCE:</th>
                <td style="font-size: 11px"> Boké</td>
            </tr>
            <tr>
                <th style="width: 30%; font-size: 11px; text-align:left">ASSIGNATION:</th>
                <td style="font-size: 11px">Boké</td>
            </tr>
            <tr>
                <th style="width: 30%; font-size: 11px; text-align:left">EX EMPLOYÉ:</th>
                <td style="font-size: 11px; color: red;">CAISSE NATIONALE DE LA SECURITE SOCIALE</td>
            </tr>
        </tbody>
        
    </table>
   </div>
    <div style=" margin:auto;  text-align:center; padding:1px; margin-top:10px;">
        <h3>DECOMPTE</h3>
    </div>

    <table style="margin-top: 0px">
        <tbody>
            <tr>
                <th style="width: 30%; text-align:left">Salaire de référence:</th>
                <td>216 000 000 /120 = 1 800 000 par Mois</td>
            </tr>
            <tr>
                <th style="width: 30%; text-align:left">Annuités de service:</th>
                <td>27 ans</td>
            </tr>
            <tr>
                <th style="width: 30%; text-align:left">Pourcentage Acquis:</th>
                <td>27 * 2% = 54%</td>
            </tr>
            <tr>
                <th style="width: 30%; text-align:left">Montant Annuel de la Pension:</th>
                <td>18 000 000 * 12 * 54% = 11 664 000 GNF</td>
            </tr>
            <tr>
                <th style="width: 30%; text-align:left">Montant Trimestriel:</th>
                <td>11 664 000 / 4 = 2 916 000 GNF</td>
            </tr>
            <tr>
                <th style="width: 30%; text-align:left">Montant Trimestriel revalorisé:</th>
                <td>2 916 000 + 40% = 4 082 400 GNF</td>
            </tr>
            <tr>
                <th style="width: 30%; text-align:left">Montant de l'Allocation Familiale(AF):</th>
                <td>9 000 GNF</td>
            </tr>
            <tr>
                <th style="width: 30%; text-align:left">Montant Total de la Pension:</th>
                <td>4 082 400 + 9 000(AF) = 4 091 400 GNF</td>
            </tr>
        </tbody>
        
    </table>
    <p style="text-align: right; margin-top:10px">
        
       <span style="color: red; font-weight:bold">MONTANT TOTAL: 4 091 400 GNF </span> 
    </p>
    <table style="border: 1px solid black; height:90px; width:100%">
        <tbody>
            <tr style="border: 1px solid black; width:100%;"> 
                <th style=" width:25%; border-right: 1px solid black;height:130px"> <span style="position: relative; top: -25"> Le Chef de Service </span> </th>
                <th style=" width:25%; border-right: 1px solid black; text-align:center"> <span style="position: relative; top: -25">  Le Directeur des Prestations Sociale </span> </th>
                <th style=" width:25%; border-right: 1px solid black; text-align:center"> <span style="position: relative; top: -25">  L'Agent Comptable </span> </th>
                <th style=" width:25%;"> <span style="position: relative; top: -25"> Le Directeur Générale </span>  </th>
            </tr>
        </tbody>
    </table>
    <div style="position: absolute; top:300px"> 
        {!! DNS2D::getBarcodeHTML("098765432133", 'QRCODE',5,5) !!}
    </div> <br>
    {{-- <hr style="margin-bottom: 0px"> --}}
    
                    <div style="width: 20%; font-size: 11px; position: absolute; bottom:-15">
                        <img src="{{ public_path('flagui.png') }}" width="100" height="40">
                     </div>
                
                 <div style="text-align: center; position: absolute; bottom:-20; left: 150;font-size: 11px;">
                    <span style="text-align: center; font-weight:bold">République de Guinée</span> <br>
                    <span style="text-align: center;">Caisse Nationale de sécurité Sociale, Kouléwondy - Kaloum BP 138</span> <br>
                    <span>République de Guinée | www.cnss.gov.gn</span>
                </div>   
               
    
    {{-- <hr style="margin-top: 5px" > 
    <span style="text-align: center; position:absolute; bottom:-5">CAISSE NATIONALE DE SECURITE SOCIALE (C.N.S.S) BP: 138 Conakry, TEL: 622 00 00 00</span> --}}
</body>
</html>