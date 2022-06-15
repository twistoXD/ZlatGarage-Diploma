<section class="container m-4">
    <div class="row">
        <div class="col-10">
            <div class="quote dark">
                <blockquote>
                    <p class="comment-p">{{ $comment->short_content}}</p>
                    <a href="{{ route("comments.show", $comment->id) }}" class="btn bg- btn-primary m-2">Подробнее</a>
                    <i class='fas <?= $comment->like ? 'fa-thumbs-up text-success' : 'fa-thumbs-down text-danger' ?> like-comment m-2'></i>
                </blockquote>
            </div>
            <div class="quote-footer text-right">
                <div class="quote-author-img">
                    <img src="{{ asset('storage/comment.png') }}" alt="Аватар пользователя">
                </div>
                <h4>{{ $comment->user->full_name }}
                </h4>
                <p>
                    <strong>{{$comment->date_comment_humans}}
                    </strong>
                </p>
            </div>
        </div>
    </div>
</section>
