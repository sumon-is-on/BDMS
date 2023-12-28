<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use App\Models\Donation;
use App\Models\BloodRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class DonationController extends Controller
{
    public function create(Request $request){
        return view('Web.Donation.create');
    }

    public function store(Request $request){
        // dd($request->all());
        $bloodRequestId = $request->br_id;
        $bloodRequest = BloodRequest::find($bloodRequestId);

        $donor = User::find($request->donor_id);

        $request->validate([
            'last_do_date' => 'required'
        ]);
        if( ! ($donor->blood_group === $bloodRequest->asking_bg)){
            notify()->warning("Your Blood group does not match!");
            return redirect()->back();
        }

        try {
            $lastDoDate = Carbon::parse($request->last_do_date);
            $today = Carbon::now();

            if ($lastDoDate->diffInDays($today) < 120) {
                notify()->warning("You are not eligible to donate. Your last donation date must be at least 120 days ago.");
                return redirect()->back();
            }
            if ($bloodRequest) {
                Donation::create([
                    'br_id' => $bloodRequestId,
                    'donor_id' => $request->donor_id,
                    'last_do_date' => $request->last_do_date
                ]);

                $bloodRequest->update([
                    'donor_id' => $request->donor_id,
                    'status' => "accepted"
                ]);
            }
            notify()->success('Thanks for donating. You hav done a great job. Patient will contact you soon.');
            return to_route('web.home');
        } catch (\Throwable $th) {
            notify()->error($th->getMessage());
            return redirect()->back();
        }
    }
}
