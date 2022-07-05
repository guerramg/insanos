<?php

class conversorDatas{

    public function dataBrasil($data)
    {
        $newData = explode('-', $data);
        
            return $newData[2].'/'.$newData[1].'/'.$newData[0];
    }

    public function dataAmerica($data)
    {
        $newData = explode('/', $data);
        
            return $newData[0].'-'.$newData[1].'-'.$newData[2];
    }
}

?>