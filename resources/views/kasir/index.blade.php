@extends('layouts.master')
@section('content')
    <div class="row mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex justify-content-end">
                        <div class="col-md-4">
                            <form id="form-product">
                                <input id="input-product-id" class="form-control form-control-sm" type="text"
                                    placeholder="Product ID" required>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table table-sm table-stripted table-bordered" id="table-cart">
                            <thead>
                                <tr>
                                    <th width="40%">PRODUK</th>
                                    <th width="20%">HARGA</th>
                                    <th width="10%">QTY</th>
                                    <th width="20%">JUMLAH</th>
                                    <th width="10%">#</th>
                                </tr>
                            </thead>
                            <tbody class="table-body">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @php
                            $date = date('d-m-Y');
                            $datetime = strtotime(date('d-m-Y H:i:s'));
                        @endphp
                        <div class="col-md-12">
                            <dl>
                                <dt> Kasir </dt>
                                <dd> {{Auth::user()->name}} </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl>
                                <dt> Nota </dt>
                                <dd> {{ $datetime }}</dd>
                                <input type="hidden" name="invoice" id="invoice" value="{{ $datetime }}">
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl>
                                <dt> Tanggal </dt>
                                <dd> {{ $date }}</dd>
                                <input type="hidden" name="date" id="date" value="{{ $date }}">
                            </dl>
                        </div>
                    </div>

                    <div class="card bg-primary">
                        <div class="card-body text-right text-white">
                            <h4>Total</h4>
                            <h1 class="total">0</h1>
                            <input type="hidden" name="total" id="total">
                        </div>
                    </div>

                    <div class="mt-3 mb-3">
                        <label for="bayar" class="form-label"><b>Bayar</b></label>
                        <input type="text" class="form-control form-control-lg" type="text" id="input-bayar" onkeyup="inputBayar()">
                        <input type="hidden" name="bayar" id="bayar">
                    </div>

                    <div class="card bg-success mb-3">
                        <div class="card-body text-right text-white">
                            <h5>Kembali</h5>
                            <h2 id="kembali-text">0</h2>
                            <input type="hidden" name="kembali" id="kembali">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <a href="/kasir" class="btn btn-warning btn-block"> <i class="fas fa-sync"></i> Bersihkan</a>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-success btn-block " onclick="saveOrder()"> <i class="fas fa-save"></i>
                                SIMPAN</button>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            // Menangani submit form untuk produk
            $("#form-product").submit(function(event) {
                event.preventDefault(); // Mencegah aksi default form submit
                var productId = $("#input-product-id").val(); // Mengambil nilai dari input
                $.ajax({
                    url: "/getProduk/" +
                        productId, // Endpoint untuk mendapatkan data produk berdasarkan Product ID
                    method: "GET",
                    success: function(response) {
                        // Callback sukses
                        // console.log("respon dari ajax : ",response); // Menampilkan respon di konsol

                        if (response.status) {
                            setData(response.data); // Mengirim data ke fungsi setData
                            $("#input-product-id").val(''); // Mengosongkan input setelah sukses
                        } else {
                            alert(response
                                .message
                            ); // Menampilkan pesan kesalahan jika produk tidak ditemukan
                        }
                    },
                    error: function(error) {
                        // Callback kesalahan
                        alert('Terjadi kesalahan saat mengirim data');
                        console.error("Error:", error);
                    }
                });
            });
        });

        // Fungsi untuk memasukkan data produk ke tabel
        function setData(data) {
            // console.log("ini dari setData", data);

            var array_id = $("input[name='id[]']").map(function() {
                return $(this).val();
            }).get(); // Mengambil semua nilai ID produk yang sudah ada di tabel
            var array_qty = $("input[name='qty[]']").map(function() {
                return $(this).val();
            }).get(); // Mengambil semua nilai qty produk yang sudah ada di tabel
            var index_inarray = $.inArray(data.id, array_id); // Mengecek apakah produk sudah ada di tabel
            console.log(array_id, array_qty, index_inarray);
            if (index_inarray != -1) {
                // Jika produk sudah ada di tabel
                var qty_produk = array_qty[index_inarray]; // Mengambil qty produk yang ada
                $('[name="qty[]"]').eq(index_inarray).val(parseInt(qty_produk) + 1); // Menambah qty produk
                $('#input-product-id').val(''); // Mengosongkan input Product ID
                $('.qty').keyup(); // Memicu event keyup untuk menghitung total

            } else {
                // Jika produk belum ada di tabel
                var text = '<tr>' +
                    '<td>' + data.nama_barang + '</td>' + // Menampilkan nama barang
                    '<td>' + data.harga_jual + '</td>' + // Menampilkan harga jual
                    '<td>' +
                    '<input type="number" name="qty[]" class="form-control form-control-sm qty" placeholder="QTY" value="1">' +
                    // Input qty
                    '<input type="hidden" class="stok" name="stok[]" value="' + data.stok + '">' + // Input stok
                    '<input type="hidden" name="id[]" value="' + data.id + '">' + // Input ID produk
                    '<input type="hidden" class="harga_jual" name="harga_jual[]" value="' + data.harga_jual + '">' +
                    // Input harga jual
                    '<input type="hidden" class="jumlah" name="jumlah[]" value="' + data.harga_jual + '">' + // Input jumlah
                    '</td>' +
                    '<td class="jumlah-text">' + data.harga_jual + '</td>' + // Menampilkan jumlah di tabel
                    '<td>' +
                    '<button class="btn btn-sm btn-danger delete"> <i class="fas fa-times"></i> </button>' +
                    // Tombol hapus produk
                    '</td>' +
                    '</tr>';
                $('#table-cart > tbody:last-child').append(text); // Menambahkan baris produk baru ke tabel
            }
            totalJumlah();
        }
        // Fungsi untuk menghitung total harga
        function totalJumlah() {
            var t = 0;
            $('.jumlah').each(function(i, e) {
                var amt = $(this).val() - 0;
                t += amt;
            });
            $('.total').html(t);
            $('#total').val(t);
        }

        function inputBayar() {
            var v = $('#input-bayar').val(); //1,0000p
            var num = v.replace(/,/gi, ""); //10000
            if (/^\d*$/.test(num)) { //10000
                var num2 = num.replace(/\d(?=(?:\d{3})+$)/g, '$&,'); //10,000
                $('#input-bayar').val(num2) // 10,000
                $('#bayar').val(num) //10000

            } else {
                alert('Inputan harus nomor');
                $('#input-bayar').val('')
                $('#bayar').val('')
            }

            var total = $('#total').val();
            var bayar = $('#bayar').val();
            var kembali = bayar - total;
            $('#kembali-text').text(kembali);
            $('#kembali').val(kembali);
        }


        function saveOrder() {
            var total = $('#total').val();
            var bayar = $('#bayar').val();
            var kembali =  $('#kembali').val();
            var invoice = $('#invoice').val();
            var qty = $('input[name^=qty]').map(function(idx, elem) {
                return $(elem).val();
            }).get();
            var id = $('input[name^=id]').map(function(idx, elem) {
                return $(elem).val();
            }).get();
            var harga_jual = $('input[name^=harga_jual]').map(function(idx, elem) {
                return $(elem).val();
            }).get();

            var jumlah = $('input[name^=jumlah]').map(function(idx, elem) {
                return $(elem).val();
            }).get();

            if (id.length > 0) {
                if (kembali >= 0 && (bayar !=0 || bayar!='') ) {
                    $.ajax({
                        type: "POST",
                        url: "/simpanOrder",
                        data: {
                            total: total,
                            bayar: bayar,
                            kembali: kembali,
                            invoice: invoice,
                            qty: qty,
                            id: id,
                            harga_jual: harga_jual,
                            jumlah: jumlah,
                            _token: '<?php echo csrf_token(); ?>'
                        },
                        success: function(data) {
                            if (data == 1) {
                                alert('Berhasil menyimpan data.');
                                // window.location.reload();
                            } else {
                                alert('Gagal menyimpan data.');
                            }
                        }
                    });
                } else {
                    alert('Uang pembayaran kurang.');
                }
            } else {
                alert('Tidak ada produk yang dibeli.');
            }
        }
    </script>
    <script>
        $(document).ready(function() {

            // Menghapus baris produk dari tabel
            $("#table-cart").on("click", ".delete", function() {
                $(this).closest("tr").remove(); // Menghapus baris tabel
                totalJumlah();
            });

            // Mengubah jumlah produk
            $('.table-body').delegate('.qty', 'keyup', function() {
                var tr = $(this).parent().parent(); // Mengambil baris tabel
                var qty = tr.find('.qty').val() - 0; // Mengambil nilai qty
                var price = tr.find('.harga_jual').val() - 0; // Mengambil nilai harga
                var stock = tr.find('.stok').val() - 0; // Mengambil nilai stok

                if (qty > stock) {
                    alert('Stok produk sisa ' + stock); // Pesan kesalahan jika qty melebihi stok
                    tr.find('.qty').val(stock) - 0; // Mengatur qty ke jumlah stok maksimum
                    qty = stock;
                }

                var total = qty * price; // Menghitung total harga
                tr.find('.jumlah').val(total); // Mengatur nilai total
                tr.find('.jumlah-text').html(total); // Menampilkan total di tabel
                totalJumlah();
            });
        });
    </script>
@endsection
