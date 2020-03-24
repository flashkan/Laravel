<?php

namespace App\Http\Controllers;

use App\Resources;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function all()
    {
        return view('resources.all', ['resources' => Resources::all()]);
    }

    public function add(Request $request)
    {
        $resources = new Resources();
        if ($request->isMethod('post')) {
            $this->validate($request, Resources::rules());
            $resources->fill($request->all());
            $resources->save();
            return redirect()
                ->route('resources.all', ['resources' => $resources])
                ->with('success', 'Resources successfully created');
        }
        return view('resources.add', ['resources' => $resources]);
    }

    public function update(Request $request, Resources $resources)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, Resources::rules());
            $resources->fill($request->all());
            $resources->save();
            return redirect()
                ->route('resources.all', ['resources' => $resources])
                ->with('success', 'Resources successfully update');
        }
        return view('resources.add', [
            'resources' => $resources,
        ]);
    }

    public function delete(Resources $resources)
    {
        $resources->delete();
        return redirect()
            ->route('resources.all', ['resources' => $resources])
            ->with('success', 'Resources successfully deleted');
    }
}
