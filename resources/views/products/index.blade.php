<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Include Axios library -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="card-header">Products</h1>
                    <a href="{{route('products.create')}}" class="btn btn-primary">Thêm</a>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá sản phẩm</th>
                                    <th>Trạng thái</th>
                                    <th>Danh mục</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><img src="{{url('uploads')}}/{{$product->image}}" alt="" width="80"></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->status == 1? 'Hiển thị' : 'Ẩn' }}</td>
                                    <td>{{ $product->categories->name }}</td>
                                    <td>
                                        <!-- <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Sửa</a>
                                        <a href="#" class="btn btn-danger" onclick="deleteProduct('{{ $product->id }}')">Xóa</a> -->

                                        <form action="{{route('products.destroy', $product->id)}}" method="post">
                                            @csrf @method('DELETE')
                                            <a href="{{route('products.edit', $product->id)}}" class="btn btn-primary">Sửa</a>
                                            <button class="btn btn-danger" onclick="return confirm('Chắc chưa?')">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                        {{ $products -> links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>