<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brief;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BriefsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $query = Brief::query()->with("level", "position", "decision");

        $query->when(request()->filled('filter'), function ($query) {
            $filters = explode(',', request('filter'));

            foreach ($filters as $filter) {
                [$criteria, $value] = explode(':', $filter);
                $values = explode('|', $value);
                $query->whereIn($criteria, $values);
                if (in_array("", $values))
                    $query->orWhereNull($criteria);
            }
            return $query;
        });

        $query->when(request()->filled('sort'), function (Builder $query) {
            $sorts = explode(',', request('sort'));

            foreach ($sorts as $sortColumn) {
                $sortDirection = str_starts_with($sortColumn, "-") ? "desc" : "asc";
                $sortColumn = ltrim($sortColumn, "-");

                $query->orderBy($sortColumn, $sortDirection);
            }

            return $query;
        });

        return $query->with("level", "position", "decision")->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $brief = new Brief($request->all());
        $brief->save();
        return $brief;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Brief::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     */
    public function update(Request $request, $id)
    {
        $brief = Brief::findOrFail($id);
        $brief->update($request->all());

        return $brief;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy($id)
    {
        $brief = Brief::findOrFail($id)->delete();
        return $brief;
    }

    public function dates(){
        $briefs = Brief::pluck('interview_date');
        return $briefs;
    }
}
