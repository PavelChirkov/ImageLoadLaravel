@extends('html')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading mb-5">
            <h2>Информация о изображениях</h2>
        </div>
        <div class="mb-5">
            Сортировать по:
            <a href="{{ route('info') }}?name=id&by=@if($name =='id'){{ $by }}@else
            desc
            @endif">id</a>,
            <a href="{{ route('info') }}?name=name&by=@if($name =='name'){{ $by }}@else
            desc
            @endif">имени</a>,
            <a href="{{ route('info') }}?name=created_at&by=@if($name =='created_at'){{ $by }}@else
            desc
            @endif">дате создания</a>
        </div>
        <div class="panel-body">
            @foreach ($images as $row)
                @php $json_data = json_decode($row->options,true); @endphp
                <div class="row align-items-center p-3">
                    <div class="col">
                        <img src="/images/resize/{{ $json_data['en_name_extension'] }}" alt="{{ $row->name }}">
                    </div>
                    <div class="col">
                        <div>id: {{ $row->id }}</div>
                        <h4>{{ $row->name }}</h4>
                        <a href="{{ $json_data['file_path'] }}" alt="{{ $row->name }}"
                           target="blank">Оригинал {{ $json_data['original_name'] }}</a>
                        <a href="{{ route('zip') }}?name={{ $json_data['en_name_extension'] }}" target="blank">Стачать
                            ZIP</a>
                        <div>{{ $row->created_at }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
