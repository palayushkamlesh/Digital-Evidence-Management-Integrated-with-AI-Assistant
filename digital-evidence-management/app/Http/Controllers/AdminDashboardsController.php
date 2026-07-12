<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cases;
use App\Models\Evidences;
use App\Models\EvidenceTypes;
use App\Models\ChainOfCustodies;
use App\Models\AuditLogs;
use App\Models\EvidenceFiles;

class AdminDashboardsController extends Controller
{
    public function index()
    {
        // Users Statistics
        $totalUsers = User::count();

        $admins = User::where(
            'role',
            'admin'
        )->count();

        $investigators = User::where(
            'role',
            'investigator'
        )->count();

        $officers = User::where(
            'role',
            'officer'
        )->count();

        $auditors = User::where(
            'role',
            'auditor'
        )->count();

        // Cases Statistics
        $openCases = Cases::where(
            'status',
            'Open'
        )->count();

        $investigatingCases = Cases::where(
            'status',
            'Investigating'
        )->count();

        $resolvedCases = Cases::where(
            'status',
            'Resolved'
        )->count();

        $closedCases = Cases::where(
            'status',
            'Closed'
        )->count();

        //Evidences

        $collectedEvidence = Evidences::where(
             'status',
             'Collected'
        )->count();

        $analysisEvidence = Evidences::where(
             'status',
             'Under Analysis'
           )->count();

           $archivedEvidence = Evidences::where(
              'status',
              'Archived'
           )->count();

           //Evidence Types
           $evidenceTypes = EvidenceTypes::all();

           $typeLabels = [];
           $typeCounts = [];

          foreach ($evidenceTypes as $type) {

            $typeLabels[] = $type->name;

            $typeCounts[] = Evidences::where(
              'evidencetypes_id',
               $type->id
            )->count();

            //chain of custodies
            $collected = ChainOfCustodies::where('action','Collected')->count();
            $transferred = ChainOfCustodies::where('action','Transferred')->count();
            $accessed = ChainOfCustodies::where('action','Accessed')->count();
            $analyzed = ChainOfCustodies::where('action','Analyzed')->count();            
            $archived = ChainOfCustodies::where('action','Archived')->count();

            //Count
            $totalUsers = User::count();
            $totalCases = Cases::count();
            $totalEvidence = Evidences::count();
            $totalFiles = EvidenceFiles::count();
            $totalCustody = ChainOfCustodies::count();
            $totalLogs = AuditLogs::count();

}           

        return view(
            'admindashboards.index',
            compact(
                'totalUsers',
                'admins',
                'investigators',
                'officers',
                'auditors',

                'openCases',
                'investigatingCases',
                'resolvedCases',
                'closedCases',

                'collectedEvidence',
                'analysisEvidence',
                'archivedEvidence',

                'typeLabels',
                'typeCounts',

                'collected',
                'transferred',
                'accessed',
                'analyzed',
                'archived',

                'totalUsers',
                 'totalCases',
                 'totalEvidence',
                 'totalFiles',
                'totalCustody',
                 'totalLogs',
                
            )
        );
    }
}