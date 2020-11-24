<?php

// Allow the config
define('__CONFIG__', true);
// Require the config
require_once "inc/config.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require_once "inc/head.php";
    ?>

    <?php require_once "inc/head.php"; ?>

    <title>Requirements</title>

</head>

<body>
<?php require_once "inc/navbar.php"; ?>

<div class="uk-section uk-container">
    <div class="uk-grid uk-child-width-1-3@s uk-child-width-1-1" uk-grid>
        <div class="container" >
            <p><b>Antrojo atsiskaitymo užduotis:</b></p>

            <p><b>Atsiskaitymo būdas: </b>praktinių
                darbų metu pademonstruoti sukurtą puslapį/sistemą, naudojant PHP/ASP/JavaScript
                ir kitas technologijas</p>

            <p><b>Vertinimo sistema: </b>atitikimas
                pateiktiems darbo reikalavimams;<b></b></p>

            <p><b>Užduotis: </b>Kiekvienas
                studentas turi sukurti savo <b>puslapį/sistemą,
                    kuri apdorotų konkrečius duomenis (naudojama DB)</b>, jo turinys, tematika ir
                struktūra bei dizainas gali būti įvairus. Sukurta sistema turi tenkinti tokius
                reikalavimus:</p>

            <p><u>Minimalus DB dydis 3-4 lentelės;</u></p>

            <p>Duomenų bazės schema turi būti pateikiama sukurtame
                puslapyje, kaip paveikslėlis. Kartu su aprašytais atributais.</p>

            <p><u>Puslapis turi turėti tokius bendruosius komponentus:</u></p>

            <p><!--[if !supportLists]-->1)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!--[endif]--><b>Puslapio
                    žemėlapį</b>, kuriame turi būti pateikta puslapio struktūra;</p>

            <p><!--[if !supportLists]-->2)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!--[endif]--><b>„Namų“</b> (<i>arba pagrindinio puslapio</i>) nuorodą;</p>

            <p><!--[if !supportLists]-->3)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!--[endif]--><b>Autoriaus
                    elektroninio pašto adresas</b> (<i>galimybė
                    parašyti elektroninį laišką autoriui</i>);</p>

            <p><!--[if !supportLists]-->4)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!--[endif]-->Pagrindinį puslapio <b>valdymo meniu</b>;</p>

            <p><!--[if !supportLists]-->5)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!--[endif]-->Ženklus ir užrašus, kad puslapis yra sukurtas
                konkretaus asmens, nurodant puslapio sukūrimo metus, bei kitus svarbius
                duomenis jeigu to reikia;</p>

            <p><u>Sukurtame puslapyje turi būti panaudotos tokios PHP /MySQL/HTML/JavaScript
                    galimybės:</u></p>

            <p><!--[if !supportLists]-->1)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!--[endif]-->Suformuoti tvarkingi puslapio <b>meta duomenys</b>, kuriuose turi būti pateikta tokias informacija, kaip
                <i>sukūrimo data, puslapio galiojimo data,
                    paieškos sistemų indeksavimo savybės, autorius, raktiniai žodžiai ir t.t.</i>;</p>

            <p><!--[if !supportLists]-->2)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!--[endif]-->Puslapis turi turėti tvarkingą antraštę;</p>

            <p><!--[if !supportLists]-->3)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!--[endif]-->Teksto formatavimas atliekamas naudojant tam skirtas
                HTML teksto formatavimo žymes (<i>pvz.: tai
                    yra antraštės formatuojamos &lt;h1&gt;-&lt;h6&gt; žymių pagrindu, o ne
                    naudojant &lt;p&gt; žymes ir panašiai</i>). Reikalui esant turi būti panaudotos
                loginis teksto žymėjimas, fizinio teksto žymėjimas ir t.t.;</p>

            <p><!--[if !supportLists]-->4)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!--[endif]-->Visoms lentelėms turi būti realizuotas bent duomenų
                įvedimas, atnaujinimas arba šalinimas (bent viena lentelė turi turėti visa
                apdorojimo funkcijas: įvedimą, šalinimą, atnaujinimą);</p>

            <p><!--[if !supportLists]-->5)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!--[endif]-->Turi būti realizuota galimybė peržiūrėti visų lentelių
                turinį, tai yra duomenų išvedimas;</p>

            <p><!--[if !supportLists]-->6)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!--[endif]-->Turi būti realizuota bent viena sudėtinė paieška
                (duomenys atrenkami pagal 2-3 kriterijus, iš dviejų lentelių);</p>

            <p><!--[if !supportLists]-->7)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!--[endif]-->Turi būti realizuotas bent vienas skaičiavimas pagal DB
                talpinamus duomenis. Pav. Skaičiuoti įsilaužimų skaičių per nurodytą
                laikotarpį;</p>

            <p><!--[if !supportLists]-->8)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!--[endif]-->Turi būti panaudota bent
                vienoje vietoje PHP include funkcija;</p>

            <p><!--[if !supportLists]-->9)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!--[endif]-->Turi būti apdorojamas
                bent vienas failas. Pav.: Į failą įrašomas pranešimas;</p>

            <p><!--[if !supportLists]-->10)&nbsp;
                <!--[endif]-->Sukuriamas bent vienas
                slapukas (cookie), atributai pasirenkami laisvai;</p>

            <p><!--[if !supportLists]-->11)&nbsp;
                <!--[endif]-->Duomenų apdorojimui
                puslapiuose panaudoti PHP sesijas;</p>

            <p><!--[if !supportLists]-->12)&nbsp;
                <!--[endif]-->Naudojami atitinkami
                formos objektai, jeigu to reikalauja duomenų apdorojimo situacija, tai yra
                jeigu reikia pasirinkti duomenis iš tėvinės lentelės, jie turėtų būti
                pateikiami iškrentančiame sąraše ir pan.</p>

            <p><!--[if !supportLists]-->13)&nbsp;
                <!--[endif]-->Suformuojama bent viena
                duomenų atskaita su galimybe ją atspausdinti;</p>

            <p><!--[if !supportLists]-->14)&nbsp;
                <!--[endif]-->Programos kodas turi
                būti organizuojamas efektyviai – naudojant klases;</p>

            <p><!--[if !supportLists]-->15)&nbsp;
                <!--[endif]-->Programos funkcionalumo
                scenarijai turi būti efektyvūs (optimizuoti), tam pasitelkti UI karkasus ir AJAX
                technologiją.</p>

            <p>Turi būti užtikrintos tokios duomenų ir web saugumo savybės:</p>

            <p><!--[if !supportLists]-->1)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!--[endif]-->Sistema turi turėti saugų prisijungimą ir galimybę
                užregistruoti vartotojus;</p>

            <p><!--[if !supportLists]-->2)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!--[endif]-->Duomenys sistemoje turi „vaikščioti“ saugiai.</p>

            <p><!--[if !supportLists]-->3)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!--[endif]-->Turi būti užtikrinta privačių duomenų apsauga –
                atitinkamas duomenų šifravimas juos saugant DB;</p>

            <p><!--[if !supportLists]-->4)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!--[endif]-->Sukurta sistema turi būti apsaugota nuo plačiai žinomų
                web sistemų atakų:</p>

            <p><!--[if !supportLists]--><span lang="EN-US">a.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><!--[endif]--><span lang="EN-US">Cross-site scripting (XSS)</span></p>

            <p><!--[if !supportLists]--><span lang="EN-US">b.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><!--[endif]--><span lang="EN-US">SQL Injection Attacks</span></p>

            <p><!--[if !supportLists]--><span lang="EN-US">c.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><!--[endif]--><span lang="EN-US">Cross site request forgery XSRF/CSRF</span></p>

            <p><!--[if !supportLists]--><span lang="EN-US">d.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><!--[endif]--><span lang="EN-US">Session Hijacking</span></p>

            <p><!--[if !supportLists]--><span lang="EN-US">e.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><!--[endif]--><span lang="EN-US">…</span></p>

            <p>Puslapis turi būti sukurtas <b>CSS (Cascading Style Sheets) pagrindu</b>, naudojant <b>Embedded, Linked </b>arba reikalui esant ir <b>Inline
                    (</b><i>reikės pagrįsti kodėl naudojama</i><b>) </b>stilių tipus.</p><strong>Darbas ginamas pristatant, kas buvo realizuota, atsakant į pateiktus klausimus.</strong><br><p></p></div>

    </div>
    <?php require_once "inc/footer.php"; ?>
</div>

</body>
</html>
