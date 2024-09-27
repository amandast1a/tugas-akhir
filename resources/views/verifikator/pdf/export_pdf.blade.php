<style>
    .centered-header {
        text-align: center;
        margin-bottom: 20px;
        /* Add some space below the header */
    }

    .table-container {
        margin: 0 auto;
        /* Center the table in the container */
        width: 80%;
        /* Adjust the width of the table container as needed */
    }

    .no-data-message {
        text-align: center;
        /* Center the message */
        font-size: 18px;
        /* Adjust font size for visibility */
        margin-top: 50px;
        /* Add some space above the message */
    }
</style>

@if ($form_data->isEmpty())
    <div class="no-data-message">
        <p>Data tidak ada.</p>
    </div>
@else
    <div class="centered-header">
        <h1>Laporan Kenaikan <br> Pangkat Bulan {{ $form_data->first()->periode ?? '' }} <br> Tahun
            {{ $form_data->first()->created_at->format('Y') ?? '' }}</h1>
    </div>
    <br>
    <div class="table-container">
        <table border="1" cellspacing="0" cellpadding="5" style="width: 100%;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Golongan</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($form_data as $index => $form)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $form->nip }}</td>
                        <td>{{ $form->nama }}</td>
                        <td>{{ $form->golongan }}</td>
                        <td>{{ $form->jabatan }}</td>
                        <td>{{ $form->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
