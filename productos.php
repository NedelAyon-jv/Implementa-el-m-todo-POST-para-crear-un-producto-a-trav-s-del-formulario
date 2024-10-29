<?php
class Productos
{
    public function getProducts()
    {

        $curl = curl_init();
        $token =  "<script>
        localStorage.getItem('token');
    </script>";
   
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer 116|pTN5crFqyUdeRFjBMQJvbAX0l5ANVdshRfEFXfvA'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    public function addProduct(){
        echo "<script>console.log('algo' );</script>";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['productName'];
            $slug = $_POST['productSlug'];
            $description = $_POST['productDescription'];
            $features = $_POST['productFeactures'];
            
            
            $curl = curl_init();
            
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array('name' => $name, 'slug' => $slug, 'description' => $description, 'features' => $features),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer 116|pTN5crFqyUdeRFjBMQJvbAX0l5ANVdshRfEFXfvA',
                    'Cookie: XSRF-TOKEN=eyJpdiI6IjdHMkxJTitSN202NUhMYlBPTnRmWmc9PSIsInZhbHVlIjoiUEN5RnQ1TWQzL1lRbCtzaGhQcGxwSXZGM2ROQVBKREtWYTlUWER0Z01SQyt2ZTNEMk1rQVhUd1kzZW96ZUE4YXYxUHlReGdRanJROEo3TnNFZkZhQ1pTME80U2lCWHZ6c0h0MnBzUnRZQ3lxRXlYTWxJS2hsWEFjbmY4cVRtUGoiLCJtYWMiOiI0ZTZmMWIzYmFjODQwMTRmNTQxZTM3ZGEyMDc5MDM0ODBlNmYyMjg3ZTViYzNiY2M4NTUwNjQ1ZWRhMTk5YzZhIiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6Impta0xxMzVjbXphQlp1ZDJ0VFk3ckE9PSIsInZhbHVlIjoiUUljTGRPc3dKaER6Qm5zVEN3QSs1T0IyWkZPKzJucE5HMklOdi9VdG9EN25DKzNOY0F2OGcwOUNIaXJXSURQVHZycVVkdXkyb1dGbDgwZzQvNHZQVzZpUnl1N1dMTDhQWVluVVJ6VElDVDdZanhSUjVMRXNUVnl3ckNlMWhjdk0iLCJtYWMiOiIwNzJkZDU4NGMxYzk2YWEzNzMyOTliNTRkNGZmMGVjOGE2MWE1NjUyMzdjMTczZWI3MjJhNGU2ZTM3NDhhZDQ1IiwidGFnIjoiIn0%3D'
                ),
            ));
            
            $response = curl_exec($curl);
            
            curl_close($curl);
            echo $response;
            echo "<script>console.log('Debug Objects: " . $response . "' );</script>";
        }
        
    }

}
