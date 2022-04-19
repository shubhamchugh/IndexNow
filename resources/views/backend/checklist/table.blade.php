<div class="table-responsive">
    <table class="table  table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Domain Url</th>
                <th>_is_bing_indexed</th>
                <th>_is_google_indexed</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($checklists as $checklist)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <span class="font-weight-bold">{{ $checklist->DomainName->domain }}/{{ $checklist->slug }}</span>
                </td>
                <td>
                    {{ $checklist->_is_bing_indexed }}
                </td>
                <td>
                    {{ $checklist->_is_google_indexed }}
                </td>
                <td>
                    <div class="dropdown">
                        <a href="{{ route('checklist.edit', $checklist->id) }}" type="button"
                            class="btn btn-icon btn-outline-secondary">
                            <i data-feather="edit" class="font-medium-3"></i>
                        </a>
                    </div>
                    <form action="{{ route('checklist.destroy', $checklist->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-outline-danger mr-1 mt-1">Delete</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>