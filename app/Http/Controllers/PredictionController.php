<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\Prediction;
use Illuminate\Validation\Validator as ValidationValidator;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class PredictionController extends Controller
{
    use Prediction;
    public function getPrediction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:image,jpeg,png,jpg|max:10240',
            'name' => 'required|string',
            'gender' => 'required|string',
            'age' => 'required|integer',
            'skin_lession_position' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->messages()], 401);
        }

        try {
            $file = $request->file('file')->storeAs('public/images/diagnosis', time() . "_" . $request->file('file')->getClientOriginalName());
            $image = $request->file('file');
            $result = Prediction::getPrediction($image, $image->getClientOriginalName());
            $diagnosis = new Diagnosis();
            $diagnosis->name = $request->name;
            $diagnosis->gender = $request->gender;
            $diagnosis->age = $request->age;
            $diagnosis->skin_lession_position = $request->skin_lession_position;
            $diagnosis->image_path = $file;
            $diagnosis->machine_diagnosis_result = $result['data']['pros'];
            $diagnosis->createdBy = auth()->id();   
            $diagnosis->save();
            return response()->json(['result' => $result], 200);
        } catch (Exception $error) {
            return response()->json(['error' => $error->getMessage()], 500);
        }

    }

    public function getAllDiagnosis()
    {
        try {
            $diagnosis = Diagnosis::with('user')->where('createdBy', auth()->id());
            return DataTables::of($diagnosis)
                ->make(true);
        } catch (Exception $error) {
            return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function updateDoctorDiagnosis(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:diagnosis,id',
                'diagnosis' => 'required|string|in:melanoma,bukan melanoma,belum'
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->first()], 401);
            }

            if (!auth()->user()->isA('doctor')) {
                return response()->json(['error' => 'Anda dilarang melakukan diagnosis karena bukan dokter'], 401);
            }

            $diagnosis = Diagnosis::find($request->id);
            $diagnosis->doctor_diagnosis_result = $request->diagnosis == 'belum' ? null : $request->diagnosis;
            $diagnosis->save();
            return response()->json(['message' => 'Diagnosis updated successfully'], 200);
        } catch (Exception $error) {
            return response()->json(['error' => $error->getMessage()], 500);
        }
    }
}
