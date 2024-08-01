<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candreg;
use App\Models\FeeRecord;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class CandController extends Controller
{
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'studentID' => 'required|string|unique:candregs,studentID',
            'name' => 'required|string|max:255',
            'pname' => 'nullable|string|max:255',
            'gender' => 'required|string',
            'birthDate' => 'nullable|date',
            'course' => 'required|string|max:255',
            'phoneNumber' => 'nullable|string',
            'address' => 'nullable|string',
            'a-card' => 'nullable|Integer',
            'admissionDate' => 'required|date',
            'referBy' => 'nullable|exists:candregs,studentID',
            'status' => 'required|in:regular,discounted',
            // 'certNumber' => 'nullable|Integer',
        ]);

        // if ($validatedData->fails()) {
        //         return redirect()->back()->withErrors($validatedData)->withInput();
        //     }
        
        $validatedData['session'] = 2; 

        $candidateData = Candreg::create($validatedData);
        return view('success', compact('candidateData'));

    }
    
    public function updateCand(Request $request)
    {
        $id = $request->input('id');
        $validatedData = $request->validate([
            'studentID' => 'required|string',
            'name' => 'required|string|max:255',
            'pname' => 'nullable|string|max:255',
            'gender' => 'required|string',
            'birthDate' => 'nullable|date',
            'course' => 'required|string|max:255',
            'phoneNumber' => 'nullable|string',
            'address' => 'nullable|string',
            'a-card' => 'nullable|Integer',
            'admissionDate' => 'required|date',
            'referBy' => 'nullable|exists:candregs,studentID',
            'status' => 'required|in:regular,discounted',
            // 'referBy' => 'nullable|sometimes|exists:candreg,studentID',
            // 'certNumber' => 'nullable|Integer',
        ]);
        
        $candidate = Candreg::where('id',$id)->first();
        $candidate->studentID = $request->input('studentID');
        $candidate->name = $request->input('name');
        $candidate->pname = $request->input('pname');
        $candidate->gender = $request->input('gender');
        $candidate->birthDate = $request->input('birthDate');
        $candidate->course = $request->input('course');
        $candidate->phoneNumber = $request->input('phoneNumber');
        $candidate->address = $request->input('address');
        $candidate->admissionDate = $request->input('admissionDate');
        $candidate->referBy = $request->input('referBy');
        $candidate->status = $request->input('status');
        $candidate->save();
        
        return redirect()->route('candSession')->with('message', 'Candidate has been updated successfully!');

    }
    
    public function updateStatus(Request $request){
        $request->validate(['status' => 'required|in:regular,discounted']);
        $status = Candreg::where('id', $request->input('candreg_id'))->first();
        $status->status = $request->input('status');
        $status->save();
        
        return redirect()->back()->with('message', 'Candidate has been updated successfully!');
    }
    
    public function createCertificate(Request $request){
        $studentID = $request->input('studentID');
        return view('d-panel.certificate', ['studentID' => $studentID]);
    }

    public function issue(Request $request){
        $studentID = $request->input('studentID');
        $cand = Candreg::where('studentID', $studentID)->first();

        if (isset($cand)) {
            $validatedData = $request->validate([
                'certNumber' => 'required|Integer|unique:candregs,certNumber',
                'certPDF' => 'required|mimes:pdf|max:5120',
            ]);
            $certNumber = $request->input('certNumber');
            $certPDF = $certNumber . "." . $request->file('certPDF')->getClientOriginalExtension();
            $request->file('certPDF')->storeAs('public/uploads',$certPDF);
            $cand->certNumber = $certNumber;
            $cand->save();
            return view('success')->with('certNumber',$certNumber);

        } else {
            $message = 'Unexpected Error occurred';
            return view('error')->with('error', $message);
        }

    }

    public function verifyCert(Request $request){
        $user = Candreg::where('certNumber', $request->input('certNumber'))->first();
        if(isset($user->certNumber)){
            $url = Storage::url('uploads/' . $user->certNumber . '.pdf');
            // echo $url;
            // $url = "/storage/uploads/" . $user->certNumber . ".pdf";
            return redirect::to($url);

        }else{
            $message="certificate does not exist!";
            return view('verification')->with('error', $message);
        }
    }
    
    public function viewCandidate(){
        $candsQuery = Candreg::latest();
        $cands = $candsQuery->paginate(20);
        $totalCount = Candreg::count();
        return view('d-panel.viewCand', [
            'cands' => $cands,
            'totalCount' => $totalCount,
        ]);
    }
    
    public function candSession() {
        $sessionBatch = 2;
        $candsQuery = Candreg::where('session', $sessionBatch)->latest();
        $cands = $candsQuery->paginate(50);
        $totalCount = $candsQuery->count();
        return view('d-panel.candSession', [
            'cands' => $cands,
            'totalCount' => $totalCount,
            ]);
    }
    
    public function archive(Request $request){
        $id = $request->id;
        $user = Candreg::where('id', $id)->first();
        $user->mode = 'archive';
        $user->save();
        
        return redirect()->back()->with('message', 'user has been successfully archived.');
    }
    
   public function monthlyCands(Request $request){
    $month = $request->input('month');
    $sessionBatch = 2;

    // $candsQuery = Candreg::with('fee_records')
    //         ->where('session', $sessionBatch)
    //         ->whereHas('fee_records', function($query) use ($month){
    //             $query->whereMonth('feeDate', $month);
            // });
    
    $candsQuery = FeeRecord::with('candreg')
                ->whereMonth('feeDate', $month)
                ->whereHas('candreg', function($query) use ($sessionBatch){
                    $query->where('session', $sessionBatch);
                });
            
    $cands = $candsQuery->paginate(100);
    $totalCount = $candsQuery->count();

    return view('d-panel.monthlyCands', [
        'cands' => $cands, 
        'totalCount' => $totalCount, 
        'month' => $month,
    ]);
}

    public function feeSplit(Request $request){
        $feeRecord_id = $request->input('feeRecord_id');
        $splitStatus = $request->input('splitStatus');
        $feeRecord = FeeRecord::where('id', $feeRecord_id)->first();
        $feeRecord->splitStatus = $splitStatus;
        $feeRecord->save();
        return redirect()->back()->with('message', 'Fee Splited Successfully!');
    }

    
    public function editCandidate(Request $request){
        $id = $request->input('id');
        $candidate = Candreg::find($id);
        return view('d-panel.updateCand', compact('candidate'));
    }
    
    public function destroy(Request $request){
        $candreg = Candreg::find($request->id);
    
        if ($candreg) {
            // Delete the associated PDF file
            Storage::delete("uploads/{$candreg->certNumber}.pdf");
    
            // Delete the record from the Candreg table
            $candreg->delete();
        }
    
        return redirect()->route('candSession');
    }
    
    public function feePayment(Request $request){
        $validatedFeeRecord = $request->validate([
            'feeDate' => 'required|date',
            'candreg_id' => 'required|exists:candregs,studentID',
            'feeAmount' => 'required|numeric',
            'feeType' => 'required|in:regular,discounted',
            'splitStatus' => 'required|in:harsh,pankaj,splited',
            'comment' => 'nullable',
            ]);
        
        $studentID = $request->input('candreg_id');
        $candreg_id = Candreg::where('studentID', $studentID)->first()->id;
        
        $validatedFeeRecord['candreg_id'] = $candreg_id;
        
            $feeRecord = FeeRecord::create($validatedFeeRecord);
            return view('success', compact('feeRecord'));
    }
    
    public function verifyFee(Request $request){
        $validatedFeeDetail = $request->validate([
            'studentID' => 'required|exists:candregs,studentID',
            ]);
            
            $studentID = $request->input('studentID');
            $candreg = Candreg::where('studentID',$studentID)->first();
            $referals = Candreg::where('referBy', $studentID)->get();
            $feeDetails = FeeRecord::where('candreg_id', $candreg->id)->get();
            return view('viewFeeForm', [
                'feeDetails' => $feeDetails,
                'candidate' => $candreg,
                'referals' => $referals,
                ]);
    }
    
    public function createFeeRecord(Request $request){
        $candreg_id = $request->input('candreg_id');
        $feeRecord = FeeRecord::where('candreg_id', $candreg_id)->get();
        $candreg = Candreg::where('id', $candreg_id)->first();
        return view('d-panel.createFeeRecord', [
            'feeRecord' => $feeRecord,
            'candidate' => $candreg,
            ]);
    }
    
    public function defaulters(){
        //
    }
}






















