<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EvidenceFiles;
use App\Models\AuditLogs;
use App\Models\Evidences;

class EvidenceFilesController extends Controller
{
    public function index()
    {
        $evidencefiles = EvidenceFiles::all();

        return view(
            'evidencefiles.index',
            compact('evidencefiles')
        );
    }

    public function create()
    {
        $evidences = Evidences::all();

        return view(
            'evidencefiles.create',
            compact('evidences')
        );
    }

    public function store(Request $request)
    {
        $post = $request->all();

        if ($request->hasFile('original_name')) {

            $file = $request->file('original_name');

            $filename =
                time().'_'.$file->getClientOriginalName();

            $path = $file->storeAs(
                'evidence_files',
                $filename,
                'public'
            );

            $post['original_name']
                = $file->getClientOriginalName();

            $post['file_path']
                = $path;

            $post['file_type']
                = $file->getClientMimeType();

            $post['file_size']
                = $file->getSize();

            $post['sha256_hash']
                = hash_file(
                    'sha256',
                    $file->getRealPath()
                );
        }

        EvidenceFiles::create($post);

        AuditLogs::create([
    'users_id' => auth()->id(),
    'action' => 'UPLOAD',
    'module' => 'Evidence File',
    'description' =>
        'Uploaded file '.$post['file_name'],
    'ip_address' => request()->ip()
]);

        return response()->json(
            'Evidence File Created Successfully',
            200
        );
    }

    public function delete(Request $request, $id)
    {
        EvidenceFiles::where(
            'id',
            $id
        )->delete();

        $request->session()->flash(
            'success',
            'Evidence File Deleted Successfully'
        );

        return redirect()->route(
            'evidencefiles-index'
        );
    }
}