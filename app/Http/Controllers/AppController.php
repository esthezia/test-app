<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Session;
use App\Models\User;

class AppController extends Controller
{
    private $defaultStringColumnLength = 0;

    public function __construct() {
        $this->defaultStringColumnLength = \Illuminate\Database\Schema\Builder::$defaultStringLength;

        // the parent has no constructor
        // parent::__construct();
    }

    public function index() {
        return view('app.index');
    }

    public function issues() {
        $issues = [];

        return view('app.issues', [
            'issues' => $issues
        ]);
    }

    public function adminReports() {
        return view('app.admin-reports');
    }

    public function users() {
        $users = (array) User::orderBy('created_at', 'desc')->get()->all();

        return view('app.users', [
            'users' => $users
        ]);
    }
}
