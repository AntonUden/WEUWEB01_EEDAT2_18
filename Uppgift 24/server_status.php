<?php
    $servers = [
        ["name" => "ARK Valguero", "host" => "zeeraa.xyz", "port" => 27015],
        ["name" => "ARK Ragnarok", "host" => "zeeraa.xyz", "port" => 27016],
        ["name" => "ARK Ark Scorched Earth", "host" => "zeeraa.xyz", "port" => 27017]
    ];

    require "./SourceQuery/bootstrap.php";
    use xPaw\SourceQuery\SourceQuery;
    foreach ($servers as $key => $value) {
        $Query = new SourceQuery();

        try {
            $Query->Connect( $servers[$key]["host"], $servers[$key]["port"], 1, SourceQuery::SOURCE);
            
            $servers[$key]["info"] = $Query->GetInfo();
            $servers[$key]["players"] = $Query->GetPlayers();
            $servers[$key]["online"] = true;
        } catch(Exception $e) {
            echo $e->getMessage();
            $servers[$key]["online"] = false;
        } finally {
            $Query->Disconnect();
        }
    }

    header('Content-Type: application/json');
    echo json_encode($servers);
?>