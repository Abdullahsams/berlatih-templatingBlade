@extends('layout.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 mt-3">
            <div class="card">
                <div class="card-body">
                    <h3>{{$p->judul}}</h3>
                    <h5 class="mb-3 pb-3" style="border-bottom: 1px solid rgba(0,0,0,.4)">{{$p->isi}}</h5>
                    <table class="my-3">
                        <tr>
                            <td class="text-sm text-muted pr-3">Tanggal Dibuat</td>
                            <td class="text-sm text-muted pr-3">{{$p->tanggal_dibuat}}</td>
                        </tr>
                        <tr>
                            <td class="text-sm text-muted pr-3">Tanggal Diperbaharui</td>
                            <td class="text-sm text-muted pr-3">{{$p->tanggal_diperbaharui ? $p->tanggal_diperbaharui : '-'}}</td>
                        </tr>
                    </table>

                    <a href="{{ url('/pertanyaan') . '/' . $p->id . '/edit' }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{$p->id}}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
                <a href="{{url('/pertanyaan')}}" class="btn-info btn-block text-center text-white">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection