@if ($vacancy->applications()->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>CV</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($vacancy->applications()->latest()->get() as $application)
                <tr>
                    <td>{{ $application->first_name }}</td>
                    <td>{{ $application->last_name }}</td>
                    <td><a href="mailto:{{ $application->email }}">{{ $application->email }}</a></td>
                    <td>{{ $application->phone }}</td>
                    <td>{{ $application->created_at->format('M jS, Y H:ia') }}</td>
                    <td>
                        <a href="{{ route('admin.applications.download_cv', ['application' => $application->id ]) }}" class="btn btn-success">
                            <i class="fal fa-arrow-to-bottom"></i> &nbsp;Download CV
                        </a>
                    </td>                            
                </tr>
            @endforeach
            </tbody>
        </table>

    @else
        <div class="alert alert-info">No applications found</div>
    @endif