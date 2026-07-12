@extends('layouts.master')
@section('styles')
@endsection
@section('content')
    <div class="card">
        @if (Session::get('success'))
            <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="card-header">
           
        </div>
        <div class="card-body">
            <div class="row">

<!-- Count -->

<div class="row mb-4">

    <div class="col-md-2">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h3>{{ $totalUsers }}</h3>
                <h6>Total Users</h6>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h3>{{ $totalCases }}</h3>
                <h6>Total Cases</h6>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h3>{{ $totalEvidence }}</h3>
                <h6>Total Evidence</h6>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h3>{{ $totalFiles }}</h3>
                <h6>Total Files</h6>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h3>{{ $totalCustody }}</h3>
                <h6>Custody Records</h6>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h3>{{ $totalLogs }}</h3>
                <h6>Audit Logs</h6>
            </div>
        </div>
    </div>

</div>

<!-- Row 1 -->

<div class="row">

    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body text-center">
                <h5>User Distribution</h5>

                <div style="width:250px;height:250px;margin:auto;">
                    <canvas id="usersChart"></canvas>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body text-center">
                <h5>Case Status</h5>

                <div style="width:250px;height:250px;margin:auto;">
                    <canvas id="casesChart"></canvas>
                </div>

            </div>
        </div>
    </div>

</div>

<!-- Row 2 -->

<div class="row">

    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body text-center">
                <h5>Evidence Status</h5>

                <div style="width:250px;height:250px;margin:auto;">
                    <canvas id="evidenceChart"></canvas>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body text-center">
                <h5>Evidence Types</h5>

                <div style="width:400px;height:300px;margin:auto;">
                    <canvas id="typeChart"></canvas>
                </div>

            </div>
        </div>
    </div>

</div>

<!-- Row 3 -->

<div class="row">

    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body text-center">

                <h5>Chain of Custody Actions</h5>

                <div style="width:300px;height:300px;margin:auto;">
                    <canvas id="custodyChart"></canvas>
                </div>

            </div>
        </div>
    </div>

</div>

<br>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
window.onload = function () {

    // Users Pie Chart
    new Chart(
        document.getElementById('usersChart'),
        {
            type: 'pie',
            data: {
                labels: [
                    'Admins',
                    'Investigators',
                    'Officers',
                    'Auditors'
                ],
                datasets: [{
                    data: [
                        {{ $admins }},
                        {{ $investigators }},
                        {{ $officers }},
                        {{ $auditors }}
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        }
    );

    // Cases Doughnut Chart
    new Chart(
        document.getElementById('casesChart'),
        {
            type: 'doughnut',
            data: {
                labels: [
                    'Open',
                    'Investigating',
                    'Resolved',
                    'Closed'
                ],
                datasets: [{
                    data: [
                        {{ $openCases }},
                        {{ $investigatingCases }},
                        {{ $resolvedCases }},
                        {{ $closedCases }}
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        }
    );

    //Evidences
    new Chart(
    document.getElementById('evidenceChart'),
    {
        type: 'pie',

        data: {

            labels: [
                'Collected',
                'Under Analysis',
                'Archived'
            ],

            datasets: [{
                data: [
                    {{ $collectedEvidence }},
                    {{ $analysisEvidence }},
                    {{ $archivedEvidence }}
                ]
            }]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    }
);

//EvidenceType
new Chart(
    document.getElementById('typeChart'),
    {
        type: 'bar',

        data: {

            labels: {!! json_encode($typeLabels) !!},

            datasets: [{

                label: 'Number of Evidences',

                data: {!! json_encode($typeCounts) !!}

            }]
        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            scales: {

                y: {

                    beginAtZero: true

                }

            }

        }
    }
    
);

//chain of custodies

new Chart(
    document.getElementById('custodyChart'),
    {
        type: 'bar',

        data: {

            labels: [
                'Collected',
                'Transferred',
                'Accessed',
                'Analyzed',
                'Archived'
            ],

            datasets: [{
                label: 'Total Actions',

                data: [
                    {{ $collected }},
                    {{ $transferred }},
                    {{ $accessed }},
                    {{ $analyzed }},
                    {{ $archived }}
                ]
            }]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    }
);

};
</script>


        </div>
    </div>
@endsection
@section('scripts')
@endsection
