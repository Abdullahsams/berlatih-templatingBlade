@extends('layout.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 mt-3">
            <div class="card p-3">
                <form method="post" action="{{url('/pertanyaan') . '/' . $p->id }}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="judul" name="judul" value="{{$p->judul}}">
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi</label>
                        <textarea type="text" class="form-control @error('isi') is-invalid @enderror" id="isi" placeholder="isi" name="isi">{{$p->isi}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection