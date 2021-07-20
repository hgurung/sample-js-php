<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Storage;
use Validator;

class ActionController extends Controller
{
    private $xmlFiles = 'http://ftp.geoinfo.msl.mt.gov/Documents/Metadata/GIS_Inventory/35524afc-669b-4614-9f44-43506ae21a1d.xml';

    public function index() {
        return view('home');
    }

    public function list(Request $request) {
        $data['rows'] = $this->getAllData($request);
        $data['total'] = $this->getSumOfAllData($data['rows']);
        return view('list', $data);
    }

    public function create(Request $request) {
        return view('create');
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

    public function getSumOfAllData($data) {
        $total = 0;
        if (!empty($data)) {
            $total = $data->sum('price');
        }
        return $total;
    }

    public function store(Request $request) {
        $rules = $this->getValidationRules();
        $validator = Validator::make($request->all(), $rules);
        // Validate the input and return correct response
        if ($validator->fails())
        {
            return response()->json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()

            ), 422);
        }
        return response()->json(array('data' => $request->only(['id', 'value'])), 200);
    }

    public function getValidationRules() {
        $rules = [
            'id' => 'required|integer|min:1',
            'value' => 'required|string|max:255'
        ];
        return $rules;
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
