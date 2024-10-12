<div class="container">
  <h1>Manage Dosen</h1>
  <a href="{{ route('dosen.create') }}" class="btn btn-success mb-3">Create New Dosen</a>

  @if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif

  <table class="table table-bordered">
      <thead>
          <tr>
              <th>No.</th>
              <th>NIP</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Jumlah Mahasiswa Perwalian</th>
          </tr>
      </thead>
      <tbody>
          @foreach($dosen as $no=>$row)
              <tr>
                  <td>{{ $no+1 }}</td>
                  <td>{{ $row->nip }}</td>
                  <td>{{ $row->nama }}</td>
                  <td>{{ $row->email }}</td>
                  <td>{{ $row->mahasiswa()->count()}}</td>
                  <td>
                      <a href="{{ route('dosen.edit', $row) }}" class="btn btn-warning">Edit</a>

                      <form action="{{ route('dosen.destroy', $row) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                      </form>
                  </td>
              </tr>
          @endforeach
      </tbody>
  </table>
</div>