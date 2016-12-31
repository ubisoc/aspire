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

        // Search through all the rows in the table using the search parameters
        // and the queries provided.
        foreach($searchParameters as $parameter) {
          if($request->get($parameter) != '') {
            $query = $request->get($parameter);
            $roles = $roles->where($parameter, 'LIKE', "%$query%");
          }
        }

        // Search table using start date parameter.
        if($request->get('start_date') != '') {
          $query = $request->get('start_date');
          $roles = $roles->where('start_date', '<', $query);
        }

        // Search table using end date parameter.
        if($request->get('end_date') != '') {
          $query = $request->get('end_date');
          $roles = $roles->where('end_date', '>', $query);
        }

        // Search table using salary parameter.
        if($request->get('salary') != '') {
          $query = $request->get('salary');
          $roles = $roles->where('salary', '>=', $query-20000);
          if($query <= 100000) {
            $roles = $roles->where('salary', '<', $query);
          }
        }

        // Order the results according to the parameters provided.
        if($request->get('order') != '' && $request->get('orderParameter') != '') {
          $roles->orderBy($request->get('orderParameter'), $request->get('order'));
        }

        // Paginate the results.
        $roles = $roles->paginate(5);

        return view('roles/index', ["roles" => $roles]);
    }

    /**
     * Show a role this student can apply to.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $roleId)
    {
        $user = \Auth::user();
        $role = Role::where('id', '=', $roleId)->firstOrFail();
        $company = $role->company()->firstOrFail();

        return view('roles/show', ["role" => $role, "user" => $user, "company" => $company]);
    }
}
