@extends('layout.utama')

@section('content')
    <div class="row row-cols-4 gap-2 d-flex justify-content-center align-items-center">
        @foreach ($produk as $item)
            <div class="col">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('assets/img/'.$item->gambar) }}" class="img-fluid rounded-start w-100 h-100" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body position-relative">
                                <h3 class="card-title">{{ $item->nama }}</h3>
                                <h5>Rp.{{ $item->harga }}</h5>
                                <div class="d-flex gap-3">
                                    <p class="card-text"><small class="text-body-secondary">Tipe : {{ $item->tipe }}</small></p>
                                    <p class="card-text"><small class="text-body-secondary">Jenis : {{ $item->jenis }}</small></p>
                                </div>
                                <form action="/pembelian/storeinput" method="post" class="form-floating">
                                    @csrf
                                    <input type="hidden" name="kodeproduk" value="{{$item->kode}}">
                                    <input type="hidden" name="harga" value="{{$item->harga}}">
                                    <div class="form-floating p-1">
                                        <input type="text" name="banyak" required="required" class="form-control">
                                        <label for="floatingInputValue">Banyak</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-outline-success px-4 fw-semibold">Beli</button>
                                        <p class="position-absolute px-1 py-1 me-2 top-0 end-0 bg-danger text-white">{{ $item->stok }}</p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection