<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requests\ActionRequest;

use Storage;

class ActionController extends Controller
{
    private $xmlFiles = 'http://ftp.geoinfo.msl.mt.gov/Documents/Metadata/GIS_Inventory/35524afc-669b-4614-9f44-43506ae21a1d.xml';

    public function index() {
        return view('home');
    }

    public function list(Request $request) {
        $data['rows'] = $this->getAllData($request);
        return view('list', $data);
    }

    public function getAllData($request) {
        $json = Storage::disk('local')->get('prices.json');
        $json = json_decode($json, true);
        $rowsData = !empty($json['data']) ? collect($json['data'])->map(function($row) {
            return (object) $row;
        }) : collect([]);

        if (!empty($request->amount) && is_numeric($request->amount)) {
            $rowsData = $rowsData->where('price', '>' , $request->amount);
        }
        return $rowsData;
    }

    public function store(Request $request) {

    }

    public function viewJsonData() {
        $arrayData = $this->loadXmlFileToJson();
        return response()->json($arrayData);
    }

    public function loadXmlFileToJson() {
        try {
            $xmlObject = simplexml_load_file($this->xmlFiles);
            $jsonData = json_encode($xmlObject, JSON_PRETTY_PRINT);
            $decodedData = json_decode($jsonData,TRUE);
            return $decodedData;
        } catch (Exception $e) {
            return [];
        }
    }
}
