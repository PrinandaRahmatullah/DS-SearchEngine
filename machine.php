<?php
    $keyword = $_GET["keyword"];
    $number = $_GET["number"];

    $output = shell_exec('python3 query.py '.$number.' '.$keyword);
    echo $output;
    $json = json_decode($output);

    foreach($json as $obj){
        $doc = $obj->doc;
        $fp = file('data/crawling/'.$doc);

        $fill = shell_exec("sed '1d' data/crawling/".$doc);
        $title = $fp[0];
        $url = $obj->url;
    }
?>