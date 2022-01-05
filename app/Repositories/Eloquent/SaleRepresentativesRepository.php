<?php

namespace App\Repositories\Eloquent;

use App\Models\SaleRepresentative;
use App\Repositories\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class SaleRepresentativesRepository implements BaseRepositoryInterface
{
    protected $saleRepresentative;


    public function __construct(SaleRepresentative $saleRepresentative)
    {
        $this->saleRepresentative = $saleRepresentative;

    }


    /**
     *  Get all sale representatives for logged in manager
     *  @return LengthAwarePaginator
     */
    public function all($related = null): LengthAwarePaginator
    {
        //return all sale representatives for logged in manager
        return SaleRepresentative::whereBelongsTo($related, 'managed_by')->paginate();
    }

    public function get($id, array $related = null): Model
    {
        if (null == $user = $this->saleRepresentative->find($id)) {
            throw new ModelNotFoundException("User not found");
        }

        return $user;
    }

    /**
     *  Create a Sale Representative
     *  @param array attributes
     *  @return Model
     */
    public function create(array $attributes):Model
    {
        $saleRepresentative = SaleRepresentative::create([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'telephone' => $attributes['telephone'],
            'current_route' => $attributes['current_route'],
            'comment' => $attributes['comment'],
            'joined_date' => $attributes['joined_date'],
            'manager_id' => Auth::user()->id
        ]);

        return $saleRepresentative->refresh();
    }



    public function update(array $attributes, int $id): Model
    {

        $saleRepresentative = SaleRepresentative::where('id', $id)
        ->update([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'telephone' => $attributes['telephone'],
            'current_route' => $attributes['current_route'],
            'comment' => $attributes['comment'],
            'joined_date' => $attributes['joined_date'],
            'manager_id' => Auth::user()->id
        ]);

        return SaleRepresentative::find($id)->refresh();
    }

    public function delete($id)
    {
        #TODO
    }

}
