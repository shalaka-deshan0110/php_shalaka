<?php

namespace App\Http\Controllers;

use App\Models\SaleRepresentative;
use App\Repositories\Eloquent\SaleRepresentativesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class SaleRepresentativeController extends Controller
{
    protected $saleRepresentativeRepo;
    protected $user;

    public function __construct(SaleRepresentativesRepository $saleRepresentativesRepository)
    {
        $this->saleRepresentativeRepo = $saleRepresentativesRepository;
        $this->user = Auth::guard('web')->user();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->user = Auth::guard('web')->user();
        $saleRepresentatives = $this->saleRepresentativeRepo->all($this->user);

        return view('sale-representatives.index', compact('saleRepresentatives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sale-representatives.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'joined_date' => 'required|date',
            'current_route' => 'required',
            'comment' => 'required'
        ]);

        $saleRepresentative = $this->saleRepresentativeRepo->create($request->all());

        return redirect('/sale-representatives')->with('success', 'Sales Representative created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SaleRepresentative  $saleRepresentative
     * @return \Illuminate\Http\Response
     */
    public function show(SaleRepresentative $saleRepresentative)
    {
        return json_encode($saleRepresentative);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SaleRepresentative  $saleRepresentative
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleRepresentative $saleRepresentative)
    {
        return view('sale-representatives.edit', compact('saleRepresentative'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SaleRepresentative  $saleRepresentative
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaleRepresentative $saleRepresentative)
    {
        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($saleRepresentative->id),
            ],
            'telephone' => 'required',
            'joined_date' => 'required|date',
            'current_route' => 'required',
            'comment' => 'required'
        ]);

        $id = $saleRepresentative->id;

        $saleRepresentative = $this->saleRepresentativeRepo->update($request->all(), $id);

        return redirect('/sale-representatives')->with('success', 'Sales Representative created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SaleRepresentative  $saleRepresentative
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleRepresentative $saleRepresentative)
    {
        $saleRepresentative->delete();
        return redirect('/sale-representatives')
            ->with('success', 'Sales Representative has been deleted successfully');
    }
}
