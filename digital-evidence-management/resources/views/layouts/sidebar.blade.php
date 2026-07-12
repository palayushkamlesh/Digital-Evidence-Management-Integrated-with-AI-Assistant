<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
         
          <!--Admin Dashboards Dropdown -->
          @if(auth()->user()->role == 'admin')
         <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#gst-menu" data-bs-toggle="collapse" href="#">
                <i class="bi bi-grid"></i>
                <span>Admin Dashboards</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="gst-menu" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admindashboards-index') }}">
                        <i class="bi bi-circle"></i><span>Admin Dashboards</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif

         <!--Audit Logs Dropdown -->
         @if(in_array(auth()->user()->role, ['admin','auditor']))
         <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#gst-menu" data-bs-toggle="collapse" href="#">
                <i class="bi bi-grid"></i>
                <span>Audit Logs</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="gst-menu" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('auditlogs-index') }}">
                        <i class="bi bi-circle"></i><span>Audit Logs</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif
        <!-- Master Dropdown -->
        <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#master-menu" data-bs-toggle="collapse" href="#">
        <i class="bi bi-grid"></i>
        <span>Master</span>
        <i class="bi bi-chevron-down ms-auto"></i>
    </a>

    <ul id="master-menu" class="nav-content collapse" data-bs-parent="#sidebar-nav">

        {{-- Admin Only --}}
        @if(auth()->user()->role == 'admin')
            <li>
                <a href="{{ route('users-index') }}">
                    <i class="bi bi-circle"></i>
                    <span>Users</span>
                </a>
            </li>
        @endif

        {{-- Admin + Investigator --}}
        @if(in_array(auth()->user()->role, ['admin','investigator']))
            <li>
                <a href="{{ route('cases-index') }}">
                    <i class="bi bi-circle"></i>
                    <span>Cases</span>
                </a>
            </li>
        @endif

        {{-- Admin Only --}}
        @if(auth()->user()->role == 'admin')
            <li>
                <a href="{{ route('evidencetypes-index') }}">
                    <i class="bi bi-circle"></i>
                    <span>Evidence Types</span>
                </a>
            </li>
        @endif

        {{-- Admin + Officer --}}
        @if(in_array(auth()->user()->role, ['admin','officer']))
            <li>
                <a href="{{ route('evidences-index') }}">
                    <i class="bi bi-circle"></i>
                    <span>Evidences</span>
                </a>
            </li>

            <li>
                <a href="{{ route('evidencefiles-index') }}">
                    <i class="bi bi-circle"></i>
                    <span>Evidence Files</span>
                </a>
            </li>

            <li>
                <a href="{{ route('chainofcustodies-index') }}">
                    <i class="bi bi-circle"></i>
                    <span>Chain Of Custodies</span>
                </a>
            </li>
        @endif

    </ul>
</li>

 {{-- Admin  --}}
@if(auth()->user()->role == 'admin')

<li class="nav-item">

    <a class="nav-link collapsed"
       data-bs-target="#assistant-menu"
       data-bs-toggle="collapse"
       href="#">

        <i class="bi bi-robot"></i>

        <span>AI Assistant</span>

        <i class="bi bi-chevron-down ms-auto"></i>

    </a>

    <ul id="assistant-menu"
        class="nav-content collapse"
        data-bs-parent="#sidebar-nav">

        <li>

            <a href="{{ route('aichat-chat') }}">

                <i class="bi bi-circle"></i>

                <span>Investigator Chat</span>

            </a>

        </li>

    </ul>

</li>

@endif
    </ul>
</aside>
