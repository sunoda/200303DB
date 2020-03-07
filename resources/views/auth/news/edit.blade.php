@extends('layouts/app')

@section('css')
{{-- summernote css --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<style>
    .col-3 {
        margin: 0 0 1rem;
    }

    .col-3 .btn-danger {
        border-radius: 50%;
        position: absolute;
        right: 0;
        top: -1rem;
    }
</style>


@endsection

@section('content')
<div class="container">
    <h2>修改最新消息</h2>
    <form method="POST" action="/home/news/update/{{$news->id}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <hr>
            <h2>原始圖片</h2>
            <br>
            <img class="col-5" src="{{asset('/storage/'.$news->img)}}" alt="">
            <br><br>
            <input type="file" class="form-control" id="img" name="img">
            <hr>
            <h2>多張圖片組</h2>
            <br>
            <div class="row">
                @foreach ($news->news_img as $item)
                <div class="col-3" data-imgDelete="{{$item->id}}">
                    <button type="button" class="btn btn-danger" data-imgDelete={{$item->id}}>X</button>
                    <img class="img-fluid" src="{{asset('/storage/'.$item->news_img_url)}}" alt="">
                    <input type="number" min='0' class="form-control" id="sort" name="sort" value="{{$item->sort}}"
                        onchange="ajax_sort(this,{{$item->id}})">
                </div>
                @endforeach
            </div>
            <input type="file" class="form-control" id="news_img" name="news_img[]" multiple>
            <hr>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value={{$news->title}}>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea type="text" class="form-control" id="content" name="content">{!!$news->content!!}</textarea>
        </div>
        <div class="form-group">
            <label for="sort">sort</label>
            <input type="number" min='0' class="form-control" id="sort" name="sort" value="{{$news->sort}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.col-3 .btn-danger').click(function(){
        // console.log($(this).attr("data-imgDelete"))
        $.ajax({
                    method: 'POST',
                    url: '/home/news/ajax_delete_img',
                    data: {
                        imgDelete:$(this).attr("data-imgDelete"),
                    },
                    success: function (res) {
                        // console.log(res);
                        $(`.col-3[data-imgDelete=${res}]`).remove();
                    },

                });
    })
    function ajax_sort(element, img_id){
        var element;
        var img_id;
        $.ajax({
            method:'post',
            url:'/home/news/ajax_sort',
            data:{
                img_id:img_id,
                sort:element.value
            },
            success: function(res){
            }
        })
    }
    $(document).ready(function() {
        $('#content').summernote();
    });
</script>
@endsection
