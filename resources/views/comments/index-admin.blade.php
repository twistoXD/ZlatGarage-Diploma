@extends('layouts.admin')
@section('content')
    @include('inc.success')
    <div class="container-sm">
        @if(count($comments)>0)
        <table class="table mt-5">
            <thead>
            <tr>
                <th scope="col">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Комментатор</span>
                    </div>
                </th>
                <th scope="col">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Оценка</span>
                    </div>
                </th>
                <th scope="col">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Комментарий</span>
                    </div>
                </th>
                <th scope="col">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Действие</span>
                    </div>
                </th>
            </tr>
            </thead>
            <tbody id="tableComment">
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->user->full_name}}</td>
                    <td>
                        <i class='fas <?= $comment->like ? 'fa-thumbs-up text-success' : 'fa-thumbs-down text-danger' ?> like-comment-admin m-2'></i>
                    </td>
                    <td class="comment-click" data-work="{{$comment}}" data-toggle="modal"
                        data-target="#exampleModalCenter">{{$comment->short_content}}</td>
                    <td>
                        <form class="mx-1 mx-md-4" method="post"
                              action="{{ route('admin.comments.update', $comment) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-primary">Принять</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('admin.comments.destroyComment', $comment) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger">Отклонить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @else
            <h5 class="text-center mt-lg-5">Новых отзывов пока нет...</h5>
        @endif
    </div>
    @include('inc.modal-show-comment')
@endsection
@push('child-scripts')
    <script type="text/javascript">
        function showModal(comment) {
            $('#exampleModalLongComment').text(comment.content);
            str = '';
            $('.modal-content').html(comment.content);
            $('.modal-commentId').html(`<input type=hidden name="commentId" value="${comment.id}" />`)
        }

        $('.comment-click').click(function () {
            showModal(JSON.parse(this.dataset.work));
            $('#myModal').modal('show')
        });
        $('.close-comment').click(function () {
            $('#myModal').modal('hide');
        });
    </script>
@endpush
