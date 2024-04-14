<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="card-header">Sửa sản phẩm</h1>

                    <div class="card-body">
                        <form action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="category_id">Danh mục</label>
                                <select class="form-control" id="category_id" name="category_id" required>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="image">Ảnh</label>
                                <input type="file" class="form-control" id="image" name="upload" value="{{ $product->image }}">
                            </div>

                            <div class="form-group">
                                <label for="price">Giá</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
                            </div>

                            <div class="form-group">
                                <label for="status">Trạng thái</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Hiển thị</option>
                                    <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Ẩn</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description">Mô tả</label>
                                <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>