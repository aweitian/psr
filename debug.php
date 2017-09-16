<?PHP
$filename = "acl.md";
$handle = fopen($filename, "r");
$chinese = fread($handle, filesize ($filename));
fclose($handle);
//var_dump(mb_detect_encoding($str,array("ASCII",'UTF-8','GB2312',"GBK",'BIG5')));

//$chinese=utf8_decode($chinese);

$chinese_encodings ='EUC-CN,HZ,GBK,CP936,GB18030,EUC-TW,BIG5,CP950,BIG5-HKSCS,BIG5-HKSCS:2004,BIG5-HKSCS:2001,BIG5-HKSCS:1999,ISO-2022-CN,ISO-2022-CN-EXT';

$encodings = explode(',',$chinese_encodings);

//set chinese locale
setlocale(LC_CTYPE, 'Chinese');

foreach($encodings as $encoding) {
    if (@mb_check_encoding($chinese, $encoding)) {
        echo 'The string seems to be compatible with '.$encoding."\n";
    } else {
        echo 'Not compatible with '.$encoding."\n";
    }
}