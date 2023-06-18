@foreach($members as $member)
    <tr>
        <td>{{ $member->name }}</td>
        <td>{{ $member->email }}</td>
        <td>{{ $member->alamat }}</td>
        <td>{{ $member->no_hp }}</td>
        <td>{{ $member->gambar }}</td>
        <td>{{ $member->rekening }}</td>
        <td>
            @if($member->ikut_arisan)
                Sudah ikut arisan
            @else
                Belum ikut arisan
                <!-- Tampilkan tombol atau tautan untuk mengikuti arisan -->
            @endif
        </td>
    </tr>
@endforeach
