@extends('html')
@section('content')
        <div class="panel-heading mb-50">
            <h2>Загрузка изображений, <strong> возможна загрузка не более 5 изображений одновременно</strong>.</h2>
        </div>
        <div class="panel-body">
            <form action="{{ route('upload') }}"  id="imageFile" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <input type="file" name="image[]" onchange="if(this.files.length > 5) { alert('Слишком много файлов! Допустимо – не больше 5.'); this.value='';}" multiple class="form-control">
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success">Загрузка</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
