<div class="container">
  <h1>Manage Mahasiswa</h1>
  <a href="{{ route('mahasiswa.create') }}" class="btn btn-success mb-3">Create New Mahasiswa</a>

  @if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif

  <table class="table table-bordered">
      <thead>
          <tr>
              <th>No.</th>
              <th>NIM</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Fakultas</th>
              <th>Departemen</th>
              <th>IPK</th>
              <th>Semester</th>
              <th>SKS Terpenuhi</th>
              <th>Nama Doswal</th>
          </tr>
      </thead>
      <tbody>
          @foreach($mahasiswa as $no=>$row)
              <tr>
                  <td>{{ $no+1 }}</td>
                  <td>{{ $row->nim }}</td>
                  <td>{{ $row->nama }}</td>
                  <td>{{ $row->email }}</td>
                  <td>{{ $row->prodi->departemen->fakultas->nama_fakultas }}</td>
                  <td>{{ $row->prodi->departemen->nama }}</td>
                  <td>{{ $row->ipk }}</td>
                  <td>{{ $row->semester }}</td>
                  <td>{{ $row->sks }}</td>
                  <td>{{ $row->dosen->nama }}</td>
                  <td>
                      <a href="{{ route('mahasiswa.edit', $row) }}" class="btn btn-warning">Edit</a>

                      <form action="{{ route('mahasiswa.destroy', $row) }}" method="POST" style="display:inline;">
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