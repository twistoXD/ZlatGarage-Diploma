<div class="modal fade" id="modalDestroy" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Уточните ответ...</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Вы действительно хотите удалить свой отзыв?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>

                <form action="{{ route('comments.destroy', $comment) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>

