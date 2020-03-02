@extends('BanSim.catalog.main')
@section('title','edit')

@section('main')

<div class="hero-wrap hero-bread mt-5" style="background-image: url('{{asset('minishop/images/bg_6.jpg')}}');height: 380px" >

</div>
<div class="col-12 col-md-12 mt-5">
    <div class="row">
        <div class="col-12"><h1>製品を編集する</h1></div>
        <div class="col-12">
            <form  action="{{ route('sim.update', $sim->sim_id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>製品名</label>
                    <input type="text" class="form-control" name="name" value="{{ $sim->sim_name }}" required>
                </div>
                <div class="form-group">
                    <label>価格</label>
                    <input type="number" class="form-control" name="price" value="{{$sim->sim_price}}" required>
                </div>


                <div class="form-group">
                    <label>カテゴリー名</label>
                    <select name="sim_category_id" id="sim_category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">画像</label>
                    <img src="{{ 'data:image/jpeg;base64,'. $sim->sim_image }}" alt="image" style="max-width: 150px">
                    <input id="image" type="file" class="form-control" name="image" value="写真をインポートする" >
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
                <button type="submit" class="btn btn-primary">修正する</button>
                <a href="{{ route('sim.index') }}" role="button" class="btn btn-secondary">取り消す</a>
            </form>

        </div>
    </div>
</div>
@endsection
