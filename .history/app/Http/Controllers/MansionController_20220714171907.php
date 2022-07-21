<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Mansion;
use App\Models\MansionImage;
use App\Http\Requests\MansionSearchRequest;
use App\Http\Requests\MansionSignUpRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MansionController extends Controller
{
    // For User
    public function top() {
        return view('user.mansion.top');
    }
    public function search(MansionSearchRequest $request) {
        $pref = $request->pref;
        $lowest_price = $request->lowest_price;
        $highest_price = $request->highest_price;
        $lowest_occupation_area = $request->lowest_occupation_area;
        $highest_occupation_area = $request->highest_occupation_area;
        $plan = $request->plan;
        $old = $request->old;
        $walk = $request->walk;

        $query = Mansion::query();

        if(!empty($pref)) {
            $query = $query->Where(function ($query) use($pref) {
                for ($i = 0; $i < count($pref); $i++){
                    $query->orwhere('pref', '=',  $pref[$i]);
                }
            });
        }
        if(!empty($lowest_price)) {
            $query = $query->where('price', '>', $lowest_price);
        }
        if(!empty($highest_price)) {
            $query = $query->where('price', '<', $highest_price);
        }
        if(!empty($lowest_occupation_area)) {
            $query = $query->where('occupation_area', '>=', $lowest_occupation_area);
        }
        if(!empty($highest_occupation_area)) {
            $query = $query->where('occupation_area', '<', $highest_occupation_area);
        }
        if(!empty($plan)) {
            $query = $query->Where(function ($query) use($plan) {
                for ($i = 0; $i < count($plan); $i++){
                        $query->orwhere('number_of_rooms', '=', $plan[$i]);
                }
            });
        }
        if(!empty($old)) {
            $date = Carbon::today()->subYear($old);
            $query = $query->whereDate('year', '>', $date);
        }
        if(!empty($walk)) {
            $query = $query->where('walking_distance_station', '<', $walk);
        }

        $mansions = $query->paginate(15);
        return view('user.mansion.result', compact('mansions', 'request'));
    }
    public function detail($id) {
        $mansion = Mansion::find($id);
        $date = new Carbon();
        $next_updated_at = $date->addDays(14);
        return view('user.mansion.detail', compact('mansion', 'next_updated_at'));
    }


    // For Admin
    public function showForm() {
        return view('admin.mansion.sign_up');
    }
    public function signUp(MansionSignUpRequest $request) {
        $post = new Mansion;
        $post->signUp($request);
        return redirect()->route('admin.mansion.signUp')->with('message', '登録が完了しました。');
    }
    public function list() {
        return view('admin.mansion.list');
    }

    public function adminSearch(Request $request) {
        $pref = $request->pref;
        $municipalities = $request->municipalities;
        $apartment_name = $request->apartment_name;
        $number_of_rooms = $request->number_of_rooms;
        $lowest_price = $request->lowest_price;
        $highest_price = $request->highest_price;

        $query = Mansion::query();

        if(!empty($pref)) {
            $query = $query->Where('pref', '=', $pref);
        }
        if(!empty($municipalities)) {
            $query = $query->Where('municipalities', '=', $municipalities);
        }
        if(!empty($apartment_name)) {
            $query = $query->Where('apartment_name', 'like', '%'$apartment_name);
        }
        if(!empty($lowest_price)) {
            $query = $query->where('price', '>', $lowest_price);
        }
        if(!empty($highest_price)) {
            $query = $query->where('price', '<', $highest_price);
        }
        if(!empty($number_of_rooms)) {
            $query = $query->Where(function ($query) use($number_of_rooms) {
                for ($i = 0; $i < count($number_of_rooms); $i++){
                        $query->orwhere('number_of_rooms', '=', $number_of_rooms[$i]);
                }
            });
        }

        $mansions = $query->paginate(15);

        return view('admin.mansion.result', compact('mansions', 'request'));
    }

    public function delete($id) {
        DB::transaction(function() use($id) {
            $target = Mansion::find($id);
            $target->delete();
        });
    }
    public function showDetail($id) {
        $mansion = Mansion::find($id);
        return view('admin.mansion.detail', compact('mansion'));
    }
    public function edit($id) {
        $mansion = Mansion::find($id);
        return view('admin.mansion.edit', compact('mansion'));
    }
    public function update($id, Request $request) {
        $mansion = Mansion::find($id);
        $mansion->updateMansion($id, $request);
        $request->session()->regenerateToken();
        return redirect()->route('admin.mansion.edit', ['id' => $mansion->id])->with('message', '変更内容を登録しました。');
    }
    public function csvDownload() {
        $mansions = Mansion::get();
        return $mansions->exportCsv();
    }
}
