<div class="col-12 text-uppercase">
    <hr>
    <h5 class="mb-0 text-center">Statistik Asal Pemudik (Data Berdasarkan Desa di Kecamatan {{$nama_kecamatan->nama_kecamatan}} Kabupaten {{$nama_kecamatan->kabupaten->nama_kabupaten}} Provinsi {{$nama_kecamatan->kabupaten->provinsi->nama_provinsi}})</h5>
    <button class="btn btn-primary rounded text-white" onclick="window.history.go(-1); return false;"><i class="material-icons">chevron_left</i> Kembali</button>
</div>
<div class="col-12 mt-2">
    <table id="statdes" class="table nowrap table-bordered table-striped dt-responsive" style="width: 100%">
        <thead>
            <tr class="table-warning">
                <th>Nama Desa</th>
                <th>Nama Kecamatan</th>
                <th>Nama Kabupaten</th>
                <th>Nama Provinsi</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
