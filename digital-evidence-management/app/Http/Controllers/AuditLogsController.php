<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuditLogsController extends Controller
{
    public function index(){
        $auditlogs = \App\Models\AuditLogs::all();
        return view("auditlogs.index",compact("auditlogs"));
    }
}
