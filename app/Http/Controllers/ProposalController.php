<?php

namespace App\Http\Controllers;

use App\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    /**
     * Хранит данные содели Comments
     * @var array
     */
    public $modelProposal;

    public function __construct()
    {
        $this->modelProposal = new Proposal();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function proposalAll()
    {
        $proposal = $this->modelProposal->getAllProposal();
        return view('proposal.all', ['proposal' => $proposal]);
    }

    public function proposalOne($id)
    {
        $proposal = $this->modelProposal->getOneProposal($id);
        if (empty($proposal->id)) return redirect(route('proposal.all'));
        return view('proposal.one', ["proposal" => $proposal]);
    }

    /**
     * Страница создания новости.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function pageCreate()
    {
        return view('proposal.create');
    }

    /**
     * Принимает post запрос. Валедирует его, создает новость из модели и сохраняет в файл
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function createProposal(Request $request)
    {
        $this->validate($request, [
            'userName' => 'required|min:5|max:50',
            'userPhone' => 'required|min:5|max:50',
            'userEmail' => 'required|email',
            'userProposal' => 'required|min:10|max:255',
        ]);
        $newIdProposal = $this->modelProposal->createProposal($request);
        $this->modelProposal->saveProposalInDb();
        return $this->proposalOne($newIdProposal);
    }
}
