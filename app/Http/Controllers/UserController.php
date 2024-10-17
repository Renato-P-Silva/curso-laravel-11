<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {

	public function __construct() {}

	public function index() {
		$users = User::all();
		return view('admin.users.index', compact('users'));
	}

	public function create() {
		return view('admin.users.create');
	}
}
