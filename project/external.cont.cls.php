<?php
class ExternalContrlCls extends ExternalModalCls
{
    public function getApiData(array $payload, $type)
    {
        $url = "http://127.0.0.1:5000/dicease?symp1=" . $payload['symp1'] . "&symp2=" . $payload['symp2'] . "&symp3=" . $payload['symp3'] . "&symp4=" . $payload['symp4'] . "&symp5=" . $payload['symp5'] . "&type=" . $type;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        echo json_encode(["status" => 1, "data" => $response]);
        exit();
        
    }
}
