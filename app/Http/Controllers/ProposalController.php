<?php

namespace App\Http\Controllers;

use App\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function all()
    {
        return view('proposal.all', ['proposal' => Proposal::all()]);
    }

    public function one(Proposal $proposal)
    {
        return view('proposal.one', ['proposal' => $proposal]);
    }

    public function add(Request $request)
    {
        $proposal = new Proposal();
        if ($request->isMethod('post')) {
            $this->validate($request, Proposal::rules());
            $proposal->fill($request->all());
            $proposal->save();
            return redirect()
                ->route('proposal.one', ['proposal' => $proposal])
                ->with('success', 'Proposal successfully created');
        }
        return view('proposal.add', [
            'proposal' => $proposal,
        ]);

    }

    public function update(Request $request, Proposal $proposal)
    {
        if ($request->isMethod('post')) {
            $proposal->fill($request->all());
            $proposal->save();
            return redirect()
                ->route('proposal.one', ['proposal' => $proposal])
                ->with('success', 'Proposal successfully updated');
        }
        return view('proposal.add', [
            'proposal' => $proposal,
        ]);
    }

    public function delete(Proposal $proposal)
    {
        $proposal->delete();
        return redirect()
            ->route('proposal.all', ['proposal' => $proposal])
            ->with('success', 'Proposal successfully deleted');
    }
}
