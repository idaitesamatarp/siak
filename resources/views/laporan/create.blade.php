@extends('template.master')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Laporan Keuangan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data laporan keuangan toko</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
            </div>
            <form action="/laporan" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="modal">Total Pengeluaran</label>
                        <input type="text" class="form-control col-sm-4" id="modal" placeholder="Masukkan modal usaha" name="modal" value="{{ $pembelian }}">
                    </div>
                    <label for="hasil">Total Pemasukan</label>
                    <div class="form-inline">
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" id="hasil" placeholder="Masukkan hasil usaha" name="hasil" value="{{ $penjualan }}">
                            <button class="btn btn-info ml-2" id="btnHitung">Hitung</button>
                        </div>
                    </div>
                    <label for="labarugi">Total Laba / Rugi</label>
                    <div class="form-inline">
                        <div class="form-group">
                            <input type="text" class="form-control" id="labarugi" placeholder="Masukkan laba atau rugi" name="labarugi" value="0" readonly>
                            <input type="text" class="form-control ml-2" name="ket" id="ket" placeholder="Keterangan" readonly>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Simpan
                    </button>
                    <a href="/dashboard" class="btn btn-dark">
                        <i class="fas fa-arrow-alt-circle-left"></i>
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection

@push('scripts')
    <script type="text/javascript">
        var form = document.getElementById("btnHitung")
        var labarugi = document.getElementById("labarugi")

        form.addEventListener("click", function(e) {
            e.preventDefault()

            var modal = parseInt(document.getElementById("modal").value)
            var hasil = parseInt(document.getElementById("hasil").value)
            
            if (hasil > modal){
                labarugi.value = hasil - modal
                var ketlaba = "Mendapat Laba"
                console.log(labarugi)
                $("#ket").val(ketlaba)
            } else if (hasil < modal) {
                labarugi.value = modal - hasil
                var ketrugi = "Mendapat Rugi"
                console.log(labarugi)
                $('#ket').val(ketrugi)
            }
        })
    </script>
@endpush