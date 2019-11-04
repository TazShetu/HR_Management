<?php
namespace App\Http\Controllers;

class PromotionController extends Controller
{
//    public function userSearchForm()
//    {
//        if (Auth::user()->hasRole('promotion')){
//            return view('promotion.searchUser');
//        } else {
//            abort(403);
//        }
//    }


//    public function userSearch(Request $request)
//    {
//        $request->validate([
//            'email' => 'required'
//        ]);
//        $user = User::where('email', $request->email)->where('branch_id', Auth::user()->branch_id)->first();
//        if ($user) {
//            return redirect()->route('promotion.user.designation.form', $user->id);
//        } else {
//            Session::flash('NoSuchUser', "No User with email id '$request->email' exist.");
//            return redirect()->back();
//        }
//    }


//    public function userDesignationForm($uid)
//    {
//        if (Auth::user()->hasRole('promotion') && ($uid != 1)){
//            $jobs = Job::all();
//            $userJobId = User::find($uid)->job_id;
//            return view('promotion.userDesignation', compact('jobs', 'userJobId', 'uid'));
//        } else {
//            abort(403);
//        }
//    }


//    public function newDesignation(Request $request)
//    {
//        $request->validate([
//            'designation' => 'required'
//        ]);
//        $user = User::find($request->user_id);
//        if ($request->designation == $user->job_id) {
//            Session::flash('error', "Please select new designation.");
//            return redirect()->back();
//        } else {
//            $designation_id = $request->designation;
//            return redirect()->route('promotion.form', [
//                'user_id' => $request->user_id,
//                'designation_id' => $designation_id
//            ]);
//        }
//    }


//    public function promotionForm($uid, $did)
//    {
//        $job = Job::find($did)->title;
//        $user = User::find($uid);
//        $contracts = Contract::all();
//        $job_info = Userjobinfo::where('user_id', $uid)->first();
//        $pay = Pay::where('job_id', $did)->first();
//        return view('promotion.promotionForm', compact('job', 'user', 'contracts', 'job_info', 'pay', 'did'));
//    }


//    public function promotionDataStore(Request $request)
//    {
//        $request->validate([
//            'user_id' => 'required',
//            'newJob' => 'required',
//            'jobDescription' => 'required',
//            'contract' => 'required',
//            'CL' => 'required',
//            'pay' => 'required',
//            'tax' => 'required',
//            'compensation' => 'required',
//            'comment' => 'required'
//        ]);
//        $user = User::find($request->user_id);
//        $user->job_id = $request->newJob;
//        $job = Job::find($request->newJob);
//        $roles = $job->roles()->get();
//        $user->syncRoles($roles);
//        $user->update();
//        $userJobInfo = Userjobinfo::where('user_id', $request->user_id)->first();
//        $userJobInfo->job_id = $request->newJob;
//        $userJobInfo->contract_id = $request->contract;
//        $userJobInfo->job_description = $request->jobDescription;
//        $userJobInfo->update();
//        $userPay = Userpay::where('user_id', $request->user_id)->first();
//        if ($userPay == null){
//            $userPay = new Userpay;
//        }
//        $userPay->pay = $request->pay;
//        $userPay->tax = $request->tax;
//        $userPay->compensation = $request->compensation;
//        if ($request->filled('benefit')) {
//            $userPay->benefit = $request->benefit;
//        }
//        if ($request->filled('benefit_detail')) {
//            $userPay->benefit_detail = $request->benefit_detail;
//        }
//        if ($request->filled('child_family_support')) {
//            $userPay->child_family_support = $request->child_family_support;
//        }
//        if ($request->filled('child_family_support_detail')) {
//            $userPay->child_family_support_detail = $request->child_family_support_detail;
//        }
//        $userPay->update();
//        $promotion = new Promotion();
//        $promotion->user_id = $request->user_id;
//        $promotion->job_id = $request->newJob;
//        $promotion->pay = $request->pay;
//        $promotion->tax = $request->tax;
//        $promotion->compensation = $request->compensation;
//        if ($request->filled('benefit')) {
//            $promotion->benefit = $request->benefit;
//        }
//        if ($request->filled('benefit_detail')) {
//            $promotion->benefit_detail = $request->benefit_detail;
//        }
//        if ($request->filled('child_family_support')) {
//            $promotion->child_family_support = $request->child_family_support;
//        }
//        if ($request->filled('child_family_support_detail')) {
//            $promotion->child_family_support_detail = $request->child_family_support_detail;
//        }
//        $promotion->comment = $request->comment;
//        $promotion->changed_by = Auth::id();
//        $promotion->save();
//
//        Session::flash('success', 'Promotion updated successfully');
//        return redirect()->route('promotion.user.search.form');
//    }
}