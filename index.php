<?php

require_once 'ICS.php';


if (isset($_GET['start']) && isset($_GET["end"])) {
    $fileName = isset($_GET['name']) ? $_GET['name'] : "invite";

    header('Content-Type: text/calendar; charset=utf-8');
    header("Content-Disposition: attachment; filename=$fileName.ics");


    $ics = new ICS(array(
        'summary' => isset($_GET['summary'])?$_GET['summary']:"Ein Termin",
        'dtstart' => $_GET['start'],
        'dtend' => $_GET['end'],
        'location' => isset($_GET['location'])?$_GET['location']: null,
        'description' => isset($_GET['description'])?$_GET['description']:null
    ));

    echo $ics->to_string();
}else{
    header('Content-Type: application/json; charset=utf-8');
    echo '{"error":"you need to specify start and end get parameters"}';
}


