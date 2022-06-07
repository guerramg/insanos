<?php

class conversorDatas{

    public function dataBrasil($data)
    {
        $arrayData = explode($data, '-');
        
            print $arrayData['2'].'/'.$arrayData[1].'/'.$arrayData[0];
    }

    public function dataAmerica($data)
    {
        $arrayData = explode($data, '/');
        
            print $arrayData['0'].'-'.$arrayData[1].'-'.$arrayData[2];
    }
}
?>