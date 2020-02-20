@extends('BanSim.catalog.main')
@section('title','list')

@section('main')
    <div class="hero-wrap hero-bread mt-5"
         style="background-image: url('{{asset('minishop/images/bg.png')}}');height: 380px">
    </div>
    <div class="col-12 mt-5">
        <div class="row">
            <div class="col-12"><h1>製品リスト</h1></div>
            <br>
            <a class="btn mb-5 bg-success" href="{{ route('sim.create') }}">新しい追加</a><br>
            <div class="col-12">
                @if (Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                    </p>
                @endif
            </div>
            <table class="table table-striped">
                <thead class="table-danger">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">製品名</th>
                    <th scope="col">価格</th>
                    <th scope="col">カテゴリー名</th>
                    <th scope="col">写真</th>
                    <th scope="col">修正する</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($sims) == 0)
                    <tr>
                        <td colspan="4">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($sims as $key => $sim)
                        <tr>
                            <th scope="row">{{ $sims->firstItem() + $key }}</th>
                            <td>{{ $sim->sim_name }}</td>
                            <td>{{ $sim->sim_price }}<a><i class="fa fa-yen-sign"></i></a></td>
                            <td>@foreach($categories as $category)
                                    @if ($sim->sim_category_id === $category->category_id)
                                        {{ $category->category_name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <img src="{{ 'data:image/jpeg;base64,'.$sim->sim_image }}" alt="sim_image"
                                     style="max-width: 150px">
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <a href="{{ route('sim.edit', $sim->sim_id) }}"
                                           class="btn bg-warning text-dark">修正する</a>
                                    </div>
                                    <div class="col">
                                        <form action="{{ route('sim.destroy', $sim->sim_id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn bg-danger text-dark" value="削除する">
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            {{ $sims->links() }}
        </div>
    </div>
@endsection
