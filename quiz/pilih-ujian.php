<?php
include("../path.php");
include(ROOT_PATH . "/blog/app/controllers/users.php");
usersOnly();

$ujian = selectAll('kategori_quiz', ['publish' => 1]);


?>
<!DOCTYPE html>
<html>

<?php include("../blog/app/includes/header.php")?>

    <div class="container">
        <div class="d-flex justify-content-center my-4">
            <a href="hasil_terakhir.php" class="btn btn-info">Lihat Hasil Terakhir</a>
        </div>
        <?php
            foreach ($ujian as $ujianse) {
                ?>
                <div class="card text-center my-5">
                    <div class="card-header">Quiz</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $ujianse['kategori']?></h5>
                        <input type="button" class="btn btn-success" value="<?php echo $ujianse['kategori']?>" onclick="set_exam_type_session(this.value)" style="width: 150px;">       
                    </div>
                </div>
                <script type="text/javascript">
                    var a=['ExLfV','163414lTMbkh','693088tBRNGU','ZRNkn','tes_quiz.php','8rGEsfB','forajax/set_exam_type_session.php?kategori_quiz=','YHENN','5ZpPJgw','606727lhGYFD','MDJns','toLocaleLowerCase','BHbHl','GET','wCSDn','131007DZjIAZ','690880lSKJvJ','1nCUgBB','PeeUc','mlaMh','5|4|3|2|0|1','5yjKjuB','NlHfN','mmpui','143799WztARt','31AuFvLc','3025vPRRyc','DuADG','split','DoFRL','ECMSb','Masukkan\x20password\x20untuk\x20memulai\x20quiz:'];(function(c,d){var r=b;while(!![]){try{var e=-parseInt(r(0x1a4))*parseInt(r(0x1a3))+parseInt(r(0x193))*parseInt(r(0x19b))+-parseInt(r(0x1ac))+parseInt(r(0x199))*parseInt(r(0x19f))+-parseInt(r(0x1a2))*-parseInt(r(0x192))+parseInt(r(0x19a))+-parseInt(r(0x1ab))*parseInt(r(0x18f));if(e===d)break;else c['push'](c['shift']());}catch(f){c['push'](c['shift']());}}}(a,0x73d5*-0x22+0xcb3ab+0x1*0xb7e55));function b(c,d){return b=function(e,f){e=e-(-0x2*0x8c9+-0xa31+0x1d50);var g=a[e];return g;},b(c,d);}function set_exam_type_session(c){var s=b,d={'DuADG':s(0x19e),'BHbHl':s(0x197),'MDJns':function(j,k){return j+k;},'wCSDn':s(0x190),'YHENN':function(j,k){return j(k);},'DoFRL':s(0x1a9),'ECMSb':function(j,k){return j==k;},'PeeUc':'<?php echo $ujianse['token'];?>','AHgXT':s(0x18e),'ZRNkn':'Password\x20Salah!'},e=d[s(0x1a5)][s(0x1a6)]('|'),f=0x1260*-0x1+0x4c*0x81+0x66*-0x32;while(!![]){switch(e[f++]){case'0':g['open'](d[s(0x196)],d[s(0x194)](d[s(0x198)],c),!![]);continue;case'1':g['send'](null);continue;case'2':g['onreadystatechange']=function(){var t=s;i[t(0x19d)](h[t(0x195)](),i[t(0x1a1)])?i['mlaMh'](g['readyState'],-0x1172+0x2471*0x1+-0x12fb)&&i[t(0x1aa)](g['status'],0x3f5*-0x5+-0x5de*0x5+0x31e7)&&(window['location']=i[t(0x1a0)]):i['IMWJj'](alert,i['fVnac']);};continue;case'3':var g=new XMLHttpRequest();continue;case'4':var h=d['YHENN'](prompt,d[s(0x1a7)]);continue;case'5':var i={'mlaMh':function(j,k){return d['ECMSb'](j,k);},'mmpui':d[s(0x19c)],'ExLfV':function(j,k){var u=s;return d[u(0x1a8)](j,k);},'NlHfN':d['AHgXT'],'IMWJj':function(j,k){var v=s;return d[v(0x191)](j,k);},'fVnac':d[s(0x18d)]};continue;}break;}}
                </script>
                <?php
            }
        
        ?>

    </div>
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>


<script type="text/javascript">
    eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(3(){(3 a(){8{(3 b(2){7((\'\'+(2/2)).6!==1||2%5===0){(3(){}).9(\'4\')()}c{4}b(++2)})(0)}d(e){g(a,f)}})()})();',17,17,'||i|function|debugger|20|length|if|try|constructor|||else|catch||5000|setTimeout'.split('|'),0,{}))
</script>
<br>
<br>
<br>
<br>
<br>
<?php include("../blog/app/includes/footer.php")?>


