        <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm no-print">
            <div class="container">
                <a class="navbar-brand fs-4 text-white" href="{{ url('/') }}">
                    <strong>{{ config('app.name', 'Gghmedcloud')}}</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link fs-5 text-white" aria-current="page" href="/">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 text-white" href="/medicine">Medicine</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 text-white" href="/viewmedicine">View Medicine</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 text-white" href="/patient">Patient</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 text-white" href="/viewpatient">View Patient</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 text-white" href="/discharge">Discharge</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 text-white" href="/userrole">User Role</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-default rounded-pill fs-5 text-white" href="/logout">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
