
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>attestation</title>
</head>

<body cz-shortcut-listen="true">
  <div style="margin-buttom: 100px;/* margin-bottom: 100px; */">
    <img style="height: 44px;width: 204px;float: left;padding-top: 25px;" src="{{ asset('img/logoattes.png') }}">  
    <p style="float: right;">
    NewDev <br> 29 Av Med Slaoui 1er étage Bureau N° 2 <br> Tél. 06 60 64 69 64 <br> Fax. 05 35 65 18 26 <br> Site http://newdevmaroc.com 
    </p>
  </div>

  <div style="clear: both;"></div>


<div data-canvas-width="343.0378903035412" style="text-align: center; font-weight: bold; font-size: 40px; padding: 100px;">
  ATTESTATION DE STAGE
</div>

<div>
  <p>
      Nous soussignés, Monsieur BENNANI ABDELLAH, Directeur Boite devlopememt NEW DEV, atteste que Stagaire {{ $s -> nom . " " . $s -> prenom }}, a effectué un stage pratique de fin de formation du {{ $s -> dateDebut}} au {{ $s -> dateFin}}
        dans notre service logiciel en sa qualité de Développeur d'Applications
  </p>
          <br><br>
  <p>
  En foi de quoi, la présente attestation lui est délivrée pour servir et valoir ce que de droit.
  </p>
</div>

    <br><br><br>


    <div>
      <p style="text-align: right;padding-right: 20px;"> Fait à fés, le <?php echo date("Y/m/d"); ?> </p>
    </div>

    <br><br><br>
    <br><br><br>


      <div>signature</div>

    







</body>


</html>