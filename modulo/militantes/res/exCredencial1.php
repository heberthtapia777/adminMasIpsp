<?php
    $ci = $_GET['ci'];
    $nom = $_GET['name'];

    $cargo = $_GET['ca'];
    if ($cargo == '') {
        $cargo = "<br>";
    }
    //$date = '31/12/'.date('Y');
?>
<style type="text/css">
<!--
table.morpion{
    border: 0;
    /*margin-top: -405px;*/
    margin-top: 207px;
    margin-left: 15px;
    border-collapse: collapse;
    border: 1px;
}

table.morpion td
{
    font-size:    6.5pt;
    font-weight:  bold;
    border:       0;
    padding:      4px 0;
    text-align:   left;
    /*border: 1px;*/
    /*padding: 4px 0;*/
}

table.morpion td.j1 { color: #0A0; }
table.morpion td.j2 { color: #A00; }

table.morpion1{
    border: 1;
    margin-top: 71px;
    margin-left: -55px;
    border-collapse: collapse;

}
.cel1{
    padding: 2px 0 0 0;
}
.cel2{
    width: 125px;
    padding: 2px 0 2px 3px;
}
.cel3{
    padding: 4px 0 4px 3px;
}
-->
</style>

<page format="54x162" orientation="P" style="font-size: 10pt" >
    <div>
        <!-- <img src="./res/credencial2.png" alt="logo" height="612"> -->
        <table class="morpion"  >
            <tr>
                <td class="cel1">NOMBRE:</td>
                <td class="cel2"><?=$nom;?></td>
            </tr>
            <tr>
                <td>CARGO:</td>
                <td class="cel3">MILITANTE</td>
            </tr>
            <tr>
                <td>C.I.:</td>
                <td class="cel3"><?=$ci;?></td>
            </tr>
        </table>

        <table class="morpion1" cellspacing="5px" >
            <tr>
                <td>
                    <div class="zone" style="height: 40mm;vertical-align: middle;text-align: center;">
                        <qrcode value="<?php echo $nom."\n".$ci; ?>" ec="Q" style="width: 18mm; border: 0;" ></qrcode>
                    </div>
                </td>
            </tr>

        </table>

    </div>
    <link rel="stylesheet" type="text/css" href="./css/style.css"/>
</page>
