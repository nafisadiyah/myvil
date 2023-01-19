<?php

namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\Problem;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class ProposalController extends Controller
{
    public function Index($id)
    {
        $problem = Problem::where('id', $id)->first();
        $proposals = Proposal::all()->where('problem_id', $problem->id)->sortByDesc("created_at");

        if ($proposals->contains('status_id', 6)) {
            $proposal = $proposals->where('status_id', 6);
        } else {
            $proposal = $proposals;
        }

        return view('user-desa.proposal-masuk', compact('problem', 'proposal'));
    }


    public function update(Request $request, $id)
    {
        $proposal = Proposal::find($id);
        $problem = Problem::find($proposal->problem_id);

        $proposal->status_id = $request->status_id;
        $proposal->save();

        $proposals_ditolak = Proposal::all()->where('problem_id', $proposal->problem_id)->where('status_id', 1);
        foreach ($proposals_ditolak as $tolak) {
            $tolak->status_id = 3;
            $tolak->save();
        }

        // $problem->status_id = $request->problem_status_id;
        if ($problem->proposal->contains('status_id', 6)) {
            $problem->status_id = 4;
        }

        $problem->save();
        Alert::success('Success', 'Proposal Disetujui!');
        return back();
    }

}
