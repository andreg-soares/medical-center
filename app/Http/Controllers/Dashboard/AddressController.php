<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Http\Request;

class AddressController extends Controller
{

    /**
     * @param $postcode
     * @return array|false|mixed
     */
    public function postCode(Request $request)
    {
        $address = $this->getAddress($request->input('postcode'));
        if (isset($address['success']) && !$address['success']) {
            return false;
        }
        return $address;
    }

    /**
     * @param $postcode
     * @return array|mixed
     */
    private function getAddress($postcode)
    {
        $client = new Client();
        $error = false;
        $msg = false;
        try {
            $response = $client->{'get'}('https://viacep.com.br/ws/'.$postcode.'/json/', array( 'headers' =>  [
                'Accept'       => 'application/json',
                'Content-Type' => 'application/json',
            ]));
        } catch (ClientException $e) {
            $error = true;
            $msg = $e->getMessage();
        } catch (ServerException $e) {
            $error = true;
            $msg = $e->getMessage();
        } catch (RequestException $e) {
            $error = true;
            $msg = $e->getMessage();
        }
        if ($error) {
            return [
                'success' => false,
                'body'    => $msg,
            ];
        }
        $content = json_decode($response->getBody(), true);
        if ($response->getStatusCode() != 200) {
            return [
                'success' => false,
                'code'    => $response->getStatusCode(),
                'body'    => $content,
            ];
        }
        return $content;
    }

}
