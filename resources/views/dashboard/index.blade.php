@extends('layout')

@section('content')
<div class="wrapper bg-white">
        {{-- disesuaikan dengan halaman Middleware, sehingga harus login untuk akses todo, tidak bisa http://127.0.0.1:8000/todo --}}
        @if(Session::get('notAllowed'))
            <div class="alert alert-danger w-70">
                {{Session::get('notAllowed')}} 
            </div>
        @endif 
        
        {{-- alert untuk berhasil menambahkan data baru --}}
        @if(Session::get('successAdd'))
            <div class="alert alert-success w-70">
                {{Session::get('successAdd')}} 
            </div>
        @endif 

        {{-- alert jika data berhasil diperbarui  --}} 
        @if(Session::get('succesUpdate'))
            <div class="alert alert-success w-70">
                {{Session::get('succesUpdate')}} 
            </div>
        @endif 
        
        {{-- alert jika data berhasil didelete  --}} 
        @if(Session::get('successDelete'))
            <div class="alert alert-warning w-70"> 
                {{Session::get('successDelete')}} 
            </div>
        @endif 
        
    <div class="d-flex align-items-start justify-content-between">
        <div class="d-flex flex-column">
            <div class="h5">My Todo's</div>
            <p class="text-muted text-justify">
                Here's a list of activities you have to do
            </p>
            <br>
            <span>
                <a href="{{route('todo.create')}}" class="text-success">Create</a> | <a href="{{route('todo.complated')}}">Complated</a>
            </span>
        </div>
        <div class="info btn ml-md-4 ml-0">
            <span class="fas fa-info" style="font-size:10px;" title="Info"></span>
        </div>
    </div>
    <div class="work border-bottom pt-3">
        <div class="d-flex align-items-center py-2 mt-1">
            <div>
                <span class="text-muted fas fa-comment btn"></span>
            </div>
            <div class="text-muted">{{!is_null($todos) ? count($todos) : '-'}} complated todos</div>  {{-- is_nul= mengecek data array nya, != jika data ada akan dihitung, jika kosong ditambahkan (-) --}}
            <button class="ml-auto btn bg-white text-muted fas fa-angle-down" type="button" data-toggle="collapse"
                data-target="#comments" aria-expanded="false" aria-controls="comments">
            </button>
        </div>
    </div>
    <div id="comments" class="mt-1">
        @foreach ($todos as $todo)
        <div class="comment d-flex align-items-start justify-content-between">
            <div class="mr-2">
                <form action="/todo/complated/{{$todo['id']}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="fas fa-check" style="background: #B9E0FF; padding: 8px !import;"></button>
                </form>
                {{-- <label class="option">
                    <input type="checkbox"> 
                    <span class="checkmark"></span>
                </label> --}} 
            </div>
            <div class="d-flex flex-column w-75">
                <a href="/todo/edit/{{$todo['id']}}" class="text-justify font-weight-bold">
                    {{ $todo['title']}}
                </a>
                <p class="text-muted">{{ $todo['status'] ? 'Complated' : 'On-Progress' }} <span class="date">{{ \Carbon\Carbon::parse($todo['date'])->format('j F, Y') }}</span></p>
                {{-- untuk membuat tanggal menjadi tulisan --}} 
                {{-- status nagmbil dari nama tablenya, $todo diambil dari foreach,clas date untuk menampilkan tanggalnya  --}} 
                    {{-- <p class="text-muted">{{$todo['status']? 'Completed' : 'On-Progress'}} <span class="date">{{\Carbon\Carbon::parse ($todo['date'])->format('j F, Y') }}</span></p> 
                    untuk menentukan tanggal nya dengan carbon, dengan format j= tanggal, F=bulan, Y=tahun  --}}

            </div>
            <div class="ml-auto">
                {{-- Ketika akan membuat fitur delete, harus menggunakan form. Karenakalau kita jalanin fitur delete itu kan harus
                    artinya mau ubah di database nya kan? kalau hal-hal yg menghubungkan dengan modofikasi database harus menggunakan form --}}
                <form action="{{route('todo.delete', $todo['id'])}}" method="POST">
                    @csrf 
                    {{--- menimpa attribute method="POST" pada form agar menjadi delete, karena di method route nya menggunakan delete --}}
                    @method('DELETE') {{-- method ini nimpa post dalam form dengan method delete (disesuaikan dengan route nya ) --}}
                    {{--- biar action form nya bisa dijalankan, button nya harus type submit --}}
                    <button class="fas fa-trash text-danger btn"></button>
                </form>
                {{-- <span class="fas fa-arrow-right btn"></span> --}}
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection