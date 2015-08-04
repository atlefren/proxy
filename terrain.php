<?php 
    header("Access-Control-Allow-Origin: *");
    
    if (isset($_GET['tile'])) {
        $tile = $_GET['tile'];

        if ($tile == '/layer.json') {
            header('Content-Type: application/json');
            echo file_get_contents('terrain/terrtiles/layer.json');
        } else {
            header('Content-Type: application/vnd.quantized-mesh;extensions=octvertexnormals');
            header('Content-Encoding: gzip');
            $zxy = explode('/', substr($tile, 0, strrpos($tile, '.terrain')));

            $filename = 'terrain/terrtiles/' . $zxy[1] . '/' . $zxy[2] . '/' . $zxy[3] . '.terrain';

            $cont = file_get_contents($filename);

            echo $cont;
        }
    }

?>
