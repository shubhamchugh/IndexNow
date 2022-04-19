<div class="table-responsive">
    <table class="table  table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Domain_id</th>
                <th>Domain</th>
                <th>google_json</th>
                <th>bing_api</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($domains as $domain)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <span class="font-weight-bold">{{ $domain->id }}</span>
                </td>
                <td>
                    <span class="font-weight-bold">{{ $domain->domain }}</span>
                </td>
                <td>{{ $domain->google_json }}</td>

                <td>
                    {{ $domain->bing_api }}
                </td>
                <td>
                    <div class="dropdown">
                        <a href="{{ route('domain.edit', $domain->id) }}" type="button"
                            class="btn btn-icon btn-outline-secondary">
                            <i data-feather="edit" class="font-medium-3"></i>
                        </a>
                        <form action="{{ route('domain.destroy', $domain->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger mr-1 mt-1">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>