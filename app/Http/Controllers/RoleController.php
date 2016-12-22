<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyData;
use App\Role;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the list of Jobs this student can apply to.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Role $roles)
    {
        // The parameters which the search bar will have to search the Roles Table.
        $searchParameters = ['title', 'description', 'skills', 'qualifications', 'company_name'];

        // The parameters which require a comparison on the Roles Table to retrieve results.
        $comparisonSearchParameters = ['start_date', 'end_date', 'salary'];

        // Search through all the rows in the table using the search parameters
        // and the queries provided.
        foreach($searchParameters as $parameter) {
          if($request->get($parameter) != '') {
            $query = $request->get($parameter);
            $roles = $roles->where($parameter, 'LIKE', "%$query%");
          }
        }

        // TODO: Search table using comparison search parameters.

        // Order the results according to the parameters provided.
        if($request->get('order') != '' && $request->get('orderParameter') != '') {
          $roles->orderBy($request->get('orderParameter'), $request->get('order'));
        }

        // Paginate the results.
        $roles = $roles->paginate(5);

        return view('roles/index', ["roles" => $roles]);
    }
}
